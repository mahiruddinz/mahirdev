@extends('layouts.master')
@section('title') Data Aset Kantor @endsection
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
                        <h5 class="card-title mb-0 flex-grow-1">Data Aset Kantor</h5>
                        <div class="flex-shrink-0">
                            <a class="btn btn-success add-btn" href="{{ route('assets.create') }}"><i class="ri-add-line align-bottom me-1"></i> Tambah Data</a>
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
                                    <th>Lokasi</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Tanggal Beli</th>
                                    <th>Aksi</th>
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
        ajax: "{{ url('assets/list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'location', name: 'location'},
            {data: 'amount', name: 'amount'},
            {data: 'price', name: 'price'},
            {data: 'status', name: 'status'},
            {data: 'buy_date', name: 'buy_date'},
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

