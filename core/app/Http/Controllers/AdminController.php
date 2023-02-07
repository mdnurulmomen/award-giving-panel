<?php

namespace App\Http\Controllers;

use DB;
use SweetAlert;
use App\Models\Year;
use App\Models\Application;
use App\Models\AwardSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageIntervention;

class AdminController extends Controller
{
    public function showLoginPage()
    {
    	return view('admin.login');
    }

    public function submitLoginForm(Request $request)
    {
    	$request->validate([
    		'email'=>'required',
    		'password'=>'required'
    	]);

    	$credentials = $request->only('email', 'password');

    	if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->route('admin.home')->with('success', 'Welcome to Home');
    	}
        
        SweetAlert::error('Wrong Email or Password', 'Oops');
    	return redirect()->back()->withErrors('Incorrect Email or Password');
    }

    public function showDashboardMethod()
    {
        $currentAwardSettings = AwardSetting::first();
        $currentYear = Year::find($currentAwardSettings->current_year)->name ?? 'None';

        return view('admin.home', compact('currentYear'));
    }

    public function showProfileMethod()
    {
        $profile =  Auth::guard('admin')->user();
        return view('admin.profile', compact('profile'));
    }

    public function submitProfileForm(Request $request)
    {
        $profile = Auth::guard('admin')->user();

        $request->validate([
            'email'=>'required|unique:admins,email,'.$profile->id,
            'picture'=>'image',
        ]);

                
        $profile->firstname = $request->firstname;
        $profile->lastname =  $request->lastname;
        $profile->email = $request->email;
        $profile->gender = $request->gender;
        $profile->phone = $request->phone;

        if($request->has('picture')){
            $originImageFile = $request->file('picture');
            $imageObject = ImageIntervention::make($originImageFile);
            $imageObject->resize(200, 200)->save('assets/admin/images/profile/'.$originImageFile->hashname());
            $profile->picture = $originImageFile->hashname();
        }

        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->country = $request->country;

        $profile->save();

        return redirect()->back()->with(compact('profile'))->with('success', 'Profile Successfully Updated');
    }

    public function logoutMethod()
    {
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.login');
    }
}
