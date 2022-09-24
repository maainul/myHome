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
                <h3 class="card-title">Add Renter Information</h3>
              </div>
              <form action="{{ route('renters.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="renter_image">Renter Image</label>
                        <input type="file" name="renter_image" class="form-control" placeholder="Enter Image">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <label for="fb_id">Facebook ID</label>
                      <input type="text" name="fb_id" class="form-control" placeholder="Enter Facebook ID">
                      </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="phone_1">Phone 1</label>
                    <input type="text" name="phone_1" class="form-control" placeholder="Enter Phone 1">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="phone_2">Phone 2</label>
                    <input type="text" name="phone_2" class="form-control" placeholder="Enter Phone 2">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" class="form-control" placeholder="Enter Salary">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation">
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" name="birthdate" class="form-control" placeholder="Enter Birthdate">
                  </div>
                  </div>
                  
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="nid">NID</label>
                    <input type="number" name="nid" class="form-control" placeholder="Enter nid">
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="e_back">Educational Background</label>
                    <input type="text" name="e_back" class="form-control" placeholder="Enter Educational Background">
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="office_id">Office</label>
                    <select name="office_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="">-- Office --</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->id}}">{{ $item->office_name}}</option>
                    @endforeach
                  </select>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="office_id">Rooms</label>
                    <select name="office_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="">-- Rooms --</option>
                    @foreach ($rms as $item)
                    <option value="{{ $item->id}}">{{ $item->room_number}}</option>
                    @endforeach
                  </select>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="">--Gender--</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                  </select>
                  </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="home_id">Home</label>
                      <select name="home_id" class="custom-select rounded-0">
                      <option value="">-- Select Home  --</option>
                      @foreach ($home as $item)
                        <option value="{{ $item->id}}">{{ $item->home_name}}</option>
                      @endforeach
                    </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label for="rent_from">Rent From Date</label>
                      <input type="date" name="rent_from" class="form-control" placeholder="Enter Rent From Date">
                    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  for="address">Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label  for="notes">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                <a type="submit" href="{{ route('renters.index') }}" class="btn btn-info">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  @endsection