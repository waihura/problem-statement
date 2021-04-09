@extends('layouts/contentLayoutMaster')

@section('title', 'Create Lead')

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
        <h2 class="card-title">Add a new Lead</h2>
    </div>
    <form action="{{ route('leads.store') }}" method="POST">
      @csrf 

    <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input
                    type="text"
                    id="name"
                    class="form-control"
                    placeholder="Lead Name"
                    name="name"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="country">Country</label>
                  <input
                    type="text"
                    id="country"
                    class="form-control"
                    name="country"
                    placeholder="Country"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="city">City</label>
                  <input 
                  type="text" 
                  id="city" 
                  class="form-control" 
                  placeholder="City" 
                  name="city"
                  required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="phone">Phone No.</label>
                  <input
                    type="text"
                    id="phone"
                    class="form-control"
                    name="phone"
                    placeholder="Cellphone"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    id="email"
                    class="form-control"
                    name="email"
                    placeholder="Email"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="status">Lead status</label>
                <select class="form-control" name="status">
                  <option selected value="Lead Discovered">Lead Discovered</option>
                  <option value="Contact Initiated">Contact Initiated</option>
                  <option value="Needs Identified">Needs Identified</option>
                  <option value="In Negotiation">In Negotiation</option>
                </select>
              </div>
              </div>
              <div class="col-12">
              <label>Choose Products</label>
              <select name="products[]" class="select2 form-control" multiple>
            @foreach ($products as $value => $product)
                <option value="{{ $value }}"> 
                    {{ $product }} 
                </option>
            @endforeach 
              </select>
              </div>
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