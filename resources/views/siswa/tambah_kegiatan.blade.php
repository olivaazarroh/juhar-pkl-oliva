@extends('siswa.layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tambah Siswa</h6>
        <form action="{{ route('kegiatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="no" class="form-label">No</label>
                <input type="text" class="form-control" id="no" name="no">
                <div class="text-danger">
                    @error('no')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                <input type="text" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan">
                <div class="text-danger">
                    @error('tanggal_kegiatan')
                    {{ $message }}
                    @enderror
                </div>
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">nama_kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                <div class="text-danger">
                    @error('nama_kegiatan')
                    {{ $message }}
                    @enderror
                </div>
            <div class="mb-3">
                <label for="ringkasan_kegiatan" class="form-label">Ringkasan Kegiatan</label>
                <input type="text" class="form-control" id="ringkasan_kegiatan" name="ringkasan_kegiatan">
                <div class="text-danger">
                    @error('ringkasan_kegiatan')
                    {{ $message }}
                    @enderror
                </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <div class="text-danger">
                    @error('foto')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</div>
@endsection