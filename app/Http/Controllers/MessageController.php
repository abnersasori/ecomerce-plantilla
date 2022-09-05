<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\MailContacto;

use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
    
    public function sendEmail(){


          $message=request()->validate([

            'titulo'=>'required',
            'email'=>'required',
            'asunto'=>'required',
            'contenido'=>'required'
        ]);

        // ya recivimos la informacion del form de contacto en formato jason ahora vamos a enviar el email

        Mail::to('aberganza@ufm.edu')->send(new MailContacto($message));

        Mail::to($message['email'])->send(new MailContacto($message));

        return 'mensaje enviado';

    }
}
