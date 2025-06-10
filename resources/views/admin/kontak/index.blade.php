@extends('admin.main') 

@section('container')
<div class="container">
    <h2>Data Kontak</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table class="border" border="1" cellpadding="8">
        <tr>
            <th>Alamat</th>
            <th>Instagram</th>
            <th>Tiktok</th>
            <th>WhatsApp</th>
            <th>QRIS</th>
            <th>Aksi</th>
        </tr>
        @foreach($kontak as $item)
        <tr>
            <td>{{ $item->alamat }}</td>
            <td><a href="{{ $item->instagram }}" target="_blank">IG</a></td>
            <td><a href="{{ $item->tiktok }}" target="_blank">Tiktok</a></td>
            <td><a href="{{ $item->whatsapp }}" target="_blank">WA</a></td>
            <td>
                @if($item->qris)
                    <img src="{{ asset('storage/' . $item->qris) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('kontak.edit', $item->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection