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
              <h3 class="card-title">Add Rent Information</h3>
            </div>
            <form action="{{ url('rents/create') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="room_id">Room</label>
                      <select name="room_id" class="custom-select rounded-0">
                        <option value="">-- Rooms --</option>
                        @foreach ($rooms as $item)
                        <option value="{{ $item->id}}">{{ $item->room_number}}--{{$item->home_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="home_id">Home</label>
                      <select name="home_id" class="custom-select rounded-0">
                        <option value="">-- Home --</option>
                        @foreach ($homes as $item)
                        <option value="{{ $item->id}}">{{ $item->home_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="room_rent">Room Rent</label>
                      <input type="number" name="room_rent" class="form-control" placeholder="Enter Room Rent">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="elct_bil">Electric Bill</label>
                      <input type="number" name="elct_bill" class="form-control" placeholder="Enter Room Rent">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="gas_bill">Gas Bill</label>
                      <input type="number" name="gas_bill" class="form-control" placeholder="Enter Gas Bill">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="internet_bill">Internet Bill</label>
                      <input type="number" name="internet_bill" class="form-control" placeholder="Enter Internet Bill">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="dish_bill">Dish Bill</label>
                      <input type="number" name="dish_bill" class="form-control" placeholder="Enter Dish Bill">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="rent_month">Rent Month</label>
                      <input type="date" name="rent_month" class="form-control" placeholder="Enter Rent Month">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="rent_given_date">Rent Given Date</label>
                      <input type="date" name="rent_given_date" class="form-control" placeholder="Enter Rent Month">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="water_bill">Water Bill</label>
                      <input type="number" name="water_bill" class="form-control" placeholder="Enter Water Bill">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="dust_bill">Dust Bill</label>
                      <input type="number" name="dust_bill" class="form-control" placeholder="Enter Dust Bill">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a type="submit" href="{{ url('rents') }}" class="btn btn-info">Back</a>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!-- jquery validation -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Electricity Bill</h3>
          </div>
          <form action="{{ url('rents/create') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="room_id">Room</label>
                    <select name="room_id" class="custom-select rounded-0">
                      <option value="">-- Rooms --</option>
                      @foreach ($rooms as $item)
                      <option value="{{ $item->id}}">{{ $item->room_number}}--{{$item->home_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="home_id">Home</label>
                    <select name="home_id" class="custom-select rounded-0">
                      <option value="">-- Home --</option>
                      @foreach ($homes as $item)
                      <option value="{{ $item->id}}">{{ $item->home_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="elct_bil">Electric Bill</label>
                    <input type="number" name="elct_bill" class="form-control" placeholder="Enter Room Rent">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="rent_month">Month</label>
                    <input type="date" name="rent_month" class="form-control" placeholder="Enter Rent Month">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <a type="submit" href="{{ url('rents') }}" class="btn btn-info">Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <!-- jquery validation -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Internet Bill</h3>
        </div>
        <form action="{{ url('rents/create') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="room_id">Room</label>
                  <select name="room_id" class="custom-select rounded-0">
                    <option value="">-- Rooms --</option>
                    @foreach ($rooms as $item)
                    <option value="{{ $item->id}}">{{ $item->room_number}}--{{$item->home_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="home_id">Home</label>
                  <select name="home_id" class="custom-select rounded-0">
                    <option value="">-- Home --</option>
                    @foreach ($homes as $item)
                    <option value="{{ $item->id}}">{{ $item->home_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="internet_bill">Electric Bill</label>
                  <input type="number" name="internet_bill" class="form-control" placeholder="Enter Internet Bill">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="rent_month">Rent Month</label>
                  <input type="date" name="rent_month" class="form-control" placeholder="Enter Rent Month">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a type="submit" href="{{ url('rents') }}" class="btn btn-info">Back</a>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
</div>
@endsection