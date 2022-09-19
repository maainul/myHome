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
                      <th >Floor</th>
                      <th >Home</th>
                      <th >Number</th>
                      <th >Gas Bill</th>
                      <th >Internet Bill</th>
                      <th >Dish Bill</th>
                      <th >Water Bill</th>
                      <th >Total</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($rooms as $room)
                    <tr>
                      <td>{{ $room-> floor_id }}</td>
                      <td>{{ $room-> home_id }}</td>
                      <td>{{ $room-> room_number }}</td>
                      <td>{{ $room-> gas_bill }}</td>
                      <td>{{ $room-> internet_bill }}</td>
                      <td>{{ $room-> dish_bill }}</td>
                      <td>{{ $room-> water_bill }}</td>
                      <td>{{ $room-> dust_bill }}</td>
                      <td>
                        <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('rooms.show',$room->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('rooms.edit',$room->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {!! $rooms->links() !!}
              </div>
            </div>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
  </div>
  @endsection
