<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function AllMessages(){

        $messages = Contact::all();
        return view('admin.contact.all-message', compact('messages'));

    }
}
