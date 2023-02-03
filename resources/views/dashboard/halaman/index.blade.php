@extends('dashboard.layout')

@section('content')
    <p class="card-title">Halaman</p>
    <div class="pb-3">
        <a href="{{ route('halaman.create') }}" class="btn btn-primary text-white">Tambah Halaman</a>
    </div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection