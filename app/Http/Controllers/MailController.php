<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderUserConfirmationMail;
use App\Mail\OrderCarrierConfirmationMail;

class MailController extends Controller
{
    static function sendOrderConfirmation($order,$userMail,$carrierMail) {
        Mail::to($userMail)->send(new OrderUserConfirmationMail($order));
        Mail::to($carrierMail)->send(new OrderCarrierConfirmationMail($order));
        //dd("Email is sent successfully.");
    }
}
