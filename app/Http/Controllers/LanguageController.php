<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    public function englishLanguge(){

        Session::get('language');
        Session::forget('language');
        Session::put('language', 'english');
        return redirect()->back();

    }

    public function hindiLanguage(){

        Session::get('language');
        Session::forget('language');
        Session::put('language', 'hindi');

        return redirect()->back();

    }
}
