@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- /.content-header -->
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Renter Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('renters.update',$renter->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$renter->name}}" class="form-control" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email"  value="{{$renter->email}}" class="form-control" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="fb_id">Address</label>
                    <input type="text" name="fb_id"  value="{{$renter->fb_id}}" class="form-control" placeholder="Enter Facebook ID">
                  </div>
                  <div class="form-group">
                    <label for="phone_1">Phone 1</label>
                    <input type="text" name="phone_1"  value="{{$renter->phone_1}}" class="form-control" placeholder="Enter Phone 1">
                  </div>
                  <div class="form-group">
                    <label for="phone_2">Phone 2</label>
                    <input type="text" name="phone_2"  value="{{$renter->phone_2}}" class="form-control" placeholder="Enter Phone 2">
                  </div>
                  <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" name="salary" value="{{$renter->salary}}" class="form-control" placeholder="Enter Salary">
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" value="{{$renter->designation}}" class="form-control" placeholder="Enter designation">
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="nid">NID</label>
                    <input type="text" name="nid" value="{{$renter->nid}}" class="form-control" placeholder="Enter nid">
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="office_id">Office</label>
                    <select name="office_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="">-- Office --</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                  </select>
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="home_id">Home</label>
                      <select name="home_id" class="custom-select rounded-0">
                      <option value="">-- Select Home  --</option>
                      @foreach ($home as $item)
                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                      @endforeach
                    </select>
                    </div>
                    </div>

                  <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" name="birthdate" value="{{$renter->birthdate}}" class="form-control" placeholder="Enter Birthdate">
                  </div>
                  <div class="form-group">
                    <label  for="address">Textarea</label>
                        <textarea class="form-control" value="{{$renter->address}}" name="address" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" name="status" value="{{$renter->status}}" class="form-control" placeholder="Enter Status">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  