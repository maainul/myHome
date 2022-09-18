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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2> Show Room</h2>
              </div>
              <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('rooms.index') }}"> Back</a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  {{ $room->room_number }}
              </div>
              <div class="form-group">
                  <strong>Gas Bill:</strong>
                  {{ $room->gas_bill }}
              </div>
              <div class="form-group">
                  <strong>Internet Bill:</strong>
                  {{ $room->internet_bill }}
              </div>
              <div class="form-group">
                  <strong>Dish Bill:</strong>
                  {{ $room->dish_bill }}
              </div>
              <div class="form-group">
                  <strong>Water Bill:</strong>
                  {{ $room->water_bill }}
              </div>
              <div class="form-group">
                  <strong>Dust Bill:</strong>
                  {{ $room->dust_bill }}
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  