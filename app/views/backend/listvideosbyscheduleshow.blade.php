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
                                  <th width="5%">Description</th>
                                  <th>Schedule</th>
                                  <th width="5%">YouTube Url</th>
                                  <th width="5%">Position</th>
                                  <th>Time</th>
                                  <th>Ends At</th>
                                  <th>Length</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th width="10%"></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($videos as $video)
                              <tr>
                                  <td>{{$video->id}}</td>
                                  <td>
                                    <img class="img-circle" width="70" height="70" src="{{$video->thumb}}"/>
                                  </td>
                                  <td>{{$video->name}}</td>
                                  <td>{{$video->desc}}</td>
                                  <td>{{Schedule::find($video->schedule_id)->name}}</td>
                                  <td>{{$video->url}}</td>
                                  <td style="text-align:center; font-weight:bold;">{{$video->position}}</td>
                                  <td>{{$video->time}}</td>
                                  <td>{{date('h:i:s A', strtotime($video->time) + $video->length)}}</td>
                                  <td>{{$video->formatTime($video->length)}}</td>
                                  <td>

                                    <?php
                                      if($video->active == '1'){
                                          $statusRoute  = '0';
                                          echo '<span class="label label-success label-mini">Active</span>';
                                      }else{
                                          $statusRoute  = '1';
                                          echo '<span class="label label-warning label-mini">Inactive</span>';
                                      }
                                    ?>

                                  </td>
                                  <td>
                                      <a class="btn btn-success btn-xs" href="/admin/videos/status/{{$statusRoute}}/{{$video->id}}"><i class="fa fa-check"></i></a>

                                      <a class="btn btn-primary btn-xs" href="/admin/videos/edit/{{$video->id}}"><i class="fa fa-pencil"></i></a>


                                      <a class="btn btn-danger btn-xs" href="/admin/videos/delete/{{$video->id}}"><i class="fa fa-trash-o"></i></a>

                                  </td>
                              </tr>
                              @endforeach

                              </tbody>
                          </table>
                      </div><!-- /content-panel -->

              </div>
            </div>
@stop
