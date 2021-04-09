@extends('layouts/contentLayoutMaster')

@section('title', 'Update Branch')


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
        <h2 class="card-title">Edit Branch</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('branches.update',$branch->id) }}" method="POST">
            @csrf
            @method('PUT')
              
        <div class="form-group">
            <label for="name">Branch Name</label>
            <input type="text" class="form-control" name="name" value="{{ $branch->name }}" placeholder="Branch Name"/>
        </div>

        <div class="form-group">
            <label for="detail">Branch Description</label>
            <textarea class="form-control" name="detail" cols="30" rows="10" placeholder="Description">{{ $branch->detail }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary float-right"><i data-feather='save'></i> Update</button>
        
    </form>
    </div>
</div>

@endsection