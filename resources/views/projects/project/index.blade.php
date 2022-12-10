@extends('layouts.master')
@section('title') Data Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@endcomponent

    <div class="row">
        <div class="col-xl-12">
            @if (Auth::user()->role <> 'Project')
            <div class="hstack gap-1 justify-content-end mb-2">
                <a href="{{ route('project.create') }}"class="btn btn-success" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Detail"><i class="fa fa-plus mr-1"></i> Tambah Data</a>
            </div>
            @endif
            <div class="row">
                @foreach ($data as $value)
                <div class="col-xxl-3 col-sm-4 project-card">
                    <div class="card card-height-100">
                        <div class="card-body">
                            <div class="d-flex flex-column h-100">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-4">Terakhir Diubah : {{ time_elapsed_string($value->updated_at) }}</p>
                                    </div>
                                    @if (Auth::user()->role <> 'Project')
                                    <div class="flex-shrink-0">
                                        <div class="d-flex gap-1 align-items-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('project.show', $value->id) }}"><i class="fa fa-eye align-bottom me-2 text-muted"></i> Detail Project</a>
                                                    <a class="dropdown-item" href="{{ route('project.edit', $value->id) }}"><i class="fa fa-edit align-bottom me-2 text-muted"></i> Ubah Project</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"  href="javascript:;" onclick="modal_open('delete', '{{ route('project.delete', $value->id) }}')" ><i class="fa fa-trash align-bottom me-2 text-muted"></i> Hapus Project</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-{{ platform($value->platform) }} rounded p-2">
                                                <i class="fab fa-{{ lowercase($value->platform) }} fa-2xl"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 fs-15"><a href="{{ route('project.show', $value->id) }}" class="text-dark">{{ $value->name }}</a></h5>
                                        
                                        {{ (strlen($value->description) > 80) ? ''.substr(nl2br($value->description),0, 80).'...'  : nl2br($value->description) }}
                                        
                                        <hr>
                                        {!! status_info($value->status) !!}
                                        {!! status_info($value->priority) !!}
                                        <span class="badge bg-primary">{{ strtoupper($value->user->name) }}</span>
                                        <span class="badge bg-secondary">{{ strtoupper($value->type) }}</span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                @endforeach
            </div>
        </div>
    </div>
@endsection
