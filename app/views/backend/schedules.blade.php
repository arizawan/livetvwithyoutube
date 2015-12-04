@extends('backend.common.adminbody')

@section('title')
  <title>App Admin :: Schedules</title>
@stop

@section('body')
    <h3><i class="fa fa-angle-right"></i> All Schedules</h3>
            <div class="row mt">
              <div class="col-lg-12">

                  <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Total Videos</th>
                                  <th>Start date</th>
                                  <th>End date</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($schedules as $schedule)
                                  <tr id="sc-{{$schedule->id}}">
                                    <td>{{$schedule->id}}</td>
                                    <td>{{$schedule->name}}</td>
                                    <td>{{$schedule->desc}}</td>
                                    <td>{{Videos::where('schedule_id','=',$schedule->id)->count()}}</td>
                                    <td>{{$schedule->start_date}}</td>
                                    <td>{{$schedule->end_date}}</td>
                                    <td>
                                    <?php
                                      if($schedule->active == '1'){
                                          $statusRoute  = '0';
                                          echo '<span class="label label-success label-mini">Active</span>';
                                      }else{
                                          $statusRoute  = '1';
                                          echo '<span class="label label-warning label-mini">Inactive</span>';
                                      }
                                    ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-xs" href="/admin/schedules/status/{{$statusRoute}}/{{$schedule->id}}"><i class="fa fa-check"></i></a>

                                        <a class="btn btn-primary btn-xs" href="/admin/schedules/edit/{{$schedule->id}}"><i class="fa fa-pencil"></i></a>

                                        <a class="btn btn-danger btn-xs schedule-delete" href="#" data-scheduleid="{{$schedule->id}}" data-scheduletitle="{{$schedule->name}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                              @endforeach


                              </tbody>
                          </table>
                      </div><!-- /content-panel -->

              </div>
            </div>
@stop
