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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          @foreach($renter as $rnts)
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                  src="{{ asset('public/image/'.$rnts->renter_image) }}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$rnts->name}}</h3>
              <p class="text-muted text-center">{{$rnts->designation}}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <a class="float-left">{{$rnts->phone_1}}</a>
                  <a class="float-left">{{$rnts->phone_2}}</a>
                </li>
                <li class="list-group-item">
                  <a class="float-left">{{$rnts->email}}</a>
                </li>
              </ul>
              <a href="#" class="btn btn-primary btn-block"><b>Rent Info</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About <strong>{{$rnts->name}}</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Education</strong>

              <p class="text-muted">
                {{$rnts->e_back}}
              </p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i> Salary</strong>
              <p class="text-muted">{{$rnts->salary}}</p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i> Home Name</strong>
              <p class="text-muted">{{$rnts->home_name}}</p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i>Room Rent</strong>
              <p class="text-muted">{{$rnts->room_rent}}</p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i>Floor</strong>
              <p class="text-muted">{{$floor->floor_number}}</p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i> NID</strong>
              <p class="text-muted">{{$rnts->nid}}</p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i> Gender</strong>
              @if($rnts->status == 1)
              <p class="text-muted">Male</p>
              @else
              <p class="text-muted">Female</p>
              @endif
              <hr>
              <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
              <p class="text-muted">{{$rnts->notes}}</p>
            </div>
            @endforeach
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Payment History</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <!-- Main content -->
                          <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                              <div class="col-12">
                                <h4>
                                  <i class="fas fa-globe"></i>{{$floor->floor_number}}-{{$rnts->room_number}}
                                  <small id="current_date" class="float-right"></small>
                                </h4>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                              <div class="col-sm-6 invoice-col">
                                <address>
                                  <strong>{{$rnts->name}}</strong><br>
                                  {{$rnts->address}}<br>
                                  Phone: {{$rnts->phone_1}}<br>
                                  Email: {{$rnts->email}}
                                </address>
                              </div>
                              <!-- /.col -->
                              <!-- /.col -->
                              <div class="col-sm-6 invoice-col">
                                <b>Rent From : {{$rnts->rent_from}}</b><br>
                                <b>Last Payment Month :</b> {{$rnts->rent_from}}<br>
                                <b>Payment Due:</b> 200<br>
                                <b>Account:</b> 968-34567
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                              <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Qty</th>
                                      <th>Month</th>
                                      <th>Given date #</th>
                                      <th>Subtotal</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <td>1</td>
                                      <td>22-7-2022</td>
                                      <td>422-568-642</td>
                                      <td>$25.99</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                              <!-- accepted payments column -->
                              <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="../../dist/img/credit/visa.png" alt="Visa">
                                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                              </div>
                              <!-- /.col -->
                              <div class="col-6">
                                <p class="lead">Amount Due 2033</p>

                                <div class="table-responsive">
                                  <table class="table">
                                    <tr>
                                      <th style="width:50%">Total Rent:</th>
                                      <td>$250.30</td>
                                    </tr>
                                    <tr>
                                      <th>Tax (9.3%)</th>
                                      <td>$10.34</td>
                                    </tr>
                                    <tr>
                                      <th>Due:</th>
                                      <td>$5.80</td>
                                    </tr>
                                    <tr>
                                      <th>Subtotal:</th>
                                      <td>$265.24</td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                              <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i
                                    class="far fa-credit-card"></i> Submit
                                  Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                  <i class="fas fa-download"></i> Generate PDF
                                </button>
                              </div>
                            </div>
                          </div>
                          <!-- /.invoice -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </section>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- Main content -->
                  <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
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
                  <!-- /.content -->
                </div>
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
  date = new Date();
  year = date.getFullYear();
  month = date.getMonth() + 1;
  day = date.getDate();
  document.getElementById("current_date").innerHTML = day + "/" + month + "/" + year;
</script>
@endsection