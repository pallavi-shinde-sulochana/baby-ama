<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Traits\SMSTrait;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\PrescriptionMedicine;
use Illuminate\Support\Facades\DB;




use Auth;

class PharmacyController extends Controller
{

    use SMSTrait;

    public function __construct(){
        if (!\Auth::user()){
           return view('pages.pharmacy.login');
        }
    }

    public function pageLogin(){
        return view('pages.pharmacy.login');
        // $patients = PrescriptionMedicine::where('prescription_status','pending')
        // ->groupBy('prescription_id')
        // ->with("user")
        // ->orderBy('id','desc')->paginate(25);

        // return view('pages.pharmacy.billing.prescription-list',compact('patients'));
    }

    public function loginAction(Request $request){

       $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validated = $request->validate($rules);

        $userdata = $request->only('email', 'password');

        if (Auth::attempt($userdata)) {
            $roles = Auth::user()->getRoleNames()->toArray();
            if($roles && !in_array('pharmacy',$roles)){
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
              return redirect()->back()->with('error','Oops! you does not have the proper permission');
            }else{
                return redirect()->route('pharmacy.home')->with('success', 'Welcome Back Dear Pharmacy User! ');
            }

        }else{
            return redirect()->back()->with('error','Oops! You have entered invalid credentials,');
        }
    }

    public function index(){

        $phuser_id = helperGetAuthUser('id');

        return view('pages.pharmacy.index');
    }

    public function addmedicine(){

        $phuser_id = helperGetAuthUser('id');

        return view('pages.pharmacy.inventory.medicine-addnew');
    }
    public function medicinelist(){

        $phuser_id = helperGetAuthUser('id');
       // $medicines = Medicine::query()->get();

        $medicines = Medicine::query()->orderBy('id', 'desc')->paginate(25);


        return view('pages.pharmacy.inventory.medicine-stacklist',compact('medicines'));
    }

    public function PostAddmedicine(Request $request){

        if($request->medId!=0){
        $update_medicine = Medicine::where('id',$request->medId)->first();
        $update_medicine->name            = $request->item_name;
        $update_medicine->type            = $request->item_type;
        $update_medicine->dosage          = $request->item_dosage;
        $update_medicine->open_stock      = $request->opening_stock;
        $update_medicine->item_code       = $request->item_code;
        $update_medicine->suppliers       = $request->suppliers;
        $update_medicine->hsn_code        = $request->hsn_code;
        $update_medicine->bar_code        = $request->bar_code;
        $update_medicine->buying_unit     = $request->buying_unit;
        $update_medicine->buying_price    = $request->buying_price;
        $update_medicine->buying_tax      = $request->buying_tax;
        $update_medicine->selling_unit    = $request->selling_unit;
        $update_medicine->selling_price   = $request->selling_price;
        $update_medicine->selling_tax     = $request->selling_tax;
        $update_medicine->self_no         = $request->shelf_no;
        $update_medicine->batch_no        = $request->batch_no;
        $update_medicine->expiry_date     = $request->item_exp_date;
        $update_medicine->re_order_level  = $request->re_order_level;
        $update_medicine->package         = $request->package;
        $update_medicine->unit_ratio     = $request->unit_ratio;
        $update_medicine->accessed_by     = $request->accessed_by;


        $data_updated =  $update_medicine->save();

        if($data_updated){
            return redirect()->route('pharmacy.inventory.medicinelist')->with('success', 'Medicine Details Updated Successfully! ');
        }
        else
        {
             return redirect()->back()->with('error','Oops! Someting went wrong');
        }


        }
        else{

        $save_medicine = new Medicine();
        $save_medicine->name            = $request->item_name;
        $save_medicine->type            = $request->item_type;
        $save_medicine->dosage          = $request->item_dosage;
        $save_medicine->open_stock      = $request->opening_stock;
        $save_medicine->item_code       = $request->item_code;
        $save_medicine->suppliers       = $request->suppliers;
        $save_medicine->hsn_code        = $request->hsn_code;
        $save_medicine->bar_code        = $request->bar_code;
        $save_medicine->buying_unit     = $request->buying_unit;
        $save_medicine->buying_price    = $request->buying_price;
        $save_medicine->buying_tax      = $request->buying_tax;
        $save_medicine->selling_unit    = $request->selling_unit;
        $save_medicine->selling_price   = $request->selling_price;
        $save_medicine->selling_tax     = $request->selling_tax;
        $save_medicine->self_no         = $request->shelf_no;
        $save_medicine->batch_no        = $request->batch_no;
        $save_medicine->expiry_date     = $request->item_exp_date;
        $save_medicine->re_order_level  = $request->re_order_level;
        $save_medicine->package         = $request->package;
        $save_medicine->unit_ratio     = $request->unit_ratio;
        $save_medicine->accessed_by     = $request->accessed_by;


        $data_saved =  $save_medicine->save();

        if($data_saved){
            return redirect()->route('pharmacy.inventory.medicinelist')->with('success', 'Medicine Added Successfully! ');
        }
        else
        {
             return redirect()->back()->with('error','Oops! Someting went wrong');
        }

    }

    }

