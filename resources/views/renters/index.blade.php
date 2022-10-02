@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
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
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('renters.create') }}"> Create New Renter</a>
        </div>
        <div class="row">
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Home</th>
                      <th>Status</th>
                      <th style="width: 20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($renters as $renter)
                    <tr>
                      @if(!empty($renter->renter_image))
                      <td style="width: 12%"><img class="img-rounded w-100 h-100" src="{{ asset('public/image/'.$renter->renter_image) }}" title="Renter image"></td>
                      @else
                      <td style="width: 12%"><img class="img-rounded w-100 h-100" src="{{ asset('public/image/'.'deff.png') }}"></td>
                      @endif
                      <td>{{ $renter-> name }}</td>
                      <td>{{ $renter-> phone_1 }}</td>
                      <td>{{ $renter-> home_name }}</td>
                      @if($renter->status == 1)
                      <td><span class="badge badge-success">Active</span></td>
                      @else
                      <td><span class="badge badge-danger">InActive</span></td>
                      @endif
                      <td>
                        <form action="{{ route('renters.destroy',$renter->id) }}" method="POST">
                            <a class="btn btn-sm btn-info" href="{{ route('renters.show',$renter->id) }}">Show</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('renters.edit',$renter->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
    </section>
  </div>
  @endsection
