
@extends('layouts.master')
@section('title') Ubah Artikel @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Data Artikel @endslot
@slot('title') Ubah Artikel @endslot
@endcomponent
    <div class="row">
        <div class="hstack gap-1 justify-content-start mb-2">
            <a href="{{ route('blogs.index') }}" class="btn btn-success"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="fa fa-pencil"></i> Ubah Data</h4><hr>
                    <form method="POST" action="{{ route('blogs.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label>Thumbnail Artikel</label>
                                <small class="text-danger">{{ $data->thumbnail }}</small>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" value="{{ $data->thumbnail }}">
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label>Judul Artikel</label>
                                <input type="text" name="title" id="title" value="{{ $data->title }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug" class="form-label">URL Blog Preview</label>
                            <div class="input-group">
                                <span class="input-group-text" id="slug-url">{{ url('blog/') }}</span>
                                <input type="text" class="form-control" id="slug" value="{{ $data->slug }}" aria-describedby="slug-url" readonly>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-tag"></i> Tag & Kategori</h4><hr>
                                <div class="form-group mb-3">
                                    <label>Tag Artikel</label>
                                    
                                    <input type="text" class="form-control" name="tags" data-choices data-choices-text-unique-true placeholder="Enter tags" placeholder="Isi Tag Artikel" value="@foreach ($articleTags as $svalue) @if ($svalue->blog_id == $data->id) {{ format_tags($svalue->name) }} @endif @endforeach"><hr>
                                    <label>Kategori Artikel</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="{{ $data->id }}">{{ $data->categories->name }} (Selected)</option>
                                        @foreach ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Konten Artikel</label>
                            <textarea class="form-control" rows="7" name="content" id="summernote">{{ $data->content }}</textarea>
                        </div><hr>
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
@endsection

