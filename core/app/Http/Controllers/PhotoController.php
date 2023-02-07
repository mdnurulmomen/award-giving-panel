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
    	]);

    	$newPhoto = new Photo();
    	$newPhoto->title = ucfirst($request->title);
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
        ]);

        $objectToUpdate->title = ucfirst($request->title);
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
