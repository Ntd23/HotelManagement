<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .table_deg {
            border: 3px solid wheat;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }

        .th_deg {
            background-color: skyblue;
            padding: 16px;
        }

        tr {
            border: 2px solid #e9c3c32b;
        }
        td {
            padding: 12px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <table class="table_deg">
                        <tr>
                            <th class="th_deg">Room Title</th>
                            <th class="th_deg">Decsription</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Wifi</th>
                            <th class="th_deg">Room Type</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Update</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->room_title }}</td>
                                <td>{!! Str::limit($data->description, 120) !!}</td>
                                <td>{{ $data->price }} VND</td>
                                <td>{{ $data->wifi }}</td>
                                <td>{{ $data->room_type }}</td>
                                <td><img width="100" src="room/{{ $data->image }}"></td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete this room ?')" href="{{ url('delete_room', $data->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <a href="{{ url('update_room', $data->id) }}" class="btn btn-success">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>
