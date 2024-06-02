<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;

class TherapistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listTherapist(){
        return view('pages.admin.user.therapist.list');
    }

    /*Admin user */
    public function addTherapist(User $therapist){
        // $name = Route::currentRouteName();
        $role = "therapist";
        $data = isset($therapist->id) ? $therapist : new User;
    
        return view('pages.admin.user.therapist.form',compact('data','role'));
    }

    public function storeTherapist(Request $request){



        $user = User::firstOrNew(['id' =>  $request->id]);
        $user_info = UserInfo::firstOrNew(['user_id' => $request->id]);

          $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,'.$request->id,
                'phone' => 'required|numeric|digits:10|unique:user_infos,phone,'.$user_info->id,
            ]);

       // $data = isset($request->id) ? User::find($request->id) : new User;

        $this->saveUser($user,$user_info,$request);


        $getUserCRUDRedirect = getUserCRUDRedirect();
        return redirect()->route($getUserCRUDRedirect)->with('success','Therapist Updated Successfully');
    
        // return view('pages.admin.user.admin.list',compact('data'));
    }

    /*User Save Logic*/

    public function saveUser($user,$user_info, $request){

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if(count($user->roles) == 0){
            // $user->assignUserRole($user,$request->role);
            $user->assignRole($request->role);
        }

        $user_info->user_id = $user->id;
        $user_info->phone = $request->phone;
        $user_info->specialist_type = ($request->specialist_type) ? json_encode($request->specialist_type) : json_encode([]);
        // $user_info->specialist_type = ($this->user_role == 'doctor') ? json_encode($request->specialist_type) : null;
        $user_info->save();

        if($user){
            return true;
        }else{
            return false;
        }
    }

    public function deleteTherapist(User $therapist){

        $getUserCRUDRedirect = getUserCRUDRedirect();

        if($therapist){
            $therapist->delete();
             return redirect()->route($getUserCRUDRedirect)->with('success','User Deleted Successfully');
        }else{
             return redirect()->route($getUserCRUDRedirect)->with('success','Oops Unable to Delete user');
        }
    }
}
