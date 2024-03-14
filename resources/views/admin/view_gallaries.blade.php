<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
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
                    <center>
                        <h1 style="font-size: 40px; font-weight: bolder">Gallary</h1>
                        <div class="row">
                            @foreach ($gallary as $gallary)
                                <div class="col-md-4">
                                    <img style="height: 200px!important; width: 300px!important"
                                        src="/gallary/{{ $gallary->image }}" alt="">
                                        <a onclick="return confirm('Are you sure want to delete this gallary?')" href="{{ url('delete_gallary', $gallary->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="padding: 30px">
                                <label style="color: wheat; font-weight: bold" for="">Upload Image</label>
                                <input type="file" name="image" id="" required>
                                <input type="submit" class="btn btn-danger" value="Add New An Image" id="">
                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>
