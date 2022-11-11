
@extends('layouts.master')
@section('title') Ubah Kategori Artikel @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Data Kategori Artikel @endslot
@slot('title') Ubah Kategori Artikel @endslot
@endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="hstack gap-1 justify-content-start mb-2">
                <a href="{{ route('categories.index') }}" class="btn btn-success"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h4><hr>
                    <form method="POST" action="{{ route('categories.update', $data->id) }}">
                        @csrf
                        @method('PUT') 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Nama Kategori</label>
                                    <input type="name" name="name" class="form-control" placeholder="Nama                                     <label>Nama Kategori</label>
" value="{{ $data->name }}" required>
                                </div>
                            </div>
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
