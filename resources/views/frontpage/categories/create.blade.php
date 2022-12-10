
@extends('layouts.master')
@section('title') Tambah Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="hstack gap-1 justify-content-start mb-2">
                <a href="{{ route('project.index') }}" class="btn btn-success"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"><i class="fa fa-plus"></i> Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Nama Project</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Project" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-1 justify-content-end">
                            <button type="reset" class="btn btn-dark"><i class="mdi mdi-cancel"></i> Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-send"></i> Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection