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
            padding: 4px;
        }

        tr {
            border: 2px solid #e9c3c32b;
        }

        td {
            padding: 10px;
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
                            <th class="th_deg">Room ID</th>
                            <th class="th_deg">Customer Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Arrival Date</th>
                            <th class="th_deg">Leaving Date</th>
                            <th class="th_deg">Status</th>
                            <th class="th_deg">Room Title</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Status Update</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->room_id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>
                                    @if ($data->status == 'approved')
                                        <span style="color: rgb(22, 153, 22)">Approved</span>
                                    @endif
                                    @if ($data->status == 'rejected')
                                        <span style="color: rgba(160, 58, 17, 0.699)">Rejected</span>
                                    @endif
                                    @if ($data->status == 'waiting')
                                        <span style="color: rgb(75, 74, 74)">Waiting</span>
                                    @endif
                                </td>
                                <td>{{ $data->room->room_title }}</td>
                                <td>{{ $data->room->price }}</td>
                                <td>
                                    <img src="room/{{ $data->room->image }}" width="100">
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure want to delete this booking? ')"
                                        href="{{ url('booking_delete', $data->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                <td>
                                    <span style="padding-bottom: 10px">
                                        <a href="{{ url('booking_approve', $data->id) }}"
                                            class="btn btn-primary">Approve</a>

                                    </span>
                                    <a href="{{ url('booking_reject', $data->id) }}" class="btn btn-warning">Reject</a>
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
