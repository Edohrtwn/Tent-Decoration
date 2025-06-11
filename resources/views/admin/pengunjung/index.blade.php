@extends('admin.main') 

@section('container')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Data Pengunjung</h2>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full divide-y divide-gray-200">
            {{-- <thead class="bg-[#D6E4FD]"> --}}
            <thead class="">
                <tr>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">No</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Nama</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Alamat</th>
                    <th class="px-4 py-2 text-left text-sm text-[#726C6C] font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($users as $index => $user)
                  @if ($user->role !== 'admin')
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $user->address }}</td>
                        <td class="px-4 py-2 text-sm space-x-2">
                            <div class="flex">
<a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:underline"><img src="/img/dashboard-admin/icon-detail.png" class="w-[24px]" alt=""></a>
                            </div>
                            
                        </td>
                    </tr>
                  @endif
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada Pengunjung.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
</div>
@endsection
