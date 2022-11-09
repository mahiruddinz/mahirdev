
@extends('layouts.master')
@section('title') Tambah Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Data Project @endslot
@slot('title') Tambah Project @endslot
@endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="hstack gap-1 justify-content-start mb-2">
                <a href="{{ route('client.index') }}" class="btn btn-success"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h4><hr>
                    <form method="POST" action="{{ route('client.update', $data->id) }}">
                        @csrf
                        @method('PUT') 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ $data->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Nomor HP</label>
                                    <input type="number" name="number_phone" class="form-control" placeholder="Nomor HP" value="{{ $data->number_phone }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Alamat</label>
                            <textarea type="text" name="address" class="form-control" placeholder="Alamat" rows="5">{{ $data->address }}</textarea>
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
