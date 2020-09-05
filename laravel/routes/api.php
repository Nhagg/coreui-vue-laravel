<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('classes', 'ClassAPIController');
Route::resource('courses', 'CourseAPIController');
Route::resource('edu_centers', 'EduCenterAPIController');
Route::resource('exams', 'ExamAPIController');
Route::resource('exam_learn_items', 'ExamLearnItemAPIController');
Route::resource('exam_results', 'ExamResultAPIController');
Route::resource('learn_items', 'LearnItemAPIController');
Route::resource('learn_transactions', 'LearnTransactionAPIController');
Route::resource('learn_units', 'LearnUnitAPIController');
Route::resource('lessions', 'LessionAPIController');
Route::resource('student_settings', 'StudentSettingAPIController');
Route::resource('user_classes', 'UserClassAPIController');

Route::resource('conversation_persons', 'ConversationPersonAPIController');

Route::post("login", "AuthController@login");
Route::post("auth", "AuthController@auth");
Route::resource('tracking', 'TrackingAPIController');
Route::middleware('auth:sanctum')->group(function () {
    Route::post("logout", "AuthController@logout");
});
//
//Route::group(['middleware' => 'api'], function ($router) {
//    Route::get('menu', 'MenuController@index');
//
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('register', 'AuthController@register');
//
//    Route::resource('notes', 'NotesController');
//
//    Route::resource('resource/{table}/resource', 'ResourceController');
//
//    Route::group(['middleware' => 'admin'], function ($router) {
//
//        Route::resource('mail',        'MailController');
//        Route::get('prepareSend/{id}', 'MailController@prepareSend')->name('prepareSend');
//        Route::post('mailSend/{id}',   'MailController@send')->name('mailSend');
//
//        Route::resource('bread',  'BreadController');   //create BREAD (resource)
//
//
//        Route::prefix('menu/menu')->group(function () {
//            Route::get('/',         'MenuEditController@index')->name('menu.menu.index');
//            Route::get('/create',   'MenuEditController@create')->name('menu.menu.create');
//            Route::post('/store',   'MenuEditController@store')->name('menu.menu.store');
//            Route::get('/edit',     'MenuEditController@edit')->name('menu.menu.edit');
//            Route::post('/update',  'MenuEditController@update')->name('menu.menu.update');
//            Route::get('/delete',   'MenuEditController@delete')->name('menu.menu.delete');
//        });
//        Route::prefix('menu/element')->group(function () {
//            Route::get('/',             'MenuElementController@index')->name('menu.index');
//            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
//            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
//            Route::get('/create',       'MenuElementController@create')->name('menu.create');
//            Route::post('/store',       'MenuElementController@store')->name('menu.store');
//            Route::get('/get-parents',  'MenuElementController@getParents');
//            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
//            Route::post('/update',      'MenuElementController@update')->name('menu.update');
//            Route::get('/show',         'MenuElementController@show')->name('menu.show');
//            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
//        });
        Route::prefix('media')->group(function ($router) {
            Route::post('folder',           'MediaController@createFolder')->name('media.folder.add');
	        Route::get('folder',            'MediaController@listFolders')->name('media.folder.list');
            Route::post('/file',            'MediaController@fileAdd')->name('media.file.add');
        });
//
//        Route::resource('roles',        'RolesController');
//        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
//        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
//    });
//});


Route::resource('news', 'NewsAPIController');
Route::resource('users', 'UserAPIController');


