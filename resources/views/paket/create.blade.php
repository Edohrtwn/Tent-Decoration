@extends('admin.main') 

@section('container')
<div class="p-6 mt-6 bg-white rounded">
    <h2 class="text-[18px] font-semibold mb-6 text-center">Tambah Paket</h2>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <strong>Ada kesalahan:</strong>
            <ul class="list-disc ml-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paket-dekorasi.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return showSwalLoading()">
        @csrf

        <div class="mb-4">
            <label for="nama_paket" class="block text-[18px] font-semibold text-[#2A3546]">Nama Paket</label>
            <input type="text" name="nama_paket" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-[18px] font-semibold text-[#2A3546]">Harga</label>
            <input type="number" name="harga" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="detail" class="block text-[18px] font-semibold text-[#2A3546]">Deskripsi</label>
            <textarea name="detail" rows="3" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

        <div class="mb-4">
            <label for="dekorasi_foto" class="block text-[18px] font-semibold text-[#2A3546]">Foto Paket Tenda dan Dekorasi <span class="text-[#DB2719] text-[16px] font-normal">-- 4 Foto/Gambar format Jpg/Png</span> </label>
            <input 
                type="file" 
                name="dekorasi_foto[]" 
                id="dekorasi_foto"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none"
                accept="image/*" 
                multiple
                onchange="previewImages()"
            >
            <div id="imagePreview" class="flex flex-wrap gap-4 mt-4"></div>
        </div>

        <button type="submit" class="font-bold text-[16px] cursor-pointer bg-[#3563E9] text-white px-8 py-1 rounded hover:bg-blue-700 transition">
            Simpan
        </button>
    </form>
</div>

<script>
    function previewImages() {
        const previewContainer = document.getElementById('imagePreview');
        const input = document.getElementById('dekorasi_foto');
        const files = input.files;

        previewContainer.innerHTML = ''; // Clear previous previews

        if (files.length === 0) return;

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('h-24', 'w-auto', 'rounded', 'shadow');
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
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
