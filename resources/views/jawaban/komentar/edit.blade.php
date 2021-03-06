@extends('layouts.master')

@section('title','Edit Komentar')

@section('content')


<form action="{{ url('/jawaban/update_komentar/' . $data->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="isi">Isi</label>
        <input name="isi" type="text" class="form-control" id="isi" value="{{ $data->isi }}">
    </div>
    <input type="hidden" name="user_id" value="{{ $users_id }}">
    <input type="hidden" name="jawaban_id" value="{{ $jawaban_id }}">
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>


@endsection