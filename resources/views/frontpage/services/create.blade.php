
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
                <a href="{{ route('task-project.index') }}" class="btn btn-success"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-plus"></i> Tambah Data</h4><hr>
                    <form method="post" action="{{ route('task-project.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Project</label>
                            <span class="form-control" style="padding: 4px;">
                                <select class="form-control select2" name="project_id">
                                    <option value="">-- Pilih Project --</option>
                                    @foreach ($project as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <div class="row">
                            <label>Yang Mengerjakan Project *</label>
                            @foreach ($user->chunk(4) as $chunk)
                            <div class="col-md-4">
                                @foreach ($chunk as $value)
                                <div class="form-check mb-0">
                                    <input class="form-check-input" name="user_id[]" value="{{ $value->id }}" type="checkbox" id="{{ $value->id }}">
                                    <label class="form-check-label" for="{{ $value->id }}">
                                        {{ $value->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div><hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Nama Tugas Project</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Platform</label>
                                <span class="form-control" style="padding: 4px;">
                                    <select class="form-control select2" name="platform" required> 
                                        <option value="">-- Pilih Platform --</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Youtube">Youtube</option>
                                        <option value="Zoom">Zoom</option>
                                        <option value="Tiktok">Tiktok</option>
                                        <option value="Whatsapp">Whatsapp</option>
                                        <option value="Telegram">Telegram</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label>Target</label>
                                <input type="text" name="target" class="form-control" value="{{ old('target') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Jumlah Aksi</label>
                                    <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Mulai</label>
                                <input type="text" name="start_time" placeholder="Tanggal Mulai" class="form-control" data-provider="flatpickr" data-date-format="Y-m-d H:i:s" required>
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Selesai</label>
                                <input type="text" name="due_time" placeholder="Tanggal Selesai" class="form-control" data-provider="flatpickr" data-date-format="Y-m-d H:i:s" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Deskripsi Tugas</label>
                            <textarea class="form-control" rows="7" name="description" id="summernote"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Link Report (Google Drive)</label>
                            <input type="text" name="link_report" class="form-control" value="{{ old('link_report') }}" placeholder="https://drive.google.com/mahird3v">
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
@endsection
