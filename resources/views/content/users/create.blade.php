@extends('layouts/contentLayoutMaster')

@section('title', 'New User')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection


@section('content')

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

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Add a new User</h2>
    </div>
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
     
<div class="card-body">
    <div class="form-group">
      <label for="name">User Name</label>
      {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
      <label for="email">Email address</label>
      {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <label for="confirm-password">Assign Role</label>   
        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
      </div>


</div>
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-1">Submit</button>
      <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
  </form>
</div>

@endsection

{!! Form::close() !!}

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection