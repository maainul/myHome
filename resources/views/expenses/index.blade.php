@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
    <p> {{ $message }} </p>
  </div>
  @endif
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <a class="btn btn-success" href="{{ route('expenses.create') }}"> Create New Expense</a>
        </div>
        <div class="col-md-3">
          <a class="btn btn-warning" href="{{ url('expense/ex-by-types') }}">Expense Type Wise List </a>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Expense Type</th>
                    <th>Expense Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Home</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($expenses as $expense)
                  <tr>
                    <td>{{ $expense-> ex_typ_name }}</td>
                    <td>{{ $expense-> expense_name }}</td>
                    <td>{{ $expense-> amount }}</td>
                    <td>{{ $expense-> ex_date }}</td>
                    <td>{{ $expense-> home_name }}</td>
                    <td>
                      <form action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
                        {{-- <a class="btn btn-sm btn-primary" href="{{ route('expenses.edit',$expense->id) }}">Edit</a>
                        --}}
                        <a href="{{ route('expenses.edit',$expense->id) }}" class="btn btn-info"><i
                            class="fas fa-pencil-alt"></i></a>

                        @csrf
                        @method('DELETE')
                        {{-- <button type="submit" class="btn btn-sm btn-danger">Delete</button> --}}
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Expense Type</th>
                    <th>Expense Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Home</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection