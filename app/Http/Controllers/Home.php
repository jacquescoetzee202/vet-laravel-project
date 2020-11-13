<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;

class Home extends Controller
{
    public function index()
    {   
        $currentDateTime = new DateTime();
        $time = $currentDateTime->format('H');

        if($time < 12){
            $message = "Good Morning!";
        }
        else if($time < 17){
            $message = "Good Afternoon";
        } else {
            $message = "Good Evening";
        }

        return view("welcome", [
            "message" => $message
        ]);
    }
}
