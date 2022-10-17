<form method="post" action="{{ route('user.update', $employee->id) }}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>NIK</label>
                <input type="number" name="name" class="form-control" placeholder="NIK" value="{{ $employee->nik }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>NPWP</label>
                <input type="number" name="npwp" class="form-control" placeholder="NPWP" value="{{ $employee->npwp }}"   >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ $employee->name }}" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $employee->email }}" required>
    </div>
    <div class="form-group mb-2">
        <label>Posisi</label>
        <select class="form-control" name="role">
            <option value="{{ $employee->role }}">-- {{ $employee->role }} (Selected) --</option>
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
                <label>Tanggal Bergabung <small class="text-danger">*Kosongkan jika tidak diubah</small></label>
                <input type="date" name="join_date" class="form-control" placeholder="Tanggal bergabung" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Gaji</label>
                <input type="number" name="salary" class="form-control" placeholder="Gaji" value="{{ $employee->salary }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Tanggal Lahir <small class="text-danger">*Kosongkan jika tidak diubah</small></label>
                <input type="date" name="birthdate" class="form-control" placeholder="TTL" value="" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea type="text" name="address" class="form-control" placeholder="Alamat" rows="5">{{ $employee->address }}</textarea>
    </div><hr>
    <div class="row">
        <div class="col-md-6">
            <button type="reset" class="btn btn-dark w-100"><i class="fa fa-history mr-1"></i> Reset</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-paper-plane mr-1"></i> Submit</button>
        </div>
    </div>
</form>