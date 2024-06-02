<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;

class Crud extends Component
{
    public $type;
    public $isFormTrue = false;
    public $role;
    protected $listeners = [
        'toggleUserForm' => 'toggleForm',
    ];
    public function mount($type){
        $this->type = $type;
        switch($type){
            case 'admin-pharmacy':
                $this->role = 'admin';
                break;
            case 'doctors':
                $this->role = 'doctor';
                break;
            default:
               $this->role = 'patient'; 
        }

    }
    public function render()
    {
        return view('livewire.admin.user.crud');
    }

    public function toggleForm(){
        $this->isFormTrue = ($this->isFormTrue) ? false : true;
    }
    public function changeUserRole(){
        $this->emit('roleChanged',$this->role);
    }
}
