@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

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

{{-- @can('role-create') --}}
<a type="button" class="btn btn-primary" href="{{ route('roles.create') }}">Add New</a>
{{-- @endcan --}}

<table class="datatable table table-hover-animation">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
    </thead>
    @foreach ($roles as $role)
    <tr>
        <td>{{ ++$i }}.</td>
        <td>{{ $role->name }}</td>
        <td>
            @foreach($role->getAllPermissions()->pluck('name') as $v)
            <span class="badge badge-success">{{ $v }}</span>
            @endforeach
        </td>
        <td>
            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">

                <a class="btn btn-outline-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i data-feather='edit-3'></i></a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-outline-danger btn-sm"><i data-feather='trash-2'></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->render() !!}

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
