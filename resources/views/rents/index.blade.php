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
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p> {{ $message }} </p>
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.card-header -->
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Room Number</th>
                      <th >Room Rent</th>
                      <th >Rent Month</th>
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($rooms as $rent)
                    <tr>
                      <td>{{ $rent-> room_number }}</td>
                      <td>{{ $rent-> room_rent }}</td>
                      <td>{{ $rent-> rent_from}}</td>
                      @if($rent->status == 1)
                      <td><span class="badge badge-success">Paid</span></td>
                      @else
                      <td><span class="badge badge-danger">Unpaid</span></td>
                      @endif
                      <td>
                    <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a class="dropdown-item" href="#">Paid</a>
                      <a class="dropdown-item" href="#">Unpaid</a>
                    </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
  </div>
  @endsection
