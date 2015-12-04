@section('navigation')
<li class="mt">
    <a href="/admin/schedules">
        <i class="fa fa-dashboard"></i>
        <span>Schedule List</span>
    </a>
</li>

<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-desktop"></i>
        <span>Schedules</span>
    </a>
    <ul class="sub">
        <li><a  href="/admin/schedules/add">Add new</a></li>
        <!--<li><a  href="/admin/schedules/edit/">Edit</a></li>-->
        <li><a  href="/admin/schedules">List</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-video-camera"></i>
        <span>Videos</span>
    </a>
    <ul class="sub">
        <li><a  href="/admin/videos/add">Add new</a></li>
        <!--<li><a  href="/admin/videos/edit">Edit</a></li>-->
        <li><a  href="/admin/videos">List</a></li>
        <li><a  href="/admin/videos/schedule">List by Schedule</a></li>
    </ul>
</li>
@show
