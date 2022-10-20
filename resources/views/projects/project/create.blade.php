
<form method="post" action="{{ route('project.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-2">
                <label>Client</label>
                <select class="form-control" name="type">
                    <option value="">-- Pilih Klien --</option>
                    
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Nama Project</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Project" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Tipe Project</label>
                <select class="form-control" name="type">
                    <option value="">-- Pilih Tipe Project --</option>
                    <option value="Aksi">Aksi</option>
                    <option value="Bulanan">Bulanan</option>
                    <option value="Outsourcing">Outsourcing</option>
                    <option value="Endorse">Endorse</option>
                    <option value="KOL">KOL</option>
                    <option value="Press Release">Press Release</option>
                    <option value="Verified">Verified</option>
                    <option value="Takedown">Takedown</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Platform</label>
                <select class="form-control" name="platform">
                    <option value="">-- Pilih Platform Project --</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Youtube">Youtube</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Tiktok">Tiktok</option>
                    <option value="Whatsapp">Whatsapp</option>
                    <option value="Telegram">Telegram</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Tanggal Mulai</label>
                <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Tanggal Selesai</label>
                <input type="date" name="due_date" class="form-control" placeholder="Tanggal Selesai" value="" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2">
                <label>Client Closing</label>
                <select class="form-control" name="client_id">
                    <option value="">-- Pilih Marketing --</option>
                    @foreach ($marketing as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label>Deskripsi /Briefing Project</label>
        <textarea type="text" name="description" id="summernote" class="form-control"></textarea>
    </div><hr>
    <div class="hstack gap-1 justify-content-end">
        <button type="reset" class="btn btn-dark"><i class="mdi mdi-cancel"></i> Reset</button>
        <button type="submit" class="btn btn-primary"><i class="mdi mdi-send"></i> Submit</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>