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
                            <th class="th_deg">Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Message</th>
                            <th class="th_deg">Send Mail</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{!! Str::limit($data->message, 120) !!}</td>
                                <td>
                                    <a href="{{ url('send_mail', $data->id) }}" class="btn btn-info">Response</a>
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
