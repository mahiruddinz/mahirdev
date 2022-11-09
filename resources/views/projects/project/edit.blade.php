
@extends('layouts.master')
@section('title') Ubah Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Data Project @endslot
@slot('title') Ubah Project @endslot
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
                    <h4 class="card-title mb-0 flex-grow-1"><i class="fa fa-edit"></i> Ubah Project</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('project.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Client</label>
                                    <span class="form-control" style="padding: 4px;">
                                        <select class="form-control select2" name="client_id">
                                            <option value="{{ $data->client_id }}">-- {{ $data->client->name }} (Selected) --</option>
                                            @foreach ($client as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tanggal Mulai</label>
                                    <div class="input-group" id="datepicker">
                                        <input type="text" class="form-control" name="start_date" placeholder="YYYY, M, DD" data-date-container='#datepicker' data-provide="datepicker" value="{{ $data->start_date }}">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tanggal Selesai</label>
                                    <div class="input-group" id="datepicker">
                                        <input type="text" class="form-control" name="due_date" placeholder="YYYY, M, DD" data-date-container='#datepicker' data-provide="datepicker" value="{{ $data->due_date }}">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Prioritas Project</label>
                                    <span class="form-control" style="padding: 4px;">
                                        <select class="form-control select2" name="priority">
                                            <option value="{{ $data->priority }}">{{ $data->priority }}</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Status Project</label>
                                    <span class="form-control" style="padding: 4px;">
                                        <select class="form-control select2" name="status">
                                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Nama Project</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Project" value="{{ $data->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Deskripsi / Briefing Project</label>
                            <textarea type="text" name="description"  rows="6" class="form-control">{{ $data->description }}</textarea>
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
                                        <option value="{{ $data->type }}">-- {{ $data->type }} (Selected) --</option>
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
                                        <option value="{{ $data->platform }}">-- {{ $data->platform }} (Selected) --</option>
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
                                            <option value="{{ $data->leader_id }}">{{ $data->user->name }} (Selected)</option>
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
