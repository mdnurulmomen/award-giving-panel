<?php

namespace App\Http\Controllers;

use DB;
use App\Models\AwardSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   	public function showAwardSetting()
   	{
         $currentAwardSettings = DB::table('award_settings')->get()->first();
   		return view('admin.setting.current_award_setting', compact('currentAwardSettings'));
   	}

   	public function submitAwardSetting(Request $request)
   	{
   		$request->validate([
            'current_year'=>'required',
            'submission_deadline'=>'required',
            'delay_submission_message'=>'required'
   		]);

   		$currentAwardSettings = AwardSetting::firstOrCreate([]);

   		$currentAwardSettings->current_year = $request->current_year;
         
         $currentAwardSettings->first_email = $request->first_email;
         $currentAwardSettings->first_email_holder_name = $request->first_email_holder_name;

         $currentAwardSettings->second_email = $request->second_email;
         $currentAwardSettings->second_email_holder_name = $request->second_email_holder_name;

   		$currentAwardSettings->submission_deadline = $request->submission_deadline;
   		$currentAwardSettings->delay_submission_message = $request->delay_submission_message;

   		$currentAwardSettings->save();

   		return redirect()->back()->with('success', 'Award Setting is updated');
   	}

}
