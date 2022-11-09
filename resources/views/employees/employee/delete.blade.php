
<div class="row">
    <div class="col-md-12">
        <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Hapus data #{{$data->id}} ?</h4>
                <p class="text-muted mx-4 mb-0">Anda yakin ingin menghapus data ini ?</p>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
            <form action="{{ route('user.destroy', $data->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button>
            </form>
        </div>
    </div>
</div>