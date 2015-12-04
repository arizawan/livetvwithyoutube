@extends('backend.common.adminbody')

@section('title')
  <title>App Admin :: Edit Video</title>
@stop

@section('body')

            <h3><i class="fa fa-angle-right"></i> Edit Video</h3>
            <div class="row mt">
              <div class="col-lg-12">

                          <div class="alert alert-danger alert-dismissable" id="errormsg" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Warning!</strong> Invalid YouTube Link!
                          </div>

                          <div class="progress progress-striped active" id="youtubefeatching" style="display:none;">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                          </div>

                          <div class="form-panel">

                              <form class="form-horizontal style-form" id="videoaddForm" method="post" action="">



                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="name" id="vidname" value="{{$video->name}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Select Schedule</label>
                                      <div class="col-sm-10">
                                          <select class="form-control" name="schedule_id">
                                              <option>Select...</option>
                                              @foreach (Schedule::get() as $schedule)
                                                  <?php
                                                     $SelectedSchedule = Schedule::where('id','=', $video->schedule_id)->first();
                                                     if($SelectedSchedule->id == $schedule->id){
                                                  ?>
                                                        <option value="{{$schedule->id}}" selected="selected">{{$schedule->name}}</option>
                                                  <?php
                                                  }else{
                                                  ?>
                                                        <option value="{{$schedule->id}}">{{$schedule->name}}</option>
                                                  <?php
                                                  }
                                                  ?>

                                              @endforeach
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="desc" id="viddesc" value="{{$video->desc}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Time</label>
                                      <div class="col-sm-10">
                                          <div class='input-group date' >

                                            <input type="text" class="form-control" name="time" value="{{$video->time}}">
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">YouTube URL</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="url" id="youtubeurl" value="{{$video->url}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Position</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="position" value="{{$video->position}}">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Length (sec)</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" disabled id="videolength" value="{{$video->length}}">
                                          <input type="hidden" class="form-control" name="length" id="savevideolength" value="{{$video->length}}">

                                      </div>
                                  </div>

                                  <input type="hidden" value="{{$user->id}}" name="updatedby"/>
                                  <input type="hidden" name="thumb" id="vidthumb" value="{{$video->thumb}}"/>
                                  <input type="hidden" name="video_id" id="vidthumb" value="{{$video->id}}"/>



                                  <button type="submit" class="btn btn-success">Save Video</button>

                              </form>
                          </div>


              </div>
            </div>
@stop

<script>
$(function () {



});
</script>
