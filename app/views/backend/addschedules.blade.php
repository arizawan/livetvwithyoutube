@extends('backend.common.adminbody')

@section('title')
  <title>App Admin :: Add Schedule</title>
@stop

@section('body')
    <h3><i class="fa fa-angle-right"></i> Add New Schedule</h3>
            <div class="row mt">
              <div class="col-lg-12">


                          <div class="form-panel">

                              <form class="form-horizontal style-form" method="post" action="/admin/schedules/add">

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="name">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="desc">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Start Date</label>
                                      <div class="col-sm-10">
                                          <div class='input-group date datetimepickerDate' id='datetimepickerDate'>
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
                                          <div class='input-group date datetimepickerDate' id='datetimepickerDate'>
                                            <input type='text' class="form-control" data-date-format="DD-MM-YYYY" name="end_date"/>
                                            <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                          </div>
                                      </div>
                                  </div>

                                  <input type="hidden" value="{{$user->id}}" name="updatedby"/>
                                  <button type="submit" class="btn btn-success">Save Schedule</button>

                              </form>
                          </div>


              </div>
            </div>
@stop
