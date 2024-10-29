@extends('siswa.layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Edit Kegiatan</h6>
        <form action="{{ route('siswa.kegiatan.update', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', $kegiatan->tanggal_kegiatan )}}">
                <div class="text-danger">
                    @error('tanggal_kegiatan')
                    {{ $message }}
                    @enderror
                </div>
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">nama kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan )}}">
                <div class="text-danger">
                    @error('nama_kegiatan')
                    {{ $message }}
                    @enderror
                </div>
            <div class="mb-3">
                <label for="ringkasan_kegiatan" class="form-label">Ringkasan Kegiatan</label>
                <textarea  class="form-control" rows="5" name="ringkasan_kegiatan">{{ $kegiatan->ringkasan_kegiatan }}</textarea>
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
            <div class="mb-2">
                <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="" height="80">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</div>
@endsection