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
  @if($message = Session::get('success'))
  <div class="alert alert-success">
    <p> {{ $message }} </p>
  </div>
  @endif
  <section class="content">
    <div class="container-fluid">
      <br />
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Expense Type</th>
                    <th>Amount</th>
                    <th>Home</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($expenses as $expense)
                  <tr>
                    <td>{{ $expense-> ex_typ_name }}</td>
                    <td>{{ $expense-> total_amount }}</td>
                    <td>{{ $expense-> home_name }}</td>
                    <td>
                      <a class="btn btn-warning" href="{{ url('expense/ex-by-types',$expense->expense_type) }}">View All
                        Payment</a>

                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>
@endsection