<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{

    public function  __construct() {

        $this->middleware('admin');
}

    public function index() {

        return view('admin.settings.setting')->with('settings', Setting::first());


    }
    public function update() {

        $this->validate(request(),[

            'site_name' => 'required',

            'contact_number' => 'required',

            'address' => 'required'


            ]);
    $settings = Setting::first();

    $settings->site_name = request()->site_name;

    $settings->address = request()->address;

    $settings->contact_number = request()->contact_number;

    $settings->save();

    Session::flash('success', 'Setting updated');

    return redirect()->back();


    }
}
