@extends('layouts/contentLayoutMaster')

@section('title', 'Leads')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')

@can('lead-create')
  <a type="button" class="btn btn-primary" href="{{ route('leads.create') }}">Create new lead</a>
@endcan

<div class="row match-height">
  {{-- Lead Discovered --}}
  <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
    <div class="card bg-transparent border-secondary">
      <div class="card-header">
        <h2 class="card-title"><u>Discovered Leads</u></h2>
      </div>
    @foreach ($discovereds as $discovered)
    <div class="card mb-1">
      <div class="card-body">
      <span class="font-weight-bold">Name:</span> {{ $discovered->name }}</br>
      <span class="font-weight-bold">Country:</span> {{ $discovered->country }}</br>
      <span class="font-weight-bold">City:</span> {{ $discovered->city }}</br>
      <span class="font-weight-bold">Phone:</span> {{ $discovered->phone }}</br>
      <span class="font-weight-bold">Email:</span> {{ $discovered->email }}</br>
    </div>
    <div class="card-footer text-center">
      <form action="{{ route('leads.destroy',$discovered->id) }}" method="POST">
        <div class="btn-group" role="group">
        <a type="button" class="btn btn-outline-primary" href="{{ route('leads.edit',$discovered->id) }}"><i data-feather='edit-3'></i></a>
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-outline-danger" href="javascript:void(0);"><i data-feather='trash-2'></i></button>
      </div>
      </form>
    </div>
  </div>
    @endforeach
  </div>
</div>
  {{-- Lead Discovered --}}
    {{-- Contact Initiated --}}
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
      <div class="card bg-transparent border-primary">
        <div class="card-header">
          <h2 class="card-title"><u>Contact Initiated</u></h2>
        </div>
      @foreach ($contacts as $contact)
      <div class="card mb-1">
        <div class="card-body">
        <span class="font-weight-bold">Name:</span> {{ $contact->name }}</br>
        <span class="font-weight-bold">Country:</span> {{ $contact->country }}</br>
        <span class="font-weight-bold">City:</span> {{ $contact->city }}</br>
        <span class="font-weight-bold">Phone:</span> {{ $contact->phone }}</br>
        <span class="font-weight-bold">Email:</span> {{ $contact->email }}</br>
      </div>
      <div class="card-footer text-center">
        <form action="{{ route('leads.destroy',$contact->id) }}" method="POST">
          <div class="btn-group" role="group">
          <a type="button" class="btn btn-outline-primary" href="{{ route('leads.edit',$contact->id) }}"><i data-feather='edit-3'></i></a>
          @csrf
          @method('DELETE')
  
          <button type="submit" class="btn btn-outline-danger" href="javascript:void(0);"><i data-feather='trash-2'></i></button>
        </div>
        </form>
      </div>
    </div>
      @endforeach
    </div>
  </div>
    {{-- Contact Initiated --}}
        {{-- Needs Identified --}}
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
          <div class="card bg-transparent border-warning">
            <div class="card-header">
              <h2 class="card-title"><u>Needs Identified</u></h2>
            </div>
          @foreach ($needs as $need)
          <div class="card mb-1">
            <div class="card-body">
            <span class="font-weight-bold">Name:</span> {{ $need->name }}</br>
            <span class="font-weight-bold">Country:</span> {{ $need->country }}</br>
            <span class="font-weight-bold">City:</span> {{ $need->city }}</br>
            <span class="font-weight-bold">Phone:</span> {{ $need->phone }}</br>
            <span class="font-weight-bold">Email:</span> {{ $need->email }}</br>
          </div>
          <div class="card-footer text-center">
            <form action="{{ route('leads.destroy',$need->id) }}" method="POST">
              <div class="btn-group" role="group">
              <a type="button" class="btn btn-outline-primary" href="{{ route('leads.edit',$need->id) }}"><i data-feather='edit-3'></i></a>
              @csrf
              @method('DELETE')
      
              <button type="submit" class="btn btn-outline-danger" href="javascript:void(0);"><i data-feather='trash-2'></i></button>
            </div>
            </form>
          </div>
        </div>
          @endforeach
        </div>
      </div>
        {{-- Needs Identified --}}
                {{-- In Negotiation --}}
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                  <div class="card bg-transparent border-danger">
                    <div class="card-header">
                      <h2 class="card-title"><u>In Negotiation</u></h2>
                    </div>
                  @foreach ($negotiations as $negotiation)
                  <div class="card mb-1">
                    <div class="card-body">
                    <span class="font-weight-bold">Name:</span> {{ $negotiation->name }}</br>
                    <span class="font-weight-bold">Country:</span> {{ $negotiation->country }}</br>
                    <span class="font-weight-bold">City:</span> {{ $negotiation->city }}</br>
                    <span class="font-weight-bold">Phone:</span> {{ $negotiation->phone }}</br>
                    <span class="font-weight-bold">Email:</span> {{ $negotiation->email }}</br>
                  </div>
                  <div class="card-footer text-center">
                    <form action="{{ route('leads.destroy',$negotiation->id) }}" method="POST">
                      <div class="btn-group" role="group">
                      <a type="button" class="btn btn-outline-primary" href="{{ route('leads.edit',$negotiation->id) }}"><i data-feather='edit-3'></i></a>
                      @csrf
                      @method('DELETE')
              
                      <button type="submit" class="btn btn-outline-danger" href="javascript:void(0);"><i data-feather='trash-2'></i></button>
                    </div>
                    </form>
                  </div>
                </div>
                  @endforeach
                </div>
              </div>
                {{-- In Negotiation --}}
</div>

@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  
@endsection
@section('page-script')
  {{-- Page js files --}}

  <script>
    @if ($message = Session::get('success'))
    toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ $message }}");
@endif
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable();
    });

</script>
@endsection
