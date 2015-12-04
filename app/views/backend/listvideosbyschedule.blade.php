@extends('backend.common.adminbody')

@section('title')
  <title>App Admin :: Videos by Schedule</title>
@stop

@section('body')

            <h3><i class="fa fa-angle-right"></i> Schedule Videos</h3>
            <div class="row mt">
              <div class="col-lg-12">

                  <div class="content-panel">

                          <form class="form-horizontal style-form" method="post" action="" style="margin-left:40px;">

                              <div class="form-group">

                                  <div class="col-sm-10">
                                      <select class="form-control"  name="schedule_id">
                                          <option>Select Schedule...</option>
                                          @foreach (Schedule::get() as $schedule)
                                              <option value="{{$schedule->id}}">{{$schedule->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="col-sm-2 col-sm-2">
                                    <button type="submit" class="btn btn-success">List Videos</button>
                                  </div>
                              </div>

                          </form>

                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th >Thumb</th>
                                  <th width="10%">Name</th>
                                  <th width="10%">Description</th>
                                  <th>Schedule</th>
                                  <th width="5%">YouTube Url</th>
                                  <th width="5%">Position</th>
                                  <th>Time</th>
                                  <th>Length</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th width="10%"></th>
                              </tr>
                              </thead>
                              <tbody>


                              </tbody>
                          </table>
                      </div><!-- /content-panel -->

              </div>
            </div>
@stop
