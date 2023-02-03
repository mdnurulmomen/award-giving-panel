<?php

namespace App\Http\Controllers;

use App\Models\Age;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function showAllAges()
    {
    	$allAges = Age::paginate(8);
    	return view('admin.age.all_enabled', compact('allAges'));
    }

    public function storeNewAge(Request $request)
    {
    	$request->validate([
    		'name'=>'required|unique:ages,name'
    	]);

    	$newAge = Age::create(['name' => ucfirst($request->name)]);

    	return redirect()->back()->with('success', 'New Age Variant is Added');
    }

    public function updateAgeMethod(Request $request, $ageId)
    {
    	$objectToUpdate = Age::find($ageId);

    	$request->validate([
    		'name'=>'required|unique:ages,name,'.$objectToUpdate->id
    	]);

    	$objectToUpdate->name = ucfirst($request->name);
    	$objectToUpdate->save();

    	return redirect()->back()->with('success', 'Age Variant is Updated');
    }

    public function deleteAgeMethod(Request $request, $ageId)
    {
    	$objectToDelete = Age::find($ageId);
    	$objectToDelete->delete();

    	return redirect()->back()->with('success', 'New Age Variant is Deleted');
    }

    public function showAllDeletedAges()
    {
    	$allAges = Age::onlyTrashed()->paginate(8);
    	return view('admin.age.all_disabled', compact('allAges'));
    }

    public function restoreDeletedAge(Request $request, $ageId)
    {
    	$objectToRestore = Age::withTrashed()->find($ageId);
    	$objectToRestore->restore();

    	return redirect()->back()->with('success', 'Age Variant is Restored');
    }
}
