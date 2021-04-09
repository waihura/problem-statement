@extends('layouts/contentLayoutMaster')

@section('title', 'Update Product')

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
        <h2 class="card-title">Update Product</h2>
    </div>
    <form action="{{ route('products.update',$product->id) }}" method="POST">
      @csrf
      @method('PUT')

<div class="card-body">
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="enter product name" required>
    </div>

    <div class="form-group">
      <label for="description">Short Description</label>
      <input type="text" class="form-control" name="description" value="{{ $product->description }}" placeholder="enter product description" required>
    </div>

    <div class="form-group">
      <label for="estimated_value">Estimated Value</label>
      <input type="number" class="form-control" name="estimated_value" value="{{ $product->estimated_value }}" placeholder="enter estimated value">
    </div>
</div>
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary mr-1">Update</button>
    </div>
  </form>
</div>

@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection