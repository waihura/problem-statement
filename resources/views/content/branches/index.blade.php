@extends('layouts/contentLayoutMaster')

@section('title', 'Branches')

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

@can('branch-create')
<a type="button" class="btn btn-primary" href="{{ route('branches.create') }}">Add New</a>  
@endcan

<table class="datatable table table-hover-animation">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    @foreach ($branches as $branch)
    <tr>
        <td>{{ ++$i }}.</td>
        <td>{{ $branch->name }}</td>
        <td>{{ $branch->detail }}</td>
        <td>
            <form action="{{ route('branches.destroy',$branch->id) }}" method="POST">
              @can('branch-edit')
              <a class="btn btn-info btn-sm" href="{{ route('branches.show',$branch->id) }}"><i data-feather='eye'></i> View</a>
              @endcan
              @can('branch-edit')
              <a class="btn btn-primary btn-sm" href="{{ route('branches.edit',$branch->id) }}"><i data-feather='edit-3'></i> Edit</a>
              @endcan

                @csrf
                @method('DELETE')

                @can('branch-delete')
                <button type="submit" class="btn btn-danger btn-sm"><i data-feather='trash-2'></i> Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $branches->links() !!}

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
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-toastr.js')) }}"></script>
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
