@extends('admin.main') 

@section('container')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Data Pemesanan</h2>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="border-b-2">
                <tr>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">No</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Nama</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Alamat</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Tanggal Acara</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Paket Tenda</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($pemesanans as $index => $pemesanan)
                    <tr onclick="window.location='{{ route('admin.pemesanans.show', $pemesanan->id) }}'" class="cursor-pointer hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $pemesanan->user->first_name }} {{ $pemesanan->user->last_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $pemesanan->user->address }}</td>
                        <td class="px-4 py-2 text-sm">
                            {{ \Carbon\Carbon::parse($pemesanan->tanggal_mulai)->translatedFormat('j F Y') }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $pemesanan->paket_dekorasi->nama_paket }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $pemesanan->status_pembayaran }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada Pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
</div>

<script>
    function showSwalLoading() {
        Swal.fire({
            title: 'Menyimpan data...',
            html: 'Mohon tunggu sebentar.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        return true; // biar form tetap lanjut submit
    }
</script>
@endsection
