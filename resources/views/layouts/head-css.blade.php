@yield('css')

<!-- Layout config Js -->
<script src="{{ URL::asset('assets/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('assets/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
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
        } else if (type == 'transaksi') {
            $('#modal-title').html('<i class="fe-shopping-cart"></i> Mulai Transaksi');
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