    public function SearchMedicine(Request $request)
{

    $output="";
    $query = Medicine::query();

        if(isset($request->search)){

            if($request->search=='asc')
            {
                $medicines = $query->orderBy('name','asc')->get();
            }
            else if($request->search=='desc')
            {
                $medicines = $query->orderBy('name','desc')->get();
            }
            else
            {
                $s = $request->search;
                $query = $query->orWhere('name','LIKE','%'.$s.'%')
                        ->orWhere('item_code', 'like', '%' . $s . '%');
                 $medicines = $query->orderBy('id','desc')->get();
            }

        }


    if($medicines)
    {
        $i = 1;
    foreach ($medicines as $key => $med) {
        if(($med->batch_no != '') && ($med->expiry_date != ''))
        {
             $be = ($med->batch_no).'&'.($med->expiry_date!='') ? date('d/m/y', strtotime($med->expiry_date)) : "Nil";
         }
        elseif(($med->batch_no != '') || ($med->expiry_date != ''))
        {
             $be = (($med->batch_no!='') ? $med->batch_no : "Nil".'&'.($med->expiry_date!='')) ? date('d/m/y', strtotime($med->expiry_date)) : "Nil";
        }
        else
        {
            $be ="Nil";
        }
        $sell = PrescriptionMedicine::where('medicine_id' , $med->id)->get()->sum('total_qty');
        $total_stock = $med->buying_unit * $med->unit_ratio;
        $available_stock = $total_stock - $sell;
        $re_order_level = $med->re_order_level;

        if($available_stock <= 0)
        {
            $available_stock = 0;
            $clr = 'color:#FF0000';
        }
        else if($available_stock <= $re_order_level )
        {
            $available_stock = $available_stock;
            $clr = 'color:#D2BD00';
        }
        else{
            $available_stock = $available_stock;
            $clr = 'color:green';
        }
        $retail  = ($med->selling_price!='') ? $med->selling_price : "0";
        $output.='<tr>'.
        '<th scope="row" class="text-center">'.$i.'</th>'.
        '<td class="text-center">'.ucfirst($med->name).'</td>'.
            '<td class="text-center">'.$med->item_code.'</td>'.
            '<td class="text-center">'.ucfirst($med->type).'</td>'.
            '<td class="text-center">'.$med->self_no.'</td>'.
            '<td class="text-center">'.$med->hsn_code.'</td>'.
            '<td class="text-center">'.$total_stock.'</td>'.
            '<td class="text-center">'.$be.'</td>'.
            '<td class="text-center" style="'.$clr.'">'.$available_stock.'</td>'.
            '<td class="text-center"><span>&#8377;</span>'.$retail.'</td>'.
            '<td class="text-center">
        <button type="button" class="btn border-0 edit-icon" data-bs-toggle="modal"
        data-bs-target="#MedProperties_'.$med->id.'"><svg xmlns="http://www.w3.org/2000/svg"
        width="20" height="18" viewBox="0 0 25 24" fill="none">
        <path d="M16.9882 3.74493C17.2244 3.50876 17.5048 3.32142 17.8133 3.1936C18.1219 3.06579 18.4526 3 18.7866 3C19.1206 3 19.4514 3.06579 19.7599 3.1936C20.0685 3.32142 20.3489 3.50876 20.5851 3.74493C20.8212 3.98111 21.0086 4.26148 21.1364 4.57006C21.2642 4.87863 21.33 5.20936 21.33 5.54336C21.33 5.87736 21.2642 6.20809 21.1364 6.51666C21.0086 6.82524 20.8212 7.10562 20.5851 7.34179L8.44568 19.4812L3.5 20.83L4.84882 15.8843L16.9882 3.74493Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
        </svg></button></td>'.
        '</tr>';
     $i++;
    }

    $response =[];

        $response['success'] = true;
        $response['data'] = $output;

        return response($response,200);
    }
}


public function DeclinedPrescription(Request $request){

        /*$query =  PrescriptionMedicine::where('prescription_id', $request->delid)->first();
        $query->prescription_status = 'ignored';
        $query->save();*/

        if(isset($request->remid))
        {
             $id    = $request->remid;
             $query =  PrescriptionMedicine::where('id', $id)->delete();

        }
        else
        {

            $id     = $request->delid;
            $status = 'ignored';
            $query  = PrescriptionMedicine::where('prescription_id', $id)->update(['prescription_status'=>$status]);

        }

        $response = [];

        $response['success'] = true;
        $response['data']    = $query;
        $response['error']   = $request->delid;

        return response($response,200);

    }

