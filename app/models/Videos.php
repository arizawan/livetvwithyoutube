<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class Videos extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'videolist';

    /**
     * Add new Video
     *
     * @return bool
     */
    public function add($name, $desc, $url, $updatedby, $length, $position, $thumb, $schedule_id, $time)
    {
        $validator = Validator::make(
            array(
                'name'      => $name,
                'desc'      => $desc,
                'url'       => $url,
                'updatedby' => $updatedby,
                'length'    => $length,
                'thumb'     => $thumb,
                'position'  => $position,
                'time'      => $time,
                'schedule_id' => $schedule_id
            ),
            array(
                'name'      => array('required', 'min:3'),
                'desc'      => array(),
                'url'       => array('required'),
                'updatedby' => array('required'),
                'length'    => array('required'),
                'thumb'     => array(),
                'position'  => array('required'),
                'time'      => array('required'),
                'schedule_id' => array('alpha_num', 'required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $video = new Videos;

            $video->name        = $name;
            $video->desc        = $desc;
            $video->url         = $url;
            $video->length      = $length;
            $video->thumb       = $thumb;
            $video->position    = $position;
            $video->time        = $time;
            $video->updatedby   = $updatedby;
            $video->schedule_id = $schedule_id;
            $video->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Update Videos
     *
     * @return bool
     */
    public function updateData($name, $desc, $url, $updatedby, $length, $position, $thumb, $schedule_id, $video_id, $time)
    {

        $validator = Validator::make(
            array(
                'name'      => $name,
                'desc'      => $desc,
                'url'       => $url,
                'updatedby' => $updatedby,
                'length'    => $length,
                'thumb'     => $thumb,
                'position'  => $position,
                'time'      => $time,
                'schedule_id' => $schedule_id,
                'video_id' => $video_id
            ),
            array(
                'name'      => array('required', 'min:3'),
                'desc'      => array(),
                'url'       => array('required'),
                'updatedby' => array('required'),
                'length'    => array('required'),
                'thumb'     => array(),
                'position'  => array('required'),
                'time'      => array('required'),
                'schedule_id' => array('alpha_num', 'required'),
                'video_id'  =>  array('required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $video = Videos::findOrFail($video_id);

            $video->name        = $name;
            $video->desc        = $desc;
            $video->url         = $url;
            $video->length      = $length;
            $video->thumb       = $thumb;
            $video->position    = $position;
            $video->time        = $time;
            $video->updatedby   = $updatedby;
            $video->schedule_id = $schedule_id;
            $video->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Active/Inactive Videos
     *
     * @return bool
     */
    public function changeStatus($video_id, $status)
    {
        $validator = Validator::make(
            array(
                'status'   => $status,
                'video_id' => $video_id
            ),
            array(
                'status'    => array('required'),
                'video_id'  =>  array('required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $video = Videos::findOrFail($video_id);

            $video->active  = $status;
            $video->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Change Video Position
     *
     * @return bool
     */
    public function changePosition($video_id, $position)
    {
        $validator = Validator::make(
            array(
                'position'   => $position,
                'video_id' => $video_id
            ),
            array(
                'position'    => array('required'),
                'video_id'  =>  array('required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $video = Videos::findOrFail($video_id);

            $video->position  = $position;
            $video->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Delete Videos
     *
     * @return bool
     */
    public function deleteData($video_id)
    {
        $validator = Validator::make(
            array(
                'video_id' => $video_id
            ),
            array(
                'video_id'  =>  array('required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $video = Videos::findOrFail($video_id);
            $video->delete();
            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * YouTube Video Duration Formatter
     *
     * @return string
     */
    public function formatTime($inputSeconds)
    {

        $secondsInAMinute = 60;
        $secondsInAnHour  = 60 * $secondsInAMinute;
        $secondsInADay    = 24 * $secondsInAnHour;

        // extract days
        $days = floor($inputSeconds / $secondsInADay);

        // extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // DAYS
        if( (int)$days == 0 )
            $days = '';
        elseif( (int)$days < 10 )
            $days = '0' . (int)$days . ':';
        else
            $days = (int)$days . ':';

        // HOURS
        if( (int)$hours == 0 )
            $hours = '';
        elseif( (int)$hours < 10 )
            $hours = '0' . (int)$hours . ':';
        else
            $hours = (int)$hours . ':';

        // MINUTES
        if( (int)$minutes == 0 )
            $minutes = '';
        elseif( (int)$minutes < 10 )
            $minutes = '0' . (int)$minutes . ':';
        else
            $minutes = (int)$minutes . ':';

        // SECONDS
        if( (int)$seconds == 0 )
            $seconds = '00';
        elseif( (int)$seconds < 10 )
            $seconds = '0' . (int)$seconds;

        return $days . $hours . $minutes . $seconds;
    }

    /**
     * [getCurrentPlaylist description]
     * @return [type] [description]
     */
    public function getCurrentPlaylist(){

        $videostoShow   =   array();
        $currentTime    =   date('h:i:s A');
        $today          =   date("Y-m-d");
        $videoCounter   =   0;
        $timestamp      =   0;
       // dd(new DateTime('today'));
        $activeSchedule =   Schedule::where('active','=', '1')
                            ->where('start_date', '<=', $today)
                            ->where('end_date', '>=', $today)
                            ->first();
        //dd($activeSchedule);
        if($activeSchedule) {
            $videoList      =   Videos::where('schedule_id','=',$activeSchedule->id)
                                    ->where('active','=', '1')
                                    ->orderBy('position')->get();
        }else{
            $videoList      =   [];

        }

        //print_r(json_encode($videoList));exit;
        foreach ($videoList  as $video) {

            $from_time          = Carbon::createFromFormat('Y-m-d h:i:s A', $today.' '
                                                           . trim($video->time) )->toDateTimeString();

            $timestamp          = Carbon::createFromFormat('Y-m-d h:i:s A', $today.' '
                                                           . trim($video->time) )->timestamp;

            $diffSec            = strtotime($from_time) -  time();
            $positivediffSec    = abs($diffSec);
            $videoLength        = intval($video->length);

            if($videoCounter >= 1){
                $videoEndTime       = date('h:i:s A', $timestamp + $videoLength);
            }else{
                $videoEndTime       = date('h:i:s A', $timestamp + 0);
            }


            if (($videoLength < $positivediffSec )) {

                // Time over of the video
                $tubeurl        = $video->url;
                parse_str( parse_url( $tubeurl, PHP_URL_QUERY ), $querys );
                $videoID        =    $querys['v'];

                $videostoShow[] =   array(
                                      'videoId'         =>  $videoID,
                                      'startSeconds'    =>  0,
                                      'startTime'       =>  trim($video->time),
                                      'endTime'         =>  trim($videoEndTime),
                                      'length'          =>  $video->formatTime($video->length),
                                      'suggestedQuality'=>  'default'
                                );
            }else{

                $tubeurl        = $video->url;
                parse_str( parse_url( $tubeurl, PHP_URL_QUERY ), $querys );
                $videoID        =    $querys['v'];

                $videostoShow[] =   array(
                                      'videoId'         =>  $videoID,
                                      'startSeconds'    =>  abs($diffSec),
                                      'startTime'       =>  trim($video->time),
                                      'endTime'         =>  trim($videoEndTime),
                                      'length'          =>  $video->formatTime($video->length),
                                      'suggestedQuality'=>  'default'
                                );
            }

            $videoCounter++;

        }

        $responceData       =   array(
                                      "serverTime"  => date('Y-m-d h:i:s A'),
                                      "date"        => date('Y-m-d'),
                                      "time"        => date('h:i:s A'),
                                      "videos"      => $videostoShow

                                );
        return $responceData;
    }

    public function getLastPlayableVideoDuration(){

        $videostoShow   =   array();
        $currentTime    =   date('h:i:s A');
        $today          =   date("Y-m-d");
        $videoCounter   =   0;
        $timestamp      =   0;
       // dd(new DateTime('today'));
        $activeSchedule =   Schedule::where('active','=', '1')
                            ->where('start_date', '<=', $today)
                            ->where('end_date', '>=', $today)
                            ->first();
        //dd($activeSchedule);
        if($activeSchedule) {
            /*$videoList      =   Videos::where('schedule_id','=',$activeSchedule->id)
                                    ->where('active','=', '1')
                                    ->orderBy('position')->get();*/


            $videoList          =   DB::select(DB::raw('select * from `videolist` where `schedule_id` = '.$activeSchedule->id.' and `active` = \'1\' ORDER BY STR_TO_DATE(time, \'%h:%i:%s\') desc LIMIT 1'));
        }else{
            $videoList      =   [];

        }

        if(empty($videoList)){
            $videostoShow[] =   array(
                                          'videoId'         =>  null,
                                          'startsAt'        =>  null,
                                          'endsAt'          =>  null
                                    );
        }else{
            $datetimepickers    =   date('m/d/Y h:i:s a', strtotime($videoList[0]->time));
            //dd($videoList[0]);
            $videostoShow[] =   array(
                                          'videoId'         =>  $videoList[0]->id,
                                          'startsAt'        =>  date('U', strtotime($today. ' ' .$videoList[0]->time)),
                                          'endsAt'          =>  date('U', strtotime($videoList[0]->time) + $videoList[0]->length + 1)
                                    );
        }



        return $videostoShow;

    }

}
