@extends('admin.main') 

@section('container')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Paket Dekorasi</h2>
        
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-[#D6E4FD]">
                <tr>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">No</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Nama Paket</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Harga</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Status</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($pakets as $index => $paket)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $paket->nama_paket }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-sm">
                            <span class="text-green-600 font-medium">Aktif</span>
                        </td>
                        <td class="px-4 py-2 text-sm space-x-2">
                            <div class="flex">
<a href="{{ route('paket-dekorasi.edit', $paket->id) }}" class="text-blue-600 hover:underline"><img src="/img/dashboard-admin/icon-edit.png" class="w-[24px]" alt=""></a>
                                <form action="{{ route('paket-dekorasi.destroy', $paket->id) }}" method="POST" class="inline" onsubmit="return showSwalLoading()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="text-red-600 hover:underline cursor-pointer">
                                        <img src="/img/dashboard-admin/icon-delete.png" class="w-[24px]" alt="">
                                    </button>
                                </form>
                            </div>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada paket dekorasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
    <a href="{{ route('paket-dekorasi.create') }}">
        <button class="cursor-pointer bg-[#3563E9] hover:bg-blue-700 text-white px-8 font-bold py-1 rounded shadow transition mt-5 ">
            Tambah Paket
        </button>
    </a>
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
