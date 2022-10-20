<div class="row">
    <div class="col-md-12">
        <h5 class="text-center">anda yakin ingin menghapus data ini?</h5><hr>
        <form action="{{ route('project.destroy', $data->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger w-100 text-center" type="submit">Hapus Data</button>
                </div>
            </div>
        </form>
    </div>
</div>