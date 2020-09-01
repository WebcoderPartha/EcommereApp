<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sitesetting;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class SitesettingController extends Controller
{

    public function siteSetting(){

        $site_setting = Sitesetting::first();
        return view('admin.site-setting', compact('site_setting'));
    }

    public function siteSettingUpdate(Request $request){

        $this->validate($request, [
            'phone_one'         => 'required',
            'phone_two'         => 'required',
            'email'             => 'required',
            'company_name'      => 'required',
            'company_address'   => 'required',
            'facebook'          => 'required',
            'youtube'           => 'required',
            'instagram'         => 'required',
            'twitter'           => 'required',
        ]);

        $siteSetting = Sitesetting::where('id', $request->id)->first();
        $siteSetting->phone_one         = $request->phone_one;
        $siteSetting->phone_two         = $request->phone_two;
        $siteSetting->email             = $request->email;
        $siteSetting->company_name      = $request->company_name;
        $siteSetting->company_address   = $request->company_address;
        $siteSetting->facebook          = $request->facebook;
        $siteSetting->youtube           = $request->youtube;
        $siteSetting->instagram         = $request->instagram;
        $siteSetting->twitter           = $request->twitter;

        if ( $siteSetting->isDirty('phone_one')
            || $siteSetting->isDirty('phone_two')
            || $siteSetting->isDirty('email')
            || $siteSetting->isDirty('company_name')
            || $siteSetting->isDirty('company_address')
            || $siteSetting->isDirty('facebook')
            || $siteSetting->isDirty('youtube')
            || $siteSetting->isDirty('instagram')
            || $siteSetting->isDirty('twitter') ){

            $siteSetting->save();
            Toastr::success('Site setting updated successfully');
            return redirect()->back();

        }else{

            Toastr::warning('Nothing to updated!');
            return redirect()->back();

        }

    }


}
