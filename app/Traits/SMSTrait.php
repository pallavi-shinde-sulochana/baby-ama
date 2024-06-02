<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SMSTrait
{
    /**
     * create a new order request pdf
     */
    public function sendSMS($destination='9025444360',$otp='5588',$message='Welcome To Babyama')
    {
        $route = 'v3';
        $language = 'english';
        $flash = 0;
        $authorization = env("SMS_API_KEY",'');
        $url = env("SMS_OTP_URL",'');
        // $dest = env("KALEE_SMS_DEST",'');
        $dest = $destination;
        $message = $message;
        $variables_values = $otp;


        $response = Http::get($url.'?authorization='.$authorization.'&route='.$route.'&language='.$language.'&variables_values='.$variables_values.'&flash='.$flash.'&numbers='.$dest.'&message='.$otp."\n".$message);

        return $response;
    }

}
