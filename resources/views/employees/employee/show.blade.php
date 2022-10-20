<table class="table table-striped table-bordered">
    <tr>
        <th>NIK</th>
        <td>{{ $data->nik }}</td>
    </tr>
    <tr>
        <th>NAMA</th>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <th>EMAIL</th>
        <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <th>NPWP</th>
        <td>{{ $data->npwp }}</td>
    </tr>
    <tr>
        <th>GAJI</th>
        <td>{{ number_format($data->salary) }}</td>
    </tr>
    <tr>
        <th>POSISI</th>
        <td>{{ $data->role }}</td>
    </tr>
    <tr>
        <th>TANGGAL LAHIR</th>
        <td>{{ $data->birthdate }}</td>
    </tr>
    <tr>
        <th>TANGGAL BERGABUNG</th>
        <td>{{ $data->join_date }}</td>
    </tr>
    <tr>
        <th>ALAMAT</th>
        <td>{{ $data->address }}</td>
    </tr>
</table>