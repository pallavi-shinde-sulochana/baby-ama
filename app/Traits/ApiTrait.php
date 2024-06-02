<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ApiTrait
{
    /**
     * create a new order request pdf
     */
    public function getBreakpadCatalog()
    {
        $url = env("Levam_Api_Url", "");
        $key = env("Levam_Api_Key",'');

        $response = Http::get($url.'?api_key='.$key);

        return $response;
    }

}