    public function GetUserPrescription(Request $request, $prescription_id){

        $id         =  $prescription_id;
        $getuser    =  PrescriptionMedicine::where('prescription_id', $id)->first();
        $listpm     =  PrescriptionMedicine::where('prescription_id', $id)->get();
        $pharmacy   =  PrescriptionMedicine::where(['prescription_id'=>$id,'prescription_by'=>'2'])->get();
        $user       =  Patient::where('user_id', $getuser->user_id)->first();

        $query = Medicine::query();

        $s = $request->search;

        if(isset($request->search)){

                $query = $query->where('name','LIKE','%'.$s.'%')
                        ->orWhere('type', 'like', '%' . $s . '%')
                        ->orWhere('dosage', 'like', '%' . $s . '%');
        }

        // $medicines = $query->orderBy('name','asc')->take('6')->get();
         $medicines = $query->where('accessed_by', 'pharmacy')->orderBy('name','asc')->get();

        //dd($user);
     return view('pages.pharmacy.billing.patient-prescription',compact('prescription_id','user','listpm','pharmacy','medicines'));
    }


     public function PostMedicineDetail(Request $request,$prid){

        // dd($request);

        $pr_timing_when = implode(',',$request->timing_when);

        $pr_timing_how = implode(',',$request->timing_how);
        //$pr_timing_how = $request->timing_how;
        /*if($request->pr_add_edit == 'add'){*/
                $s_medicine = ($request->id) ? PrescriptionMedicine::find($request->id) : new PrescriptionMedicine;
                $s_medicine->prescription_id = $prid;
                $s_medicine->user_id = $request->user_id;
                $s_medicine->medicine_id = $request->medicine_id;
                $s_medicine->dosage = $request->dosage;
                $s_medicine->total_qty = $request->total_qty;
                $s_medicine->intake_qty = $request->intake_qty;
                $s_medicine->timing_when = $pr_timing_when;
                $s_medicine->timing_how = $pr_timing_how;
                $s_medicine->duration = $request->tab_count_days;
                $s_medicine->prescription_by = '2';
                $s_medicine->save();

        /*}*/
        return redirect()->back()->with('success', 'Details Saved Successfuly');
    }


    public function prescriptionList(){

        $patients = PrescriptionMedicine::where('prescription_status','pending')
        ->groupBy('prescription_id')
        ->with("user")
        ->orderBy('id','desc')->paginate(25);

        return view('pages.pharmacy.billing.prescription-list',compact('patients'));
    }


    public function GetPatientInvoice($prid,$userid){

     $invoice_details = PrescriptionMedicine::where(['prescription_status' => 'pending','prescription_id'=>$prid])
        ->get();
        $user = Patient::where('user_id',$userid)->first();
        $prescription_id = PrescriptionMedicine::where('prescription_id',$prid)->first();
        return view('pages.pharmacy.billing.patient-prescription-invoice',compact('prescription_id','invoice_details','user'));
    }

