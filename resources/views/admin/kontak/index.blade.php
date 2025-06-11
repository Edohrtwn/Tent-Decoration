@extends('admin.main') 

@section('container')
<div class="container">
    <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Setting Website</h2>
    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="border-b-2">
                <tr>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Alamat</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Instagram</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Tiktok</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">WhatsApp</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">QRIS</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Aksi</th>
                </tr>

            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($kontak as $item)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->alamat }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->instagram }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->tiktok }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->whatsapp }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            @if($item->qris)
                                <img src="{{ asset('storage/' . $item->qris) }}" width="100">
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            <a href="{{ route('kontak.edit', $item->id) }}"><img src="/img/dashboard-admin/icon-edit.png" class="w-[24px]" alt=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach($kontak as $item)
        <a href="{{ route('kontak.edit', $item->id) }}">
            <button class="cursor-pointer bg-[#3563E9] hover:bg-blue-700 text-white px-8 font-bold py-1 rounded shadow transition mt-5 ">
                Ubah Setting
            </button>
        </a>
    @endforeach
</div>
@endsection