<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use App\Models\Appoinment;
use App\Models\Patient;
use App\Models\User;
use App\Traits\SMSTrait;
class WebBooking extends Component
{
    use SMSTrait;
    public $step = 1;
    public $full_name = null;
    public $specialist = '';
    public $select_date = null;
    public $session = null;
    public $phone = null;
    public $otp = null;
    public function render()
    {

        return view('livewire.patient.web-booking');
    }


    public function goNext($next = null){
        if($next){
            switch($next){
                case 2:
                    $this->validateNameSpecialist($next);
                    break;
                case 3:
                    $this->validateAppointmentDate($next);
                    break;
                case 4:
                    $this->validateMobileNumber($next);
                    break;
                case 'success':
                    $this->validateOTP($next);
                    break;
                default:
                    // Nothing
            }
        }
    }

    public function validateNameSpecialist($next = null){
        $validatedData = $this->validate([
            'full_name' => 'required',
            'specialist' => 'required',
        ]);
        $this->step = $next;
    }

    public function validateAppointmentDate($next = null){
        $validatedData = $this->validate([
            'select_date' => 'required',
            'session' => 'required',
        ]);
        $this->step = $next;
    }

    public function validateMobileNumber($next = null){
        $validatedData = $this->validate([
            'phone' => 'required|numeric|digits:10'
        ]);

        /*Send OTP*/
        $otp = helperGenerateOTP();
       
        $this->sendSMS($this->phone,$otp);

        $this->step = $next;
    }

    public function validateOTP($next = null){

        $validatedData = $this->validate([
            'otp' => 'required|numeric|digits:4'
        ]);
        
        $otp = $this->otp;
        $user_otp = helperGetSystemSession('user_otp');
        if($user_otp!=$otp){
              // session()->flash('message', 'Customer was saved');
               $this->dispatchBrowserEvent('user:alert', [
                    'type' => 'error',  
                    'message' => 'Oops! Invalid OTP, Enter a valid one!', 
                ]);
        }else{

           
            $booking = new Appoinment();

            $booking->first_name = $this->full_name;
            $mobile = $this->phone;

            $get_user = Patient::where('father_phone',$mobile)->orWhere('mother_phone',$mobile)->first();

            if($get_user){
               $booking->user_id= $get_user->user_id; 
            }else{
                $patient = new Patient();

                $name = explode(' ',$this->full_name);

                $patient->first_name= isset($name[0]) ? $name[0] : '';
                $patient->last_name=isset($name[1]) ? $name[1] : '';
                $patient->father_phone =$mobile;
                $patient->save();

                $user = new User();
                $user->first_name   = $patient->first_name;
                $user->last_name    = $patient->last_name;
                // $user->phone        = $mobile;
                $user->save();

                if($user){
                    $user->assignRole('patient');
                }

                $patient->user_id=$user->id;
                $patient->save();
                $booking->user_id=$user->id;

            }
            $booking->specialists = $this->specialist;
            $booking->appoinment_date = $this->select_date;
            $booking->appoinment_session = $this->session;
            $booking->otp = $this->otp;
            $booking->phone = $mobile;
            $booking->father_phone = $mobile;

            $booking->save();
            $this->step = $next;

        }

        
    }
}
