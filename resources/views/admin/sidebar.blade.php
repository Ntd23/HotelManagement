<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Hotel Rooms</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('create_room') }}">Add Room</a></li>
                <li><a href="{{ url('view_rooms') }}">View Rooms</a></li>
            </ul>
        </li>
        <li><a href="{{ url('bookings') }}"> <i class="icon-home"></i>Bookings </a></li>
        <li><a href="{{ url('view_gallaries') }}"> <i class="icon-home"></i>Gallary </a></li>
        <li><a href="{{ url('messages') }}"> <i class="icon-home"></i>Messages </a></li>

    </ul>
</nav>
