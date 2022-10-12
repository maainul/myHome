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
        <a class="btn btn-success" href="{{ route('floors.create') }}"> Create New Floor</a>
      </div>
      <div class="row">

        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Floor Number</th>
                <th>Home Name</th>
                <th style="width: 15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($floors as $floor)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $floor-> floor_number }}</td>
                <td>{{ $floor-> home_name }}</td>
                <td>

                  <form action="{{ route('floors.destroy',$floor->id) }}" method="POST">
                    <div class="btn-group btn-group-sm">
                      <a href="{{ route('floors.edit',$floor->id) }}" class="btn btn-info"><i
                          class="fas fa-pencil-alt"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"
                        style="color: white;background-color:rgb(196, 15, 15)"><i class="fas fa-trash"></i></button>
                  </form>
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