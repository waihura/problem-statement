@extends('layouts/contentLayoutMaster')

@section('title', 'View Branch')


@section('content')

<div class="card">
    <div class="card-body">
            @csrf        
        <div class="form-group">
            <label for="name" class="font-weight-bolder">Branch Name: </label>
            <span>{{ $branch->name }}</span>
        </div>

        <div class="form-group">
            <label for="detail" class="font-weight-bolder">Branch Description: </label>
            <span>{{ $branch->detail }}</span>
        </div>

    </div>
</div>

@endsection