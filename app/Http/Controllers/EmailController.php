<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Mail\NotificationEmail;
use App\Models\Email;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function __construct(protected EmailService $service) {}

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'to' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $this->service->send($request->all());

        return response()->json(['message' => 'E-mail cadastrado com sucesso']);
    }
}
