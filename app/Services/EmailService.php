<?php

namespace App\Services;

use App\Enums\Email\EmailStatus;
use App\Mail\NotificationEmail;
use App\Models\Email;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function send(array $data)
    {
        $email = new Email();

        $email->name = $data['name'];
        $email->to = $data['to'];
        $email->subject = $data['subject'];
        $email->message = $data['message'];

        try {
            Mail::to(env('FROM_EMAIL'))->send(new NotificationEmail($data));
            $email->status = EmailStatus::SENT;
        } catch (Exception $e) {
            $email->status = EmailStatus::ERROR;
        }

        return $email->save();
    }
}
