@extends('admin.main') 

@section('container')
<div class="container">
    <h2>Edit Kontak</h2>

    <form action="{{ route('kontak.update', $kontak->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Alamat:</label>
        <input type="text" name="alamat" value="{{ old('alamat', $kontak->alamat) }}"><br>

        <label>Instagram:</label>
        <input type="url" name="instagram" value="{{ old('instagram', $kontak->instagram) }}"><br>

        <label>Tiktok:</label>
        <input type="url" name="tiktok" value="{{ old('tiktok', $kontak->tiktok) }}"><br>

        <label>WhatsApp:</label>
        <input type="url" name="whatsapp" value="{{ old('whatsapp', $kontak->whatsapp) }}"><br>

        <label>QRIS:</label>
        @if($kontak->qris)
            <img src="{{ asset('qris/' . $kontak->qris) }}" width="100"><br>
        @endif
        <input type="file" name="qris"><br>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection