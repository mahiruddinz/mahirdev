@extends('layouts.master')
@section('title') Data Klien @endsection
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
                        <h5 class="card-title mb-0 flex-grow-1">Data Klien</h5>
                        <div class="flex-shrink-0">
                            <a class="btn btn-success add-btn" href="{{ route('client.create') }}"><i class="ri-add-line align-bottom me-1"></i> Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="table-responsive mb-4">                
                        <table class="table align-middle table-nowrap mb-0 yajra-datatable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
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
        ajax: "{{ url('client/list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'number_phone', name: 'number_phone'},
            {data: 'address', name: 'address'},
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

