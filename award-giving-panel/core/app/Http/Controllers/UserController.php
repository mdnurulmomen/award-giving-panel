<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use SweetAlert;
use Carbon\Carbon;
use App\Models\Year;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\MediaFile;
use App\Models\MediaLink;
use App\Models\Application;
use App\Models\AwardSetting;
use Illuminate\Http\Request;
use App\Models\ApplicationRelatedMedia;
use App\Http\Requests\ApplicationRequest;

class UserController extends Controller
{
   	public function showUserIndexPage()
   	{
   		$currentAwardSettings = DB::table('award_settings')->get()->first();
         return view('user.index', compact('currentAwardSettings'));
   	}

   	public function showApplyForm()
   	{
   		return view('user.apply.form');
   	}

   	public function submitApplyForm(ApplicationRequest $request)
   	{ 
         
		/*Creating User First*/
         $newUser = new User();
         $newUser->name = $request->name;
         $newUser->birth_date = $request->birth_date;
         $newUser->email = $request->email;
         $newUser->phone = $request->phone;
         $newUser->phone_alt = $request->phone_alt;
         $newUser->address = $request->address;
         $newUser->age_id = $request->age_id;
         $newUser->save();


         /*Creating Application*/
         $newApplication = $newUser->application()->create([
            'category_id' => $request->category_id,
            'content_type_id' => $request->content_type_id
         ]);

         // image to be stored in specific folder
         $categoryName = Category::find($request->category_id)->name;

         for ($i=0; $i<count($request->title); $i++) {

            /* Creating Appications related Media */
            $newRelatedMedia = $newApplication->relatedMedia()->create([
               'title' => $request->title[$i],
               'media_type_id' => $request->media_type_id[$i] ?? '14',
               'name_videographer' => $request->name_videographer[$i],
               'videographer_phone' => $request->videographer_phone[$i],
               'videographer_email' => $request->videographer_email[$i],
               'date_publishment' => $request->date_publishment[$i]
            ]);

			
   			if($request->hasFile("filePrintOnlineMedia.$i")){ 

   				$filePrintOnlineMedia = $newRelatedMedia->mediaFiles()->create([
   					'media_file' => $request->file('filePrintOnlineMedia')[$i]->store('photo/'.$categoryName.'/')
   				]);
   			}
			
   			if($request->hasFile("fileNewsPhotography_1.$i")){

   				$fileNewsPhotography_1 = $newRelatedMedia->mediaFiles()->create([
   					'media_file' => $request->file('fileNewsPhotography_1')[$i]->store('photo/'.$categoryName.'/')
   				]);
   			}
			
   			if($request->hasFile("fileNewsPhotography_2.$i")){

   				$fileNewsPhotography_2 = $newRelatedMedia->mediaFiles()->create([
   					'media_file' => $request->file('fileNewsPhotography_2')[$i]->store('photo/'.$categoryName.'/')
   				]);
   			}
			 
   			if (isset($request->linkPrintOnlineMedia[$i])) {

   				$newlinkPrintOnlineMedia = $newRelatedMedia->mediaLinks()->create([
   					'media_link' => $request->linkPrintOnlineMedia[$i]
   				]);
   			}
			 
   			if (isset($request->linkVisualOrRadio[$i])) {

   				$newLinkVisualOrRadio = $newRelatedMedia->mediaLinks()->create([
                  'media_link' => $request->linkVisualOrRadio[$i]
   				]);
   			}

            // Publisher of Related Media Entry
            $newPublisher = $newRelatedMedia->publisher()->create([
               'publisher_name' => $request->publisher_name[$i],
               'representative_name' => $request->representative_name[$i],
               'representative_designation' => $request->representative_designation[$i],
               'representative_organization' => $request->representative_organization[$i],
               'representative_phone' => $request->representative_phone[$i],
               'representative_email' => $request->representative_email[$i]
            ]);
            
         }

         SweetAlert::success('Your application has been submitted successfully', 'Thank You')->persistent();
         return redirect()->back();
   	}

      public function submitMailMethod(Request $request)
      {
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'userMessage'=>'required',
         ]);

         $userName = $request->name;
         $userEmail = $request->email ?? 'demo@email.com';
         $userMobile = $request->mobile ?? '01XXXXXXXXX';
         $userMessage = $request->userMessage;

         $awardSettings = AwardSetting::first();

         $toAddress_1 = $awardSettings->first_email;
         $toAddress_1_holder_name = $awardSettings->first_email_holder_name;

         $toAddress_2 = $awardSettings->second_email;
         $toAddress_2_holder_name = $awardSettings->second_email_holder_name;

         $adminName = Admin::first()->firstname.' '.Admin::first()->lastname;


         $sendEmail_1 = $this->sendMail($toAddress_1, $toAddress_1_holder_name, $adminName, $userName, $userEmail, $userMobile, $userMessage);

         $sendEmail_2 = $this->sendMail($toAddress_2, $toAddress_2_holder_name, $adminName, $userName, $userEmail, $userMobile, $userMessage);


         SweetAlert::success('Your message has been sent successfully', 'Thank You')->persistent();

         return redirect()->back()->with('success', 'Your Message is Successfully Sent');
      }

      public function sendMail($toAddress, $toAddress_holder_name, $adminName, $userName, $userEmail, $userMobile, $userMessage)
      {
         Mail::send('user.mail', compact('userName', 'toAddress_holder_name', 'userEmail', 'userMobile', 'userMessage'),

            function($message) use ($toAddress, $toAddress_holder_name, $adminName) {

               $message->to($toAddress, $toAddress_holder_name)
                        ->subject('Meena Media Award Query - '.Carbon::now()->format('d/m/Y H:i:s'));
               $message->from('alreadyConfiguredIn.env@file.com', $adminName);

            }

         );

      }
}
