<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'appController@index')->middleware('auth');
Route::get('/home', 'appController@index')->middleware('auth');

//Pupil  Routes
Route::get('/pupil/newPupil', 'pupilController@index');
Route::post('/pupil/SuspensionForm','pupilController@SuspensionFormFill');
Route::get('/pupil/views','pupilController@show');
Route::get('/pupil/psd','pupilController@show_subjects');
Route::get('/pupil/SuspensionForm','pupilController@SuspensionForm');
Route::post('/pupil/newPupil/save', 'pupilController@store');
Route::post('/pupil/newPupil/save/{pupil}','pupilController@subjects');
Route::post('/pupil/newPupilgenderSet/{pupil}','pupilController@finish');
Route::get('/pupil/editpupil/{pupil}','pupilController@edit');
Route::get('/pupil/Detailed/{pupil}','pupilController@info');
Route::post('/pupil/SuspensionEnd','suspensionController@update');
Route::patch('/pupil/editpupil/save/{pupil}', 'pupilController@update');
Route::post('/pupil/Suspend/{pupil}','suspensionController@store');
Route::get('/pupil/AddPassportSizedPhoto','pupilController@AddPassportSizedPhoto');
Route::get('/pupil/AddPassportSizedPhoto/{pupil}','pupilController@AddPassportSizedPhotoLoad');
Route::post('/pupil/passportPhoto/upload','pupilController@SavePassportSizedPhoto');

//classes
Route::get('/class/new','classesController@index');
Route::post('/class/new/save', 'classesController@store');
Route::get('/class/viewclasses','classesController@show');
Route::get('/classes/edit/{class}','classesController@edit');
Route::patch('/class/new/edit/{class}','classesController@update');


//parents
Route::get('/parents/viewAllParents','parentController@showall');
Route::get('/parents/editparent','parentController@new');
Route::post('/parents/newParent/Save', 'parentController@store');
Route::post('/parents/pupilParentBinding/{pupil}','pupilController@postparent');
Route::get('/parents/parentcontact','parentController@show');
Route::get('/parents/parent_records/{pupil}','pupilController@getparent');
Route::get('/parents/profile/{parent}','parentController@index');



//Teacher Routes
Route::get('/newteacher','teacherController@edit');
Route::post('/newteacher/save','teacherController@store');
Route::get('/teachers','teacherController@show');
Route::get('/updateteacher','teacherController@action');
Route::post('/teacherPopulateUpdateForm','teacherController@update_fetch');
Route::patch('/newteacher/update/{teacher}','teacherController@update');

//Fees Routes
Route::get('/fees/payfee','feesController@edit');
Route::get('/fees/payfees/{pupil}','feesController@search');
Route::post('/payfee/payfor/{pupil}','feesController@store');
Route::get('/pupilGenerateSlip/{transaction}','feesController@slip');
Route::post('/unbilledPupilBillingService/{term}/{pupil}', 'billingController@bill');

//Term Routes
Route::get('/newterm','termsController@new');
Route::post('/saveNewTrem/{user}','termsController@store');
Route::get('/terms','termsController@index');
Route::get('/termdates','termsController@newTermDate');
Route::post('/TermEvents/{term}','termsController@events');
Route::get('/listTermEvents/{event}','termsController@calendar');
Route::get('/EditTermEvents/{event}','termsController@editEvent');
Route::patch('/EditingTermEvents/{event}','termsController@update');
Route::get('/PupilDiscoverBillings/{pupil}','billingController@index');
Route::get('/terms','termsController@show');
Route::get('/billAllPupils/{term}','termsController@billAllPupils');
Route::get('/termDetails/{term}','termsController@showIndividualTerm');

//Search
Route::get('/findpupil','pupilController@search');

//exams
Route::get('/exams/uploadMarklist','examController@index');
Route::get('/exams/ViewExamRecords','examController@show');
Route::post('/exams/uploadMarklist/save/{user}','examController@store');
Route::get('/exams/fetchclass','examController@getpupils');
Route::get('/exams/fetchpupil','examController@getpupilexams');
Route::post('/exams/getResultsForExamMark','examController@getMarks');
Route::get('/exams/fetchSelectedClass','examController@findExamResults');
Route::post('/exams/getResultsForClassSelected','examController@loadExamResults');