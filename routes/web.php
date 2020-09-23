<?php

use Illuminate\Support\Facades\Route;
// Doctor admin side
// Doctor Admin Doctor
Route::get('doctoradmin/add-doctor', 'DoctorController@index')->name('add.doctor');
Route::post('doctoradmin/store-doctor', 'DoctorController@store')->name('store.doctor');
Route::get('doctoradmin/view-doctors', 'DoctorController@view')->name('view.doctors');
Route::get('doctoradmin/delete-doctor/{id}', 'DoctorController@destroy')->name('delete.doctor');
Route::get('doctoradmin/edit-doctor/{id}', 'DoctorController@edit')->name('edit.doctor');
Route::post('doctoradmin/update-doctor/{id}', 'DoctorController@update')->name('update.doctor');
// Appoinments doctor admin side
Route::get('doctoradmin/show-appoinments', 'AppoinmentController@show')->name('show.appoinments');
Route::get('doctoradmin/accept/{id}', 'AppoinmentController@accept')->name('accept');
Route::get('doctoradmin/reject/{id}', 'AppoinmentController@reject')->name('reject');

// Doctor admin profile
Route::get('doctoradmin/profile', 'DoctoradminDoctorController@index')->name('profile.admin');
Route::post('doctoradmin/update-profile', 'DoctoradminDoctorController@update')->name('update.admin');

// Admin Side
// Admin Hospital
Route::get('admin/add-hospital', 'HospitalController@index')->name('add.hospital');
Route::post('admin/store-hospital', 'HospitalController@store')->name('store.hospital');
Route::get('admin/view-hospitals', 'HospitalController@view')->name('view.hospitals');
Route::get('admin/delete-hospital/{id}', 'HospitalController@destroy')->name('delete.hospital');
Route::get('admin/edit-hospital/{id}', 'HospitalController@edit')->name('edit.hospital');
Route::post('admin/update-hospital/{id}', 'HospitalController@update')->name('update.hospital');

// Admin Pharmacy
Route::get('admin/add-pharmacy', 'PharmacyController@index')->name('add.pharmacy');
Route::post('admin/store-pharmacy', 'PharmacyController@store')->name('store.pharmacy');
Route::get('admin/view-pharmacies', 'PharmacyController@view')->name('view.pharmacies');
Route::get('admin/delete-pharmacy/{id}', 'PharmacyController@destroy')->name('delete.pharmacy');
Route::get('admin/edit-pharmacy/{id}', 'PharmacyController@edit')->name('edit.pharmacy');
Route::post('admin/update-pharmacy/{id}', 'PharmacyController@update')->name('update.pharmacy');

// Admin Animal
Route::get('admin/add-animal', 'AnimalController@index')->name('add.animal');
Route::post('admin/store-animal', 'AnimalController@store')->name('store.animal');
Route::get('admin/view-animals', 'AnimalController@view')->name('view.animals');
Route::get('admin/delete-animal/{id}', 'AnimalController@destroy')->name('delete.animal');
Route::get('admin/edit-animal/{id}', 'AnimalController@edit')->name('edit.animal');
Route::post('admin/update-animal/{id}', 'AnimalController@update')->name('update.animal');

// Admin Disease
Route::get('admin/add-diseas', 'DiseasController@index')->name('add.diseas');
Route::post('admin/store-diseas', 'DiseasController@store')->name('store.diseas');
Route::get('admin/view-diseases', 'DiseasController@view')->name('view.diseases');
Route::get('admin/delete-diseas/{id}', 'DiseasController@destroy')->name('delete.diseas');
Route::get('admin/edit-diseas/{id}', 'DiseasController@edit')->name('edit.diseas');
Route::post('admin/update-diseas/{id}', 'DiseasController@update')->name('update.diseas');

// Admin Cures
Route::get('admin/add-cure', 'CureController@index')->name('add.cure');
Route::post('admin/store-cure', 'CureController@store')->name('store.cure');
Route::get('admin/view-cures', 'CureController@view')->name('view.cures');
Route::get('admin/delete-cure/{id}', 'CureController@destroy')->name('delete.cure');
Route::get('admin/edit-cure/{id}', 'CureController@edit')->name('edit.cure');
Route::post('admin/update-cure/{id}', 'CureController@update')->name('update.cure');
// View Doctoradmin
Route::get('admin/view-doctoradmin', 'DoctoradminDoctorController@show')->name('view.doctoradmin');
Route::get('admin/single-doctoradmin/{id}', 'DoctoradminDoctorController@single')->name('single.doctoradmin');
Route::get('admin/approve-doctoradmin/{id}', 'DoctoradminDoctorController@approve')->name('approve.doctoradmin');

//CkEditor Routes
Route::post('ckeditor/image_upload', 'HomeController@upload')->name('upload');

// User Side
Route::get('/', function () {
    return view('user.home');
});
// User hospital
Route::get('/hospitals', 'HospitalController@viewAll')->name('hospitals');
Route::post('show', 'HospitalController@show');
Route::get('details/{id}', 'HospitalController@placeDetailsAjax');
Route::get('/hospital-details/{id}', 'HospitalController@placeDetailsLaravel')->name('hospital.details');
// User pharmacy
Route::get('/pharmacies', 'PharmacyController@viewAll')->name('pharmacies');
Route::post('show-pharmacy', 'PharmacyController@show');
Route::get('details-pharmacy/{id}', 'PharmacyController@placeDetailsAjax');
Route::get('/pharmacy-details/{id}', 'PharmacyController@placeDetailsLaravel')->name('pharmacy.details');
// User Doctor
Route::get('/doctors', 'DoctorController@viewAll')->name('doctors');
Route::post('show-doctor', 'DoctorController@show');
Route::get('details-doctor/{id}', 'DoctorController@placeDetailsAjax');
Route::get('/doctor-details/{id}', 'DoctorController@placeDetailsLaravel')->name('doctor.details');
// User Cures
Route::get('/cures', 'CureController@viewAll')->name('cures');
Route::get('/read/{id}', 'CureController@read')->name('read');
Route::get('find/{id}', 'CureController@find');
Route::post('/findCure', 'CureController@findCure')->name('find.cure');

// User Appoinment
Route::post('/store-appoinment', 'AppoinmentController@store')->name('store.appoinment');
Route::get('/appoinments', 'AppoinmentController@index')->name('appoinments');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
