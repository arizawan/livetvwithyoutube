@extends('backend.common.adminbody')

@section('title')
  <title>App Admin :: Edit Schedule</title>
@stop

@section('body')
    <h3><i class="fa fa-angle-right"></i> Add New Schedule</h3>
            <div class="row mt">
              <div class="col-lg-12">


                          <div class="form-panel">

                              <form class="form-horizontal style-form" method="post" action="">

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="name" value="{{$schedule->name}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="desc" value="{{$schedule->desc}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Start Date</label>
                                      <div class="col-sm-10">
                                          <div class='input-group date datetimepickerDate' id='datetimepickerDateStart'>
                                            <input type='text' class="form-control" data-date-format="DD-MM-YYYY" name="start_date"/>
                                            <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">End Date</label>
                                      <div class="col-sm-10">
                                          <div class='input-group date datetimepickerDate' id='datetimepickerDateEnd'>
                                            <input type='text' class="form-control" data-date-format="DD-MM-YYYY" name="end_date"/>
                                            <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                          </div>
                                      </div>
                                  </div>

                                  <input type="hidden" value="{{$user->id}}" name="updatedby"/>
                                  <input type="hidden" value="{{$schedule->id}}" name="schedule_id"/>

                                  <button type="submit" class="btn btn-success">Save Changes</button>

                              </form>
                          </div>


              </div>
            </div>


@stop

<?php
use Carbon\Carbon;
?>
@section('extraScript')
<script>
$(function () {
    //$('#datetimepickerDateStart').data("DateTimePicker").disable();
    //$('#datetimepickerDateEnd').data("DateTimePicker").disable();
    $('#datetimepickerDateStart').data("DateTimePicker").setDate("{{Carbon::createFromFormat('Y-m-d', $schedule->start_date)->format('d-m-Y')}}");

    $('#datetimepickerDateEnd').data("DateTimePicker").setDate("{{Carbon::createFromFormat('Y-m-d', $schedule->end_date)->format('d-m-Y')}}");
});
</script>
@stop

