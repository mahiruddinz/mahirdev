
@extends('layouts.master')
@section('title') Detail Project @endsection
@section('css')
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Data Project @endslot
@slot('title') Detail Project @endslot
@endcomponent
<div class="row">
	<div class="col-lg-12">
		<div class="tab-content text-muted">
			<div class="tab-pane fade show active" id="project-overview" role="tabpanel">
				<div class="row">
					<div class="col-xl-9 col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="text-muted">
									<h3 class="mb-3 fw-semibold text-uppercase">DETAIL PROJECT - {{ $data->name }}</h3><hr>
									{!! $data->description !!}

									<div class="pt-3 border-top border-top-dashed mt-4">
										<div class="row">
											<div class="col-lg-3 col-sm-6">
												<div>
													<p class="mb-2 text-uppercase fw-medium">Tanggal Dimulai :</p>
													<h5 class="fs-15 mb-0">{{ $data->start_date }}</h5>
												</div>
											</div>
											<div class="col-lg-3 col-sm-6">
												<div>
													<p class="mb-2 text-uppercase fw-medium">Tanggal Berakhir :</p>
													<h5 class="fs-15 mb-0">{{ $data->due_date }}</h5>
												</div>
											</div>
											<div class="col-lg-3 col-sm-6">
												<div>
													<p class="mb-2 text-uppercase fw-medium">Prioritas :</p>
													{!! status_info($data->priority) !!}
												</div>
											</div>
											<div class="col-lg-3 col-sm-6">
												<div>
													<p class="mb-2 text-uppercase fw-medium">Status :</p>
													{!! status_info($data->status) !!}
												</div>
											</div>
										</div>
									</div>

						
								</div>
							</div>
							<!-- end card body -->
						</div>
						<!-- end card -->
					</div>
					<!-- ene col -->
					<div class="col-xl-3 col-lg-4">
						<div class="card">
                            <div class="card-header align-items-center d-flex border-bottom-dashed">
								<h4 class="card-title mb-0 flex-grow-1">Client</h4>
							</div>
							<div class="card-body">
								<div class="mx-n3 px-3">
									<div class="vstack gap-3">
										<div class="d-flex align-items-center">
											<div class="avatar-xs flex-shrink-0 me-3">
                                                <div class="avatar-title bg-primary text-white rounded-circle">
													{{ strtoupper(substr($data->client->name, 0, 2)) }}
												</div>
											</div>
											<div class="flex-grow-1">
												<h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">{{ $data->client->name }} </a></h5>
											</div>
										</div>
									</div>
									<!-- end list -->
								</div>
							</div>
							<!-- end card body -->
						</div>
						<!-- end card -->

						<div class="card">
							<div class="card-header align-items-center d-flex border-bottom-dashed">
								<h4 class="card-title mb-0 flex-grow-1">Team Leader</h4>
							</div>

							<div class="card-body">
								<div class="mx-n3 px-3">
									<div class="vstack gap-3">
										<div class="d-flex align-items-center">
											<div class="avatar-xs flex-shrink-0 me-3">
                                                <div class="avatar-title bg-primary text-white rounded-circle">
                                                {{ strtoupper(substr($data->user->name, 0, 2)) }}
												</div>
											</div>
											<div class="flex-grow-1">
												<h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">{{ $data->user->name }} </a></h5>
											</div>
										</div>
									</div>
									<!-- end list -->
								</div>
							</div>
							<!-- end card body -->
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
		</div>
	</div>
	<!-- end col -->
</div>
<!-- end row -->
@endsection