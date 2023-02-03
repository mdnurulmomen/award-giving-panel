<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\User;
use App\Models\Year;
use App\Models\Application;
use App\Models\AwardSetting;
use Illuminate\Http\Request;
use App\Exports\ApplicationExport;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
	public function showAllApplications()
	{
      $yearName =  Year::find(DB::table('award_settings')->first()->current_year)->name ?? 'None';
      $categoryId = null;
      $contentTypeId = null;
      $ageId = null;
      $allApplications = Application::whereYear('created_at', $yearName)->with('user')->orderBy('id', 'DESC')->paginate(50);



		return view('admin.application.all_enabled', compact('allApplications', 'yearName', 'categoryId', 'contentTypeId', 'ageId'));
	}

	public function filterApplications(Request $request)
	{
      $yearName = Year::find($request->year)->name;
      $categoryId = $request->category;
      $contentTypeId = $request->content_type;
      $ageId = $request->age;

      $allApplications = Application::whereYear('created_at', $yearName)->with(['user','contentType', 'relatedMedia'])->orderBy('id', 'DESC')->get();

		if ($request->has('category')) {
		    $allApplications = $allApplications->where('category_id', $categoryId);
		}

		if ($request->has('content_type')) {
		    $allApplications = $allApplications->where('content_type_id', $contentTypeId);
		}

		if ($request->has('age')) {
		    $allApplications = $allApplications->where('user.age_id', $ageId);
		}

		return view('admin.application.all_enabled', compact('allApplications', 'yearName', 'categoryId', 'contentTypeId', 'ageId'));
	}

   public function showArchiveYears()
   {
      $currentYear = DB::table('award_settings')->first()->current_year;
      $allYears = Year::where('id', '!=', $currentYear)->orderBy('id', 'ASC')->get();

      return view('admin.archive.all_years', compact('allYears'));
   }

   public function showAllApplicationsYearly($yearId)
   {
      $yearName = Year::find($yearId)->name;
      $categoryId = null;
      $contentTypeId = null;
      $ageId = null;

      $allApplications = Application::whereYear('created_at', $yearName)->with('user')->orderBy('id', 'DESC')->paginate(50);

      return view('admin.application.all_enabled', compact('allApplications', 'yearName', 'categoryId', 'contentTypeId', 'ageId'));
   }

   public function exportToExcel() 
   {  
      $allApplications = Session::get('allApplications');
      return Excel::download(new ApplicationExport($allApplications), 'applications.xlsx');
   }
}
