
@extends('layouts.master')
@section('title') Tambah Barang @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Data Barang @endslot
@slot('title') Tambah Barang @endslot
@endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="hstack gap-1 justify-content-start mb-2">
                <a href="{{ route('assets.index') }}" class="btn btn-success"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-plus"></i> Tambah Data</h4><hr>
                    <form method="post" action="{{ route('assets.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Nama Barang</label>
                                <input type="name" name="name" class="form-control" placeholder="Nama Barang" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Lokasi Barang</label>
                                <input type="text" name="location" class="form-control" placeholder="Lokasi" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label>Jumlah Barang</label>
                                <input type="number" name="amount" class="form-control" placeholder="Jumlah Barang" value="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label>Harga Barang</label>
                                <input type="number" name="price" class="form-control" placeholder="Harga Barang" value="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label>Jumlah Barang</label>
                                <select class="form-control select2" name="status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label>Tanggal Beli</label>
                        <div class="input-group" id="datepicker">
                            <input type="text" class="form-control" name="buy_date" placeholder="YYYY, M, DD" data-date-container='#datepicker' data-provide="datepicker">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div><!-- input-group -->
                    </div><hr>
                    <div class="hstack gap-1 justify-content-end">
                        <button type="reset" class="btn btn-dark"><i class="mdi mdi-cancel"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-send"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
