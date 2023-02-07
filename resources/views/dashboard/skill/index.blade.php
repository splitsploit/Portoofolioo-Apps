@extends('dashboard.layout')

@section('content')
    {{-- @include('dashboard.pesan') --}}
    <form action="{{ route('skill.update') }}" method="POST">
      @csrf
        <div class="mb-3 pt-3">
          <label for="judul" class="form-label">Programming Language & Tools</label>
          <input type="text"
            class="form-control form-control-sm" 
            name="_language" 
            id="judul" 
            aria-describedby="helpId" 
            placeholder="Programming Language & Tools" value="{{ get_meta_value('_language') }}">
        </div>
        <div class="mb-3 pt-3">
          <label for="isi" class="form-label">Workflow</label>
          <textarea class="form-control summernote" name="_workflow" rows="5">{{ get_meta_value('_workflow') }}</textarea>
        </div>
        <button class="btn btn-primary text-white" type="submit" name="simpan">Simpan</button>
    </form>
@endsection