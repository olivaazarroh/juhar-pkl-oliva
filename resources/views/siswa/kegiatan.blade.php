@extends('siswa.layouts.app')

@section('title','kegiatan')

@section('content')

@if ($errors->has('access'))
<div class="alert alert-danger">
    {{ $errors->first('access') }}
</div>
@endif

<div class="row g-4">
<div class="col-12">
<div class="bg-light rounded h-100 p-4">
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
        <h6 class="mb-4">Data kegiatan</h6>
        <div class="table-responsive">
            <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-sm">Tambah</a>
            <table class="table" id="kegiatan">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">tanggal kegiatan</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatans as $kegiatan)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                        <td>
                           <a href="{{ route('siswa.kegiatan.edit', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}" class="btn btn-warning btn-sm">edit</a>
                           <a href="{{ route('siswa.kegiatan.delete', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}" onclick="return confirm('Yakin ingin hapus data?')"  class="btn btn-danger btn-sm">hapus</a>
                           <a href="{{ route('siswa.kegiatan.detail', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}" class="btn btn-info btn-sm">detail</a>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#kegiatan').DataTable();
    });
</script>

@endsection