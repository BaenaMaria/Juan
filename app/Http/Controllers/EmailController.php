<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class EmailController extends Controller
{
    public function index(){
        return view('pruebaCorreo');
    }

    public function sendEmail(){

        if(isset($_GET['btnEnviar'])){
            $name = $_GET['name'];
            $phone = $_GET['phone'];
            $email = $_GET['email'];
        }

        Mail::to("prueba@gmail.com")->send(new TestMail($name, $phone, $email));
        return view('welcome');

    }
}
