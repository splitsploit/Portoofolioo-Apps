@extends('dashboard.layout')

@section('content')
    {{-- @include('dashboard.pesan') --}}
    <form action="{{ route('pengaturan-halaman.update') }}" method="POST">
      @csrf
        <div class="form-group row">
          <label for="" class="col-sm-2">About</label>
          <div class="col-sm-6">
            <select name="_halaman_about" class="form-contol form-control-sm">
              <option value="">Pilih</option>
              @foreach ($dataHalaman as $item)
                  <option value="{{ $item->id }}">
                    {{ $item->judul }}
                  </option>
              @endforeach
            </select>
          </div>
        </div>
        <button class="btn btn-primary text-white" type="submit" name="simpan">Simpan</button>
    </form>
@endsection