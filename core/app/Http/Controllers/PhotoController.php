<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoFile;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
   	public function showAllPhotos()
    {
    	$allPhotos = Photo::paginate(8);
    	return view('admin.photo.all_enabled', compact('allPhotos'));
    }

    public function storeNewPhoto(Request $request)
    {
    	$request->validate([
    		'title'=>'required',
            /*
            'category_id'=>'required|numeric',
            'content_type_id'=>'required|numeric',
            'age_id'=>'required|numeric',
            'photo_file'=>'required'
            */
    	]);

    	$newPhoto = new Photo();
    	$newPhoto->title = ucfirst($request->title);
    	/*
        $newPhoto->category_id = $request->category_id;
    	$newPhoto->content_type_id = $request->content_type_id;
    	$newPhoto->age_id = $request->age_id;
    	$newPhoto->description = $request->description;
        */
    	$newPhoto->save();

        if ($request->hasFile('photo_file')) {
               
            foreach($request->file('photo_file') as $photo)
            {
               $newPhotoFile = new PhotoFile();
               $newPhotoFile->photo_path = $photo->store('photo/archived/');
               $newPhotoFile->photo_id = $newPhoto->id;
               $newPhotoFile->save();
            }

        }

    	return redirect()->back()->with('success', 'New Photo Variant is Added');
    }

    public function updatePhotoMethod(Request $request, $photoId)
    {
    	$objectToUpdate = Photo::find($photoId);

    	$request->validate([
            'title'=>'required',
            /*
            'category_id'=>'required|numeric',
            'content_type_id'=>'required|numeric',
            'age_id'=>'required|numeric'
            */
        ]);

        $objectToUpdate->title = ucfirst($request->title);
        /*
        $objectToUpdate->category_id = $request->category_id;
        $objectToUpdate->content_type_id = $request->content_type_id;
        $objectToUpdate->age_id = $request->age_id;
        $objectToUpdate->description = $request->description;
        */
        $objectToUpdate->save();

        if ($request->hasFile('photo_file')) {
            
            $objectToUpdate->photoFiles()->forceDelete();

            foreach($request->file('photo_file') as $photo)
            {
               $newPhotoFile = new PhotoFile();
               $newPhotoFile->photo_path = $photo->store('photo/archived/');
               $newPhotoFile->photo_id = $objectToUpdate->id;
               $newPhotoFile->save();
            }

        }

    	return redirect()->back()->with('success', 'Photo Variant is Updated');
    }

    public function deletePhotoMethod(Request $request, $photoId)
    {
    	$objectToDelete = Photo::find($photoId);
        $objectToDelete->photoFiles()->delete();
    	$objectToDelete->delete();

    	return redirect()->back()->with('success', 'New Photo Variant is Deleted');
    }

    public function showAllDeletedPhotos()
    {
    	$allPhotos = Photo::onlyTrashed()->paginate(8);
    	return view('admin.photo.all_disabled', compact('allPhotos'));
    }

    public function restoreDeletedPhoto(Request $request, $photoId)
    {
    	$objectToRestore = Photo::withTrashed()->find($photoId);
        $objectToRestore->photoFiles()->restore();
    	$objectToRestore->restore();

    	return redirect()->back()->with('success', 'Photo Variant is Restored');
    }
}
