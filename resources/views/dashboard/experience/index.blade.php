@extends('dashboard.layout')

@section('content')
    <p class="card-title">Experience</p>
    <div class="pb-3">
        <a href="{{ route('experience.create') }}" class="btn btn-primary text-white">Tambah Experience</a>
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
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ route('experience.destroy', $item->id) }}" method="POST" class="d-inline">
                                
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection