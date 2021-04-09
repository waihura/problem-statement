@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Role')

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
        <h2 class="card-title">Edit Role</h2>
    </div>

    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
     
<div class="card-body">
    <div class="form-group">
      <label for="name">Name</label>
      {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    </div>

    <div class="form-group">
      <label for="permission">Permissions</label>
      <br/>
      @foreach($permission as $value)

      <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

      {{ $value->name }}</label>

  <br/>

  @endforeach
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