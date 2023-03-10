@extends('dashboard.layout')

@section('content')
    @include('dashboard.pesan')
    <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-dark text-white">Kembali</a>
    </div>
    <form action="{{ route('halaman.update', $data->id) }}" method="POST">
      @csrf
      @method('PUT')
        <div class="mb-3 pt-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control form-control-sm" 
            name="judul" 
            id="judul" 
            aria-describedby="helpId" 
            placeholder="Masukkan Judul Halaman" value="{{ $data->judul }}">
        </div>
        <div class="mb-3 pt-3">
          <label for="isi" class="form-label">Isi</label>
          <textarea class="form-control summernote" name="isi" rows="5">{{ $data->isi }}</textarea>
        </div>
        <button class="btn btn-primary text-white" type="submit" name="simpan">Simpan</button>
    </form>
@endsection