
<!-- Layout config Js -->
<script src="{{ URL::asset('assets/js/layout.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('assets/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Styles -->
<!--datatable css-->

@yield('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://kit.fontawesome.com/931972a100.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    function modal_open(type, url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#modal').modal('show');
        if (type == 'add') {
            $('#modal-title').html('<i class="fa fa-plus"></i> Tambah Data');
        } else if (type == 'edit') {
            $('#modal-title').html('<i class="fa fa-edit"></i> Ubah Data');
        } else if (type == 'detail') {
            $('#modal-title').html('<i class="fa fa-search"></i> Detail Data');
        } else if (type == 'delete') {
            $('#modal-title').html('<i class="fa fa-trash"></i> Hapus Data');
        } else {
            $('#modal-title').html(type);
        }
        $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            beforeSuccess: function() {
                $('#body-result').html('<div class="progress progress-striped active"><div style="width: 100%" class="progress-bar progress-bar-primary"></div></div>');
            },
            success: function($data) {
                $('#modal-result').html($data);
            }, error: function() {
                $('#modal-result').html('<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Terjadi kesalahan!</div>');
            }
        });
    }
</script>
{{-- @yield('css') --}}
