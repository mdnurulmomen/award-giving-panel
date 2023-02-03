<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function showAllEnabledCategories()
    {
    	$allCategories = Category::paginate(8);
    	return view('admin.category.all_enabled', compact('allCategories'));
    }

    public function storeNewCategory(Request $request)
    {
    	$request->validate([
    		'name'=>'required|unique:categories,name'
    	]);

    	$newCategory = Category::create(['name' => ucfirst($request->name)]);

    	return redirect()->back()->with('success', 'New Category Variant is Added');
    }

    public function updateCategoryMethod(Request $request, $categoryId)
    {
    	$objectToUpdate = Category::find($categoryId);

    	$request->validate([
    		'name'=>'required|unique:categories,name,'.$objectToUpdate->id
    	]);

    	$objectToUpdate->name = ucfirst($request->name);
    	$objectToUpdate->save();

    	return redirect()->back()->with('success', 'Category Variant is Updated');
    }

    public function deleteCategoryMethod(Request $request, $categoryId)
    {
    	$objectToDelete = Category::find($categoryId);
    	$objectToDelete->delete();

    	return redirect()->back()->with('success', 'New Category Variant is Deleted');
    }

    public function showAllDeletedCategories()
    {
    	$allCategories = Category::onlyTrashed()->paginate(8);
    	return view('admin.category.all_disabled', compact('allCategories'));
    }

    public function restoreDeletedCategory(Request $request, $categoryId)
    {
    	$objectToRestore = Category::withTrashed()->find($categoryId);
    	$objectToRestore->restore();

    	return redirect()->back()->with('success', 'Category Variant is Restored');
    }
}
