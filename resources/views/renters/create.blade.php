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
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('renters.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="fb_id">Address</label>
                    <input type="text" name="fb_id" class="form-control" placeholder="Enter Facebook ID">
                  </div>
                  <div class="form-group">
                    <label for="phone_1">Phone 1</label>
                    <input type="text" name="phone_1" class="form-control" placeholder="Enter Phone 1">
                  </div>
                  <div class="form-group">
                    <label for="phone_2">Phone 2</label>
                    <input type="text" name="phone_2" class="form-control" placeholder="Enter Phone 2">
                  </div>
                  <div class="form-group">
                    <label for="number_of_members">Number of Member</label>
                    <input type="text" name="number_of_members" class="form-control" placeholder="Enter Number of Member">
                  </div>
                  <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" name="salary" class="form-control" placeholder="Enter Salary">
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter designation">
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
                    <input type="text" name="nid" class="form-control" placeholder="Enter nid">
                  </div>
                  <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" name="birthdate" class="form-control" placeholder="Enter Birthdate">
                  </div>
                  <div class="form-group">
                  <label for="birthdate">Birthdate</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" name="status" class="form-control" placeholder="Enter Status">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  @endsection