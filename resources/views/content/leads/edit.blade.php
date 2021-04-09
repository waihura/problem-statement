@extends('layouts/contentLayoutMaster')

@section('title', 'Update Lead')

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
        <h2 class="card-title">Update Lead</h2>
    </div>
    <form action="{{ route('leads.update',$lead->id) }}" method="POST">
        @csrf
        @method('PUT')

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
                    value="{{ $lead->name }}"
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
                    value="{{ $lead->country }}"
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
                  value="{{ $lead->city }}"
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
                    value="{{ $lead->phone }}"
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
                    value="{{ $lead->email }}"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="status">Lead status</label>
                <select class="form-control" name="status">
                  <option {{$lead->status == 'Lead Discovered'  ? 'selected' : ''}} value="Lead Discovered">Lead Discovered</option>
                  <option {{$lead->status == 'Contact Initiated'  ? 'selected' : ''}} value="Contact Initiated">Contact Initiated</option>
                  <option {{$lead->status == 'Needs Identified'  ? 'selected' : ''}} value="Needs Identified">Needs Identified</option>
                  <option {{$lead->status == 'In Negotiation'  ? 'selected' : ''}} value="In Negotiation">In Negotiation</option>
                  <option {{$lead->status == 'Actual Sale'  ? 'selected' : ''}} value="Actual Sale">Actual Sale</option>
                </select>
              </div>
              </div>
              <div class="col-12">
              <label>Choose Products</label>
              <select name="products[]" class="select2 form-control" multiple>
            @foreach ($products as $value => $product)
                <option value="{{ $value }}" {{ (in_array($value, $lead->products)) ? 'selected' : '' }}> 
                    {{ $product }} 
                </option>
            @endforeach 
              </select>
              </div>
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