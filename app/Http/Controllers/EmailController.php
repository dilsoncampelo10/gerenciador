<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $data = $request->all();
  
        Mail::to('dilson.contato316@gmail.com')->send(new NotificationEmail($data));

        return response()->json(['message' => 'E-mail enviado com sucesso!']);
    }
}
