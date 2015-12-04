<?php

//  app/controllers/Tv/RainTvController.php

use Carbon\Carbon;

class RainTvController extends BaseController {

    public function __construct()
    {
        // Access token must be provided
        $this->beforeFilter('auth.token', array('only' => array('getMe', 'getUser')));

    }

    public function getIndex()
    {
        return Response::json(array('error' => 'You Shall not pass! LOL, actually GET is not supported here.'));
    }

    public function postNewshedule(){

        $data       =   Input::only('name', 'desc' , 'start_date', 'end_date', 'updatedby');
        $scObj      =   new Schedule;
        $update     =   $scObj->add($data['name'],
                                    $data['desc'],
                                    Carbon::createFromFormat('d-m-Y', $data['start_date']),
                                    Carbon::createFromFormat('d-m-Y', $data['end_date']),
                                    $data['updatedby']);

        if($update){
            return Redirect::to('admin/schedules');
            //return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postUpdateshedule(){

        $data       =   Input::only('name', 'desc' , 'start_date', 'end_date', 'updatedby', 'schedule_id');
        $scObj      =   new Schedule;
        $update     =   $scObj->updateData($data['name'],
                                           $data['desc'],
                                           Carbon::createFromFormat('d-m-Y', $data['start_date']),
                                           Carbon::createFromFormat('d-m-Y', $data['end_date']),
                                           $data['updatedby'] ,
                                           $data['schedule_id']);

        if($update){
            return Redirect::to('admin/schedules');
            //return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postChangestatusshedule(){

        $data       =   Input::only('status','schedule_id', 'updatedby');
        $scObj      =   new Schedule;
        $update     =   $scObj->changeStatus($data['schedule_id'], $data['status'], $data['updatedby']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postDeleteshedule(){

        $data       =   Input::only('schedule_id');
        $scObj      =   new Schedule;
        $update     =   $scObj->deleteData($data['schedule_id']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postAddvideo(){

        $data       =   Input::only('name', 'desc', 'url', 'updatedby', 'length', 'position', 'schedule_id', 'thumb', 'time');
        $vidObj   = new Videos;
        $update    = $vidObj->add($data['name'],
                     $data['desc'],
                     $data['url'],
                     $data['updatedby'],
                     $data['length'],
                     $data['position'],
                     $data['thumb'],
                     $data['schedule_id'],
                     $data['time']);

        if($update){
            return Redirect::to('admin/videos');
            //return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postUpdatevideo(){

        $data       =   Input::only('name', 'desc', 'url', 'updatedby', 'length', 'position', 'schedule_id', 'video_id', 'thumb', 'time');
        $vidObj   = new Videos;
       $update =  $vidObj->updateData($data['name'],
                            $data['desc'],
                            $data['url'],
                            $data['updatedby'],
                            $data['length'],
                            $data['position'],
                            $data['thumb'],
                            $data['schedule_id'],
                            $data['video_id'],
                            $data['time']);

        if($update){
            return Redirect::to('admin/videos');
            //return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postStatusvideo(){

        $data       =   Input::only('status','video_id');
        $vidObj   = new Videos;
        $vidObj->changeStatus($data['status'], $data['video_id']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postPositionvideo(){

        $data       =   Input::only('position','video_id');
        $vidObj   = new Videos;
        $vidObj->changeStatus($data['position'], $data['video_id']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postDeletevideo(){

        $data       =   Input::only('video_id');
        $vidObj   = new Videos;
        $vidObj->deleteData($data['video_id']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }


}
