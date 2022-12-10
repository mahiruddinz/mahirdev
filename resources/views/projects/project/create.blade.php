
@extends('layouts.master')
@section('title') Tambah Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@endcomponent
    <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Client</label>
                                    <span class="form-control" style="padding: 4px;">
                                        <select class="form-control select2" name="client_id">
                                            <option value="">-- Pilih Klien --</option>
                                            @foreach ($client as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Thumbnail Project</label>
                                    <input class="form-control" name="image" type="file" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tanggal Mulai</label>
                                    <input type="text" name="start_date" placeholder="Tanggal Mulai" class="form-control" data-provider="flatpickr" data-date-format="Y-m-d H:i:s" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tanggal Selesai</label>
                                    <input type="text" name="due_date" placeholder="Tanggal Selesai" class="form-control" data-provider="flatpickr" data-date-format="Y-m-d H:i:s" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Nama Project</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Project" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Deskripsi / Briefing Project</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"><i class="fa fa-random"></i> Platform & Tipe</h4>
                </div>
                <div class="card-body">
                    
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label>Tipe Project</label>
                            <span class="form-control" style="padding: 4px;">
                                <select class="form-control select2" name="type">
                                    <option value="">-- Pilih Tipe Project --</option>
                                    <option value="Aksi">Aksi</option>
                                    <option value="Bulanan">Bulanan</option>
                                    <option value="Outsourcing">Outsourcing</option>
                                    <option value="Endorse">Endorse</option>
                                    <option value="KOL">KOL</option>
                                    <option value="Press Release">Press Release</option>
                                    <option value="Verified">Verified</option>
                                    <option value="Takedown">Takedown</option>
                                    <option value="Other">Other</option>
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label>Platform</label>
                            <span class="form-control" style="padding: 4px;">
                                <select class="form-control select2" name="platform">
                                    <option value="">-- Pilih Platform Project --</option>
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
                    </div>
                </div>
                      
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fa fa-user"></i> Team Leader</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label>Leader</label>
                                <span class="form-control" style="padding: 4px;">
                                    <select class="form-control select2" name="leader">
                                        <option value="">-- Pilih Leader --</option>
                                        @foreach ($leader as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
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
</div>
@endsection