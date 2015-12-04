<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;


class Schedule extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedule';



    /**
     * Add new Schedule
     *
     * @return bool
     */
    public function add($name, $desc, $start_date, $end_date, $updatedby)
    {

        $validator = Validator::make(
            array(
                'name'      => $name,
                'desc'      => $desc,
                'start_date'=> $start_date,
                'end_date'  => $end_date,
                'updatedby' => $updatedby

            ),
            array(
                'name'      => array('required', 'min:3'),
                'desc'      => array(),
                'start_date'=> array('required'),
                'end_date'  => array('required'),
                'updatedby' => array('alpha_num', 'required')
            )
        );


        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $schedule = new Schedule;

            $schedule->name         = $name;
            $schedule->desc         = $desc;
            $schedule->start_date   = $start_date;
            $schedule->end_date     = $end_date;
            $schedule->updatedby    = $updatedby;
            $schedule->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Update Schedule
     *
     * @return bool
     */
    public function updateData($name, $desc, $start_date, $end_date, $updatedby, $schedule_id)
    {
        $validator = Validator::make(
            array(
                'name'      => $name,
                'desc'      => $desc,
                'start_date'=> $start_date,
                'end_date'  => $end_date,
                'updatedby' => $updatedby,
                'schedule_id' => $schedule_id

            ),
            array(
                'name'      => array('required', 'min:3'),
                'desc'      => array(),
                'start_date'=> array('required'),
                'end_date'  => array('required'),
                'schedule_id'  => array('required'),
                'updatedby' => array('alpha_num', 'required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $schedule = Schedule::findOrFail($schedule_id);

            $schedule->name         = $name;
            $schedule->desc         = $desc;
            $schedule->start_date   = $start_date;
            $schedule->end_date     = $end_date;
            $schedule->updatedby    = $updatedby;
            $schedule->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Active/Inactive Schedule
     *
     * @return bool
     */
    public function changeStatus($schedule_id, $status, $updatedby)
    {
        $validator = Validator::make(
            array(
                'status'      => $status,
                'schedule_id' => $schedule_id,
                'updatedby'   => $updatedby

            ),
            array(
                'status'        => array('alpha_num'),
                'schedule_id'   => array('required'),
                'updatedby'     => array('alpha_num', 'required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            //$resetStatus = Schedule::where('active', '>', 0)->update(array('active' => 0));

            $schedule = Schedule::findOrFail($schedule_id);

            $schedule->active       = $status;
            $schedule->updatedby    = $updatedby;
            $schedule->save();

            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }

    /**
     * Delete Schedule
     *
     * @return bool
     */
    public function deleteData($schedule_id)
    {
        $validator = Validator::make(
            array(
                'schedule_id' => $schedule_id
            ),
            array(
                'schedule_id'   => array('required')
            )
        );

        // Validation did not pass
        if ($validator->fails())
        {
           throw new Exception( $validator->messages() );
        }

        try
        {
            $schedule = Schedule::findOrFail($schedule_id);
            $schedule->delete();
            return true;
        }
        catch(Exception $ex)
        {
            return $ex;
        }

    }
}
