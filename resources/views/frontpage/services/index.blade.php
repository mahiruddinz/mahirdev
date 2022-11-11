@extends('layouts.master')
@section('title') Data Tugas Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="tasksList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Tugas Project</h5>
                        <div class="flex-shrink-0">
                            <a class="btn btn-success add-btn" href="{{ route('task-project.create') }}"><i class="ri-add-line align-bottom me-1"></i> Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless table-striped align-middle table-nowrap mb-0 yajra-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Project</th>
                                    <th>Tugas</th>
                                    <th>Platform</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
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
        ajax: "{{ route('task.list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'project_name', name: 'project_name'},
            {data: 'name', name: 'name'},
            {data: 'platform', name: 'platform'},
            {data: 'amount', name: 'amount'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
    });
  });
</script>
@endsection

