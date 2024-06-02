<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;

class Form extends Component
{
    public $type;
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $specialist_type;
    public $user_role;
    public $password;
    protected $listeners = [
        'editUserDetails' => 'editUserDetails',
        'createNewUser' => 'createNewUser',
        'removeUserData' => 'removeUserData',
    ];

    public function mount($type){
        $this->type = $type;
        $this->user_id = null;
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->specialist_type = [];
        $this->user_role = null;
        $this->user_role_temp = null;

        switch($type){
            case 'admin-pharmacy':
                $this->user_role = 'admin';
                $this->user_role_temp = 'admin';
                break;
            case 'doctors':
                $this->user_role = 'doctor';
                $this->user_role_temp = 'doctor';
                break;
            default: 
                $this->user_role = 'patient';
                $this->user_role_temp = 'patient';
        }

    }
    public function render()
    {
        return view('livewire.admin.user.form');
    }

    public function submitForm(){

        $user = User::firstOrNew(['id' =>  $this->user_id]);
        $user_info = UserInfo::firstOrNew(['user_id' => $this->user_id]);

        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'phone' => 'required|numeric|digits:10|unique:user_infos,phone,'.$user_info->id,
        ]);

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;

        if($this->password){
            $user->password = Hash::make($this->password);
        }

        $user->save();

        if(count($user->roles) == 0){
            $this->assignUserRole($user,$this->user_role);
        }

        $user_info->user_id = $user->id;
        $user_info->phone = $this->phone;
        $user_info->specialist_type = ($this->user_role == 'doctor') ? json_encode($this->specialist_type) : null;

        $user_info->save();

        $this->emit('toggleUserForm');

        $this->dispatchBrowserEvent('user:alert', [
            'type' => 'success',  
            'message' => 'User Data Saved Successfully!', 
        ]);

        $this->emit('pg:eventRefresh-default');
    }

    public function assignUserRole($user = null,$role = 'patient'){
        if($user && $role){
            $user->assignRole($role);
        }
    }


    public function editUserDetails($param){
        $id = $param['id'];
        $user = User::find($id);
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->info->phone;
        $this->specialist_type = json_decode($user->info->specialist_type);
        $this->user_role = $user->roles[0]['name'];
        $this->resetErrorBag(); 
        $this->emit('toggleUserForm');
    }


    public function createNewUser(){
        $this->user_id = null;
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->specialist_type = [];
        $this->user_role = $this->user_role_temp;
        $this->resetErrorBag(); 
        $this->emit('toggleUserForm');
    }

    public function removeUserData($data){
        $user = User::find($data['id']);
        $user->delete();
        $this->dispatchBrowserEvent('user:alert', [
            'type' => 'success',  
            'message' => 'User Data Deleted Successfully!', 
        ]);
        $this->emit('pg:eventRefresh-default');
    }
}
