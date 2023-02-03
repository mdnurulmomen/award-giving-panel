<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
   	public function showAllYears()
    {
    	$allYears = Year::paginate(8);
    	return view('admin.year.all_enabled', compact('allYears'));
    }

    public function storeNewYear(Request $request)
    {
    	$request->validate([
    		'name'=>'required|unique:years,name'
    	]);

    	$newYear = Year::create(['name' => ucfirst($request->name)]);

    	return redirect()->back()->with('success', 'New Year Variant is Added');
    }

    public function updateYearMethod(Request $request, $yearId)
    {
    	$objectToUpdate = Year::find($yearId);

    	$request->validate([
    		'name'=>'required|unique:years,name,'.$objectToUpdate->id
    	]);

    	$objectToUpdate->name = ucfirst($request->name);
    	$objectToUpdate->save();

    	return redirect()->back()->with('success', 'Year Variant is Updated');
    }

    public function deleteYearMethod(Request $request, $yearId)
    {
    	$objectToDelete = Year::find($yearId);
    	$objectToDelete->delete();

    	return redirect()->back()->with('success', 'New Year Variant is Deleted');
    }

    public function showAllDeletedYears()
    {
    	$allYears = Year::onlyTrashed()->paginate(8);
    	return view('admin.year.all_disabled', compact('allYears'));
    }

    public function restoreDeletedYear(Request $request, $yearId)
    {
    	$objectToRestore = Year::withTrashed()->find($yearId);
    	$objectToRestore->restore();

    	return redirect()->back()->with('success', 'Year Variant is Restored');
    }
}
