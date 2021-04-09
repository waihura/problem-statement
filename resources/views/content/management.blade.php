@extends('layouts/contentLayoutMaster')

@section('title', 'Management')

@section('content')


<div class="row">

    <div class="col-lg-6 col-xl-6 col-sm-12">
        <div class="card text-center">
          <div class="card-body">
            <div class="avatar bg-light-danger p-50 mb-1">
              <div class="avatar-content">
                <i data-feather="user" class="font-medium-5"></i>
              </div>
            </div>
            <h2 class="font-weight-bold">User Management</h2>
            <a type="button" class="btn btn-primary" href="{{ route('users.index') }}"><i data-feather='arrow-right'></i> Enter</a>
          </div>
        </div>
      </div>

    <div class="col-lg-6 col-xl-6 col-sm-12">
        <div class="card text-center">
          <div class="card-body">
            <div class="avatar bg-light-danger p-50 mb-1">
              <div class="avatar-content">
                <i data-feather="user-check" class="font-medium-5"></i>
              </div>
            </div>
            <h2 class="font-weight-bold">Role Management</h2>
            <a type="button" class="btn btn-primary" href="{{ route('roles.index') }}"><i data-feather='arrow-right'></i> Enter</a>
          </div>
        </div>
      </div>

</div>



@endsection