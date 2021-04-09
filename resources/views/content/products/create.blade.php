@extends('layouts/contentLayoutMaster')

@section('title', 'New Product')

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
        <h2 class="card-title">Add a new Product</h2>
    </div>
    <form action="{{ route('products.store') }}" method="POST">
      @csrf 
<div class="card-body">
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" name="name" placeholder="enter product name" required>
    </div>

    <div class="form-group">
      <label for="description">Short Description</label>
      <input type="text" class="form-control" name="description" placeholder="enter product description" required>
    </div>

    <div class="form-group">
      <label for="estimated_value">Estimated Value</label>
      <input type="number" class="form-control" name="estimated_value" placeholder="enter estimated value">
    </div>
</div>
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-1">Submit</button>
      <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
  </form>
</div>

@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection