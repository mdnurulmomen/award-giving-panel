<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaTypeController extends Controller
{
   	public function showAllEnabledMediaTypes()
    {
    	$allMediaTypes = MediaType::paginate(8);
    	return view('admin.mediaType.all_enabled', compact('allMediaTypes'));
    }

    public function storeNewMediaType(Request $request)
    {
    	$request->validate([
    		'name'=>'required|unique:media_types,name'
    	]);

    	$newMediaType = MediaType::create(['name' => ucfirst($request->name)]);

    	return redirect()->back()->with('success', 'New MediaType Variant is Added');
    }

    public function updateMediaTypeMethod(Request $request, $mediaTypeId)
    {
    	$objectToUpdate = MediaType::find($mediaTypeId);

    	$request->validate([
    		'name'=>'required|unique:media_types,name,'.$objectToUpdate->id
    	]);

    	$objectToUpdate->name = ucfirst($request->name);
    	$objectToUpdate->save();

    	return redirect()->back()->with('success', 'MediaType Variant is Updated');
    }

    public function deleteMediaTypeMethod(Request $request, $mediaTypeId)
    {
    	$objectToDelete = MediaType::find($mediaTypeId);
    	$objectToDelete->delete();

    	return redirect()->back()->with('success', 'New MediaType Variant is Deleted');
    }

    public function showAllDeletedMediaTypes()
    {
    	$allMediaTypes = MediaType::onlyTrashed()->paginate(8);
    	return view('admin.mediaType.all_disabled', compact('allMediaTypes'));
    }

    public function restoreDeletedMediaType(Request $request, $mediaTypeId)
    {
    	$objectToRestore = MediaType::withTrashed()->find($mediaTypeId);
    	$objectToRestore->restore();

    	return redirect()->back()->with('success', 'MediaType Variant is Restored');
    }
}
