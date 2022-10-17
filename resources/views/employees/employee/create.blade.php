<form method="post" action="{{ route('user.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>NIK</label>
                <input type="number" name="nik" class="form-control" placeholder="NIK" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>NPWP</label>
                <input type="number" name="npwp" class="form-control" placeholder="NPWP" value=""   >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="" required>
    </div>
    <div class="form-group mb-2">
        <label>Posisi</label>
        <select class="form-control" name="role">
            <option value="">-- Pilih Posisi --</option>
            <option value="HRD">HRD</option>
            <option value="GA">GA</option>
            <option value="Finance">Finance</option>
            <option value="Operator">Operator</option>
            <option value="Project">Project</option>
            <option value="Marketing">Marketing</option>
            <option value="Leader Project">Leader Project</option>
            <option value="Creative">Creative</option>
            <option value="Leader Creative">Leader Creative</option>
        </select>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Tanggal Bergabung</label>
                <input type="date" name="join_date" class="form-control" placeholder="Tanggal bergabung" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Gaji</label>
                <input type="number" name="salary" class="form-control" placeholder="Gaji" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Tanggal Lahir</label>
                <input type="date" name="birthdate" class="form-control" placeholder="TTL" value="" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea type="text" name="address" class="form-control" placeholder="Alamat" rows="5"></textarea>
    </div><hr>
    <div class="hstack gap-1 justify-content-end">
                        <button type="reset" class="btn btn-dark"><i class="mdi mdi-cancel"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-send"></i> Submit</button>
                    </div>
</form>