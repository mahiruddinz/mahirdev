@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
<link href="{{ URL::asset('assets/css/datatable.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-12">
            <div class="hstack gap-1 justify-content-end mb-2">
                <a href="javascript:;" onclick="modal_open('add', '{{ route('user.create') }}')" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Detail"><i class="fa fa-plus mr-1"></i> Tambah Karyawan</a>
            </div>
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"><i class="fa fa-user-group"></i> Data Karyawan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped yajra-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIK</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Gaji</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
  $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('user/list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nik', name: 'nik'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'salary', name: 'salary'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

