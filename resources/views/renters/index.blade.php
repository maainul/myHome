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
            <a class="btn btn-success" href="{{ route('renters.create') }}"> Create New Renter</a>
        </div>
        <div class="row">
          <!-- /.card-header -->
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Office</th>
                      <th>Phone</th>
                      <th>Home</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($renters as $renter)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $renter-> name }}</td>
                      <td>{{ $renter-> office_id }}</td>
                      <td>{{ $renter-> phone_1 }}</td>
                      <td>{{ $renter-> home_id }}</td>
                      <td>{{ $renter-> address }}</td>
                      <td>{{ $renter-> status }}</td>
                      <td>
                        <form action="{{ route('renters.destroy',$renter->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('renters.show',$renter->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('renters.edit',$renter->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {!! $renters->links() !!}
              </div>
            </div>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
  </div>
  @endsection
