<!-- start page title -->
<div class="row">
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-error-warning-line label-icon"></i><strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('response'))
        <div class="alert alert-{{ session('alert') }} alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="fa fa-check label-icon"></i><strong> {{ session('title') }}</strong>
            {{ session('message') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>
<!-- end page title -->
