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
                  <option value="{{ $item->id }}" {{ get_meta_value('_halaman_about') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}
                  </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2">Interest</label>
          <div class="col-sm-6">
            <select name="_halaman_interest" class="form-contol form-control-sm">
              <option value="">Pilih</option>
              @foreach ($dataHalaman as $item)
                  <option value="{{ $item->id }}" {{ get_meta_value('_halaman_interest') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}
                  </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2">Award</label>
          <div class="col-sm-6">
            <select name="_halaman_award" class="form-contol form-control-sm">
              <option value="">Pilih</option>
              @foreach ($dataHalaman as $item)
                  <option value="{{ $item->id }}" {{ get_meta_value('_halaman_award') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }}
                  </option>
              @endforeach
            </select>
          </div>
        </div>
        <button class="btn btn-primary text-white" type="submit" name="simpan">Simpan</button>
    </form>
@endsection