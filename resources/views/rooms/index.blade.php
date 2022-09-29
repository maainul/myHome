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
            <a class="btn btn-success" href="{{ route('rooms.create') }}"> Create New Room</a>
        </div>
        <div class="row">
          <!-- /.card-header -->
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Home</th>
                      <th >Floor</th>
                      <th >Room Number</th>
                      <th >Room Rent</th>
                      <th >Internet Bill</th>
                      <th >Total Rent</th>
                      <th >Total Members</th>
                      <th >Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($rooms as $room)
                    <tr>
                      <td>{{ $room-> home_name}}</td>
                      <td>{{ $room-> floor_number }}</td>
                      <td>{{ $room-> room_number }}</td>
                      <td>{{ $room-> room_rent }}</td>
                      <td>{{ $room-> internet_bill }}</td>
                      <td>{{ $countRentersByRoom }}</td>
                      <td>{{ $room-> gas_bill }}</td>
                      @if($room->status == 1)
                        <td><span class="badge badge-success">Rent</span></td>
                      @else
                        <td><span class="badge badge-danger">No Rent</span></td>
                      @endif
                      <td>
                        <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('rooms.show',$room->id) }}">Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('rooms.edit',$room->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
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
