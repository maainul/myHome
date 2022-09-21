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
        <!-- Small boxes (Stat box) -->
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('rents/create') }}"> Create New Rent</a>
        </div>
        <div class="row">
          <!-- /.card-header -->
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Room Rent</th>
                      <th >Electric Bill</th>
                      <th >Gas Bill</th>
                      <th >Internet Bill</th>
                      <th >Water Bill</th>
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($rents as $rent)
                    <tr>
                      <td>{{ $rent-> rent_amount }}</td>
                      <td>{{ $rent-> elct_bill }}</td>
                      <td>{{ $rent-> gas_bill }}</td>
                      <td>{{ $rent-> internet_bill }}</td>
                      <td>{{ $rent-> water_bill }}</td>
                      @if($rents->status == 1)
                      <td><span class="badge badge-success">Rent</span></td>
                      @else
                      <td><span class="badge badge-danger">No Rent</span></td>
                      @endif
                      <td>
                            <a class="btn btn-info" href="">Show</a>
                            <a class="btn btn-primary" href="">Edit</a>
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
