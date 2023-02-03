<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
	public function showAllEnabledContentTypes()
    {
    	$allContentTypes = ContentType::paginate(8);
    	return view('admin.contentType.all_enabled', compact('allContentTypes'));
    }

    public function storeNewContentType(Request $request)
    {
    	$request->validate([
    		'name'=>'required|unique:content_types,name'
    	]);

    	$newContentType = ContentType::create(['name' => ucfirst($request->name)]);

    	return redirect()->back()->with('success', 'New ContentType Variant is Added');
    }

    public function updateContentTypeMethod(Request $request, $contentTypeId)
    {
    	$objectToUpdate = ContentType::find($contentTypeId);

    	$request->validate([
    		'name'=>'required|unique:content_types,name,'.$objectToUpdate->id
    	]);

    	$objectToUpdate->name = ucfirst($request->name);
    	$objectToUpdate->save();

    	return redirect()->back()->with('success', 'ContentType Variant is Updated');
    }

    public function deleteContentTypeMethod(Request $request, $contentTypeId)
    {
    	$objectToDelete = ContentType::find($contentTypeId);
    	$objectToDelete->delete();

    	return redirect()->back()->with('success', 'New ContentType Variant is Deleted');
    }

    public function showAllDeletedContentTypes()
    {
    	$allContentTypes = ContentType::onlyTrashed()->paginate(8);
    	return view('admin.contentType.all_disabled', compact('allContentTypes'));
    }

    public function restoreDeletedContentType(Request $request, $contentTypeId)
    {
    	$objectToRestore = ContentType::withTrashed()->find($contentTypeId);
    	$objectToRestore->restore();

    	return redirect()->back()->with('success', 'ContentType Variant is Restored');
    }
}
