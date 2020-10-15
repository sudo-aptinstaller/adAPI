<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\APIKey as apikey;
use App\Models\User;

class ApiHandleController extends Controller
{
    
    public function index(){
        return view('pages.main');
    }

    public function get_id($username){
        $api = User::where('name','=',$username)->first();
        $api->api_token = $this->random_strings(60);
        $api->save();
        return new apiKey($api);
    }

    function random_strings($length_of_string) 
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        return substr(str_shuffle($str_result), 0, $length_of_string); 
    }
}
