<?php

Route::group(['prefix' => 'admin',  'middleware' => 'guest:admin'], function(){
	Route::get('/', 'AdminController@showLoginPage')->name('admin.login');
	Route::post('/', 'AdminController@submitLoginForm')->name('admin.login.submit');
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth:admin'], function(){
	Route::get('/home', 'AdminController@showDashboardMethod')->name('admin.home');

	Route::get('profile/edit', 'AdminController@showProfileMethod')->name('admin.profile.show');
	Route::put('/profile', 'AdminController@submitProfileForm')->name('admin.profile.update');

	Route::get('/logout', 'AdminController@logoutMethod')->name('admin.logout');

	Route::get('/ages', 'AgeController@showAllAges')->name('admin.ages.enabled.show');
	Route::post('/age', 'AgeController@storeNewAge')->name('admin.new.age.store');
	Route::put('/age/{ageId}', 'AgeController@updateAgeMethod')->name('admin.age.update');
	Route::delete('/age/{ageId}', 'AgeController@deleteAgeMethod')->name('admin.age.delete');
	Route::get('/ages/deleted', 'AgeController@showAllDeletedAges')->name('admin.ages.deleted.show');
	Route::patch('age/{ageId}', 'AgeController@restoreDeletedAge')->name('admin.deleted.age.restore');

	Route::get('/award-settings/edit', 'SettingController@showAwardSetting')->name('admin.award-settings.show');
	Route::put('/award-settings', 'SettingController@submitAwardSetting')->name('admin.award-settings.update');

	Route::get('/categories', 'CategoryController@showAllEnabledCategories')->name('admin.categories.enabled.show');
	Route::post('/category', 'CategoryController@storeNewCategory')->name('admin.new.category.store');
	Route::put('/category/{ageId}', 'CategoryController@updateCategoryMethod')->name('admin.category.update');
	Route::delete('/category/{ageId}', 'CategoryController@deleteCategoryMethod')->name('admin.category.delete');
	Route::get('/categories/deleted', 'CategoryController@showAllDeletedCategories')->name('admin.categories.deleted.show');
	Route::patch('category/{categoryId}', 'CategoryController@restoreDeletedCategory')->name('admin.deleted.category.restore');

	Route::get('/content-types', 'ContentTypeController@showAllEnabledContentTypes')->name('admin.contentTypes.enabled.show');
	Route::post('/content-type', 'ContentTypeController@storeNewContentType')->name('admin.new.contentType.store');
	Route::put('/content-type/{ageId}', 'ContentTypeController@updateContentTypeMethod')->name('admin.contentType.update');
	Route::delete('/content-type/{ageId}', 'ContentTypeController@deleteContentTypeMethod')->name('admin.contentType.delete');
	Route::get('/content-types/deleted', 'ContentTypeController@showAllDeletedContentTypes')->name('admin.contentTypes.deleted.show');
	Route::patch('content-type/{categoryId}', 'ContentTypeController@restoreDeletedContentType')->name('admin.deleted.contentType.restore');

	Route::get('/media-types', 'MediaTypeController@showAllEnabledMediaTypes')->name('admin.mediaTypes.enabled.show');
	Route::post('/media-type', 'MediaTypeController@storeNewMediaType')->name('admin.new.mediaType.store');
	Route::put('/media-type/{ageId}', 'MediaTypeController@updateMediaTypeMethod')->name('admin.mediaType.update');
	Route::delete('/media-type/{ageId}', 'MediaTypeController@deleteMediaTypeMethod')->name('admin.mediaType.delete');
	Route::get('/media-types/deleted', 'MediaTypeController@showAllDeletedMediaTypes')->name('admin.mediaTypes.deleted.show');
	Route::patch('media-type/{categoryId}', 'MediaTypeController@restoreDeletedMediaType')->name('admin.deleted.mediaType.restore');

	Route::get('/years', 'YearController@showAllYears')->name('admin.years.enabled.show');
	Route::post('/year', 'YearController@storeNewYear')->name('admin.new.year.store');
	Route::put('/year/{yearId}', 'YearController@updateYearMethod')->name('admin.year.update');
	Route::delete('/year/{yearId}', 'YearController@deleteYearMethod')->name('admin.year.delete');
	Route::get('/years/deleted', 'YearController@showAllDeletedYears')->name('admin.years.deleted.show');
	Route::patch('year/{yearId}', 'YearController@restoreDeletedYear')->name('admin.deleted.year.restore');

	Route::get('/applications', 'ApplicationController@showAllApplications')->name('admin.applications.enabled.show');
	Route::post('/filter', 'ApplicationController@filterApplications')->name('admin.applications.filtering.show');

	Route::get('archived/years', 'ApplicationController@showArchiveYears')->name('admin.years.archived');
	Route::get('archived/applications/{yearId}', 'ApplicationController@showAllApplicationsYearly')->name('admin.applications.archived.show');

	Route::get('/photos', 'PhotoController@showAllPhotos')->name('admin.photos.enabled.show');
	Route::post('/photo', 'PhotoController@storeNewPhoto')->name('admin.new.photo.store');
	Route::put('/photo/{photoId}', 'PhotoController@updatePhotoMethod')->name('admin.photo.update');
	Route::delete('/photo/{photoId}', 'PhotoController@deletePhotoMethod')->name('admin.photo.delete');
	Route::get('/photos/deleted', 'PhotoController@showAllDeletedPhotos')->name('admin.photos.deleted.show');
	Route::patch('photo/{photoId}', 'PhotoController@restoreDeletedPhoto')->name('admin.deleted.photo.restore');

	Route::get('/download', 'ApplicationController@exportToExcel')->name('admin.applications.download');
});

Route::fallback(function () {
	return redirect()->route('admin.login');
});
