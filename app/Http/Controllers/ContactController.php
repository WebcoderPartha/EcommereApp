<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function contactPage(){

        return view('pages.contact-page');

    }

    public function sendMessage(Request $request){

        $message  = new Contact;
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        Toastr::success('Message sent successfully');
        return redirect()->back();

    }
}
