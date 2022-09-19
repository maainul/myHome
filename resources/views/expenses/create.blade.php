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
                <h3 class="card-title">Add Expenses Information</h3>
              </div>
              <form action="{{ route('expenses.store') }}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="expense_type">Expenses Types</label>
                    <select name="expense_type" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="">-- Expenses Types --</option>
                    <option value="1">New Q</option>
                    <option value="2">New P</option>
                  </select>
                  </div>
                  </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="expense_name">Expense Name</label>
                        <input type="text" name="expense_name" class="form-control" placeholder="Enter Expense Name">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="number" name="amount" class="form-control" placeholder="Enter amount">
                      </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                    <label for="ex_date">date</label>
                    <input type="date" name="ex_date" class="form-control" placeholder="Enter date">
                  </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                  <label for="ex_des">Description</label>
                    <textarea class="form-control" name="ex_des" rows="3" placeholder="Enter ..."></textarea>
                </div>
                </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  @endsection