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
                <h3 class="card-title">Edit Floor Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('floors.update',$floor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="floor_number">Floor Number</label>
                    <input type="text" name="floor_number" value="{{$floor->floor_number}}" class="form-control" placeholder="Enter Floor Info">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="expense_type">Home</label>
                      <select name="expense_type" class="custom-select rounded-0" id="exampleSelectRounded0">
                      <option value="">-- Select Home  --</option>
                      @foreach($home as $hd)
                      <option value="{{ $hd->id }}" {{$floor->home_id == $hd->id  ? 'selected' : ''}}>{{ $hd->name}}</option>
                      @endforeach
                    </select>
                    </div>
                    </div>
</div>
                <!-- /.card-body -->
                <div class="card-footer">
                <a type="submit" href="{{ route('floors.index') }}" class="btn btn-info">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  