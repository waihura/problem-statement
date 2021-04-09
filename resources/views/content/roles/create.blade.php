@extends('layouts/contentLayoutMaster')

@section('title', 'Create Role')

@section('content')

@if (count($errors) > 0)

    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Create new role</h2>
    </div>
    <div class="card-body">
        
        <div class="form-group">
            <label for="name" class="font-weight-bold">Role Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter role name..">
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Permissions</label><br>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            @endforeach
        </div>
    
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success"><i data-feather='save'></i> Save</button>
    </div>
</div>
{!! Form::close() !!}


@endsection