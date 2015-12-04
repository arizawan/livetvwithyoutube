<?php

/*
|--------------------------------------------------------------------------
| Back-end API Routes
|--------------------------------------------------------------------------
*/
use Carbon\Carbon;

//\Debugbar::disable();

// Admin Panel | Auth
Route::group(array('before' => 'admin.login', 'prefix' => 'admin'), function()
{
    # Admin chk
    Route::get('/', function()
    {
        // Filter will take the decision
        $schedules = Schedule::get();
        return View::make('backend.schedules')
                    ->with('schedules', $schedules);
    });

});

# Admin Login
Route::get('admin/login', function()
{
    if ( ! Sentry::check())
    {
        return View::make('backend.login');
    }

});

# Admin Login Post
Route::post('admin/login', array('uses' => 'RainAuthController@postLogin'));

# Admin Logout
Route::get('admin/logout', function()
{
    Sentry::logout();
    return View::make('backend.login');
});

# Admin Registration
Route::get('admin/regdo', function()
{
    $registerUser   =   new User;
    $registerUser->registerUser("Live", "Admin", "admin@livetvapp.com", "thunder32", "gods");
});

// Admin Panel | Schedule
Route::group(array('before' => 'admin.login', 'prefix' => 'admin/schedules'), function()
{

    # Admin Schedules
    Route::get('/', function()
    {
        $schedules = Schedule::get();
        return View::make('backend.schedules')
                    ->with('schedules', $schedules);
    });

    # Admin Add Schedules;
    Route::get('/add', function()
    {
        $user = Sentry::getUser();
        return View::make('backend.addschedules')
                    ->with('user',$user);
    });

    # Admin Status Change Schedules;
    Route::get('/status/{status}/{id}', function($status, $id)
    {
        $user       =   Sentry::getUser();
        $scObj      =   new Schedule;
        $update     =   $scObj->changeStatus( $id, $status, $user->id);
        $schedules  =   Schedule::get();
        return View::make('backend.schedules')
                    ->with('schedules', $schedules);
    });

    # Admin Delete Schedules;
    Route::get('/delete/{id}', function($id)
    {
        $scObj      =   Schedule::find($id);
        //dd($scObj);
        $delobj     =   $scObj->delete();
        if($delobj){
            echo 1;
        }else{
            echo 0;
        }
    });

    Route::post('/add', array('uses' => 'RainTvController@postNewshedule'));

    # Admin edit Schedules
    Route::get('/edit/{id}', function($id)
    {
        $user = Sentry::getUser();
        $schedules  =   Schedule::find($id);
        return View::make('backend.editschedules')
                    ->with('schedule', $schedules)
                    ->with('user',$user);
    });

    Route::post('/edit/{id}', array('uses' => 'RainTvController@postUpdateshedule'));

});

// Admin Panel | Videos
Route::group(array('before' => 'admin.login', 'prefix' => 'admin/videos'), function()
{

    # Admin Videos
    Route::get('/', function()
    {
        $videos  =   Videos::get();
        return View::make('backend.listvideos')->with('videos',$videos);
    });

    # Admin Videos by schedules
    Route::get('/schedule', function()
    {
        return View::make('backend.listvideosbyschedule');
    });

    # Admin Videos by schedules
    Route::post('/schedule', function()
    {
        $data       =   Input::only('schedule_id');
        $video      =   Videos::where('schedule_id','=',$data['schedule_id'])->get();
        return View::make('backend.listvideosbyscheduleshow')->with('videos', $video);
    });

    # Admin Add videos
    Route::get('/add', function()
    {
        $user = Sentry::getUser();
        return View::make('backend.addvideos')->with('user',$user);
    });

    Route::post('/add', array('uses' => 'RainTvController@postAddvideo'));

    # Admin Edit Videos
    Route::get('/edit/{id}', function($id)
    {
        $user   =   Sentry::getUser();
        $video  =   Videos::find($id);
        return View::make('backend.editvideo')->with('user',$user)->with('video', $video);
    });

    Route::post('/edit/{id}', array('uses' => 'RainTvController@postUpdatevideo'));

    # Admin Status Change Video;
    Route::get('/status/{status}/{id}', function($status, $id)
    {
        $user       =   Sentry::getUser();
        $scObj      =   new Videos;
        $update     =   $scObj->changeStatus( $id, $status, $user->id);
        $videos     =   Videos::get();
        return View::make('backend.listvideos')
                    ->with('videos', $videos);
    });

     # Admin Delete Video;
    Route::get('/delete/{id}', function($id)
    {
        $user       =   Sentry::getUser();
        $scObj      =   new Videos;
        $update     =   $scObj->deleteData( $id);
        $videos     =   Videos::get();
        return View::make('backend.listvideos')
                    ->with('videos', $videos);
    });

});


/*
|--------------------------------------------------------------------------
| Front-end  API Routes
|--------------------------------------------------------------------------
*/

# Authentication API
Route::controller('auth', 'RainAuthController');

# Tv Schedule API
Route::controller('tv', 'RainTvController');

# Home Page Index
Route::get('/', function()
{
    $videoObj       =   new Videos;
    $responceData   =   $videoObj->getCurrentPlaylist();
    //dd($responceData);
    return View::make('frontend.home')->with('videos', json_encode($responceData));
});

# Video List
Route::get('/playlist', function()
{
    $videoObj       =   new Videos;
    $responceData   =   $videoObj->getCurrentPlaylist();
    //dd($responceData);
    return Response::json($responceData);
});

# Get Last Video
Route::get('/lastPlayable', function()
{
    $videoObj       =   new Videos;
    $responceData   =   $videoObj->getLastPlayableVideoDuration();
    //dd($responceData);
    return Response::json($responceData);
});

