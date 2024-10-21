@extends('admin.layouts.app')

@section('title','Dudi')

@section('content')

<div class="row g-4">
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h6 class="mb-4">Data Pembimbing</h6>
        <div class="table-responsive">
            <a href="{{ route('admin.pembimbing.create') }}" class="btn btn-primary btn-sm">Tambah</a>
            <table class="table" id="dudi">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama guru</th>
                        <th scope="col">Nama dudi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembimbings as $pembimbing)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $pembimbing->guru->nama_guru }}</td>
                        <td>{{ $pembimbing->dudi->nama_dudi }}</td>
                        <td>
                            <a href="{{ route('admin.pembimbing.edit', $pembimbing->id_pembimbing) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('admin.pembimbing.delete',  $pembimbing->id_pembimbing) }}" onclick="return confirm('Yakin ingin hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
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
        $('#dudi').DataTable();
    });
</script>

@endsection