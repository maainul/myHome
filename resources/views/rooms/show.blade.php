@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Room</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Room</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
            <h3>Room Information</h3>
          </div>
          <hr />
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <strong>Name:</strong>
                {{ $room->room_number }}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <strong>Gas Bill:</strong>
                {{ $room->room_rent }}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <strong>Gas Bill:</strong>
                {{ $room->gas_bill }}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <strong>Internet Bill:</strong>
                {{ $room->internet_bill }}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <strong>Dish Bill:</strong>
                {{ $room->dish_bill }}
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <strong>Water Bill:</strong>
                {{ $room->water_bill }}
              </div>
            </div>
            <div class="form-group">
              <strong>Number of Renter</strong>
              {{ $countRentersByRoom }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="col-lg-12 margin-tb">
            <div class="pull-left">
              <h3> Room Members - ({{ $countRentersByRoom }})</h3>
            </div>
            <hr />
          </div>
          <div class="row">
            @foreach($renters as $rnts)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{ $rnts->designation}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$rnts->name}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> {{$rnts->notes}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Age: 20</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:
                          {{$rnts->address}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{
                          $rnts->phone_1 }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      @if(!empty($renter->renter_image))
                      <img class="img-circle img-fluid" src="{{ asset('public/image/'.$renter->renter_image) }}"
                        title="Renter image">
                      @else
                      <img class="img-circle img-fluid" src="{{ asset('public/image/'.'deff.png') }}">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{ route('renters.show',$rnts->id) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="pull-left">
                <h3 class="mt-2 ml-2">Payment History</h3>
              </div>
              <hr />
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Webkit</td>
                      <td>Safari 3.0</td>
                      <td>OSX.4+</td>
                      <td>522.1</td>
                      <td>A</td>
                    </tr>
                    <tr>
                      <td>Misc</td>
                      <td>Lynx</td>
                      <td>Text only</td>
                      <td>-</td>
                      <td>X</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
</div>

</section>
</div>
@endsection