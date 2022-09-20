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
            <a class="btn btn-success" href="{{ route('homes.create') }}"> Create New Home</a>
        </div>
        <div class="row">
        
          <!-- /.card-header -->
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="width: 25%">Home Name</th>
                      <th style="width: 25%">Address</th>
                      <th style="width: 25%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($homes as $home)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $home-> home_name }}</td>
                      <td>{{ $home-> address }}</td>
                      <td>
                        <form action="{{ route('homes.destroy',$home->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('homes.show',$home->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('homes.edit',$home->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {!! $homes->links() !!}
              </div>
            </div>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
   
  </div>
  @endsection