    public function PrintPatientInvoice($prid,$userid){
        $invoice_details = PrescriptionMedicine::where(['prescription_status' => 'pending','prescription_id'=>$prid])
        ->get();
        $user = Patient::where('user_id',$userid)->first();
       
        return view('pages.pharmacy.billing.print-patient-prescription-invoice',compact('invoice_details','user'));

    }

    public function SearchPatientlist(Request $request){

        $output="";
        $query = DB::table('prescription_medicines')
            ->join('patients', 'prescription_medicines.user_id', '=', 'patients.user_id')
            ->select('prescription_medicines.*', 'patients.*');
        $s = $request->search;

        if(isset($request->search)){

                $query = $query->orWhere('patients.first_name','LIKE','%'.$s.'%')
                        ->orWhere('patients.last_name','LIKE','%'.$s.'%')
                        ->orWhere('patients.umr_no', 'like', '%' . $s . '%');
        }

        $pp = $query->where('prescription_medicines.prescription_status','pending')
                    ->groupBy('prescription_medicines.prescription_id')->get();

    if($pp)
    {
        $i = 1;
        foreach ($pp as $key => $med) {

        if(isset($med->first_name)){
            $f = substr($med->first_name,0,1);
                $fname = $med->first_name;
            }
            else
            {
                $f = '';
                $fname = '';
            }
            if(isset($med->last_name)){
                $l = substr($med->last_name,0,1);
                $lname = $med->last_name;
            }
            else
            {
                $l = '';
                $lname = '';
            }


            $output.=' <tr>
            <th scope="row" class="text-center">'.$i.'</th>'.
            '<td class=""><span class="patient-avtr">'.strtoupper($f.$l).
            '</span>'.ucfirst($fname).' '.ucfirst($lname).'</td>'.
            '<td class="text-center">'.$med->age.'</td>'.
            '<td class="text-center">'.$med->umr_no.'</td>'.
            '<td class="text-center">'.$med->op_no.'</td>'.
            '<td class="text-center">'.date('d-m-Y', strtotime($med->created_at)).'</td>'.
            '<td class="text-center"><div class="action-btn-group d-flex justify-content-evenly align-items-center"> <a class="act-btn warning" href="#"
            rel="noopener noreferrer" onclick="prescription_declined('.$med->prescription_id.')">Decline</a>
            <a class="act-btn success" href="'.route('pharmacy.billing.patient.prescription', $med->prescription_id).'" rel="noopener noreferrer">Proceed</a>
                                            </div>'.'</td>'.
            '</tr>';
         $i++;
        }
    }
    else
    {
       $output.= '<tr><td>'."No Records".'</td></tr>';
    }
        $response =[];
        $response['success'] = true;
        $response['data'] = $output;

        return response($response,200);

    }


    /********************** Admin - Pharmacy User Save Logic ****************************/

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
        // $user_info->specialist_type = ($this->user_role == 'doctor') ? json_encode($request->specialist_type) : null;
        $user_info->save();

        if($user){
            return true;
        }else{
            return false;
        }
    }

    /*Admin user */
    public function addPharmacy(User $pharmacy){
        // $name = Route::currentRouteName();
        $role = "pharmacy";
        $data = isset($pharmacy->id) ? $pharmacy : new User;

        return view('pages.admin.user.pharmacy.form',compact('data','role'));
    }

    public function storePharmacy(Request $request){



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
        return redirect()->route($getUserCRUDRedirect)->with('success','Pharmacy User Updated Successfully');

        // return view('pages.admin.user.admin.list',compact('data'));
    }



    public function listPharmacy(Request $request){

        $query = User::query();
        $limit = 25;
        $data = $query->paginate($limit);

        return view('pages.admin.user.pharmacy.list',compact('data'));
    }

    public function deletePharmacy(User $pharmacy){

        $getUserCRUDRedirect = getUserCRUDRedirect();

        if($pharmacy){
            $pharmacy->delete();
             return redirect()->route($getUserCRUDRedirect)->with('success','User Deleted Successfully');
        }else{
             return redirect()->route($getUserCRUDRedirect)->with('success','Oops Unable to Delete user');
        }
    }






}
