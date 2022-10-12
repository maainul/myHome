@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Home</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Home</li>
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
              <h3 class="card-title">Edit Home Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('homes.update',$home->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="home_number">Home Name</label>
                  <input type="text" name="home_name" value="{{$home->home_name}}" class="form-control"
                    placeholder="Enter Home Info">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" name="address" rows="3"
                    placeholder="Enter ...">{{$home->address}}</textarea>
                </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a type="submit" href="{{ route('homes.index') }}" class="btn btn-info">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection