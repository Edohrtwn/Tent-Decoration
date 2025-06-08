@extends('admin.main') 

@section('container')
<div class="p-6 mt-6 bg-white rounded">
    <h2 class="text-[18px] font-semibold mb-6 text-center">Edit Paket</h2>

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

    <form action="{{ route('paket-dekorasi.update', $paket->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return showSwalLoading()">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-[18px] font-semibold text-[#2A3546]">Nama Paket</label>
            <input type="text" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-[18px] font-semibold text-[#2A3546]">Harga</label>
            <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-[18px] font-semibold text-[#2A3546]">Deskripsi</label>
            <textarea name="detail" rows="3" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('detail', $paket->detail) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="dekorasi_foto" class="block text-[18px] font-semibold text-[#2A3546]">Tambah Foto Baru <span class="text-[#DB2719] text-[16px] font-normal">-- max 4, format JPG/PNG</span></label>
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
            Simpan Perubahan
        </button>
    </form>

    @if ($paket->dekorasi_photos->count())
    <div class="my-4">
        <label class="block text-[18px] font-semibold text-[#2A3546] mb-2">Foto Saat Ini</label>
        <div class="flex flex-wrap gap-4">
            @foreach ($paket->dekorasi_photos as $photo)
                <div class="relative w-32">
                    <img src="{{ asset('storage/' . $photo->foto) }}" class="h-24 w-full object-cover rounded">
                    <form 
                        action="{{ route('paket-dekorasi.delete-foto', $photo->id) }}" 
                        method="POST"
                        class="absolute bottom-0 right-1"
                        onsubmit="return showSwalLoading()"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-white text-white text-xs p-1 rounded-tl rounded-br">
                          <img src="/img/dashboard-admin/icon-delete.png" class="w-[14px]" alt="">
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endif

</div>

<script>
    function previewImages() {
        const previewContainer = document.getElementById('imagePreview');
        const input = document.getElementById('dekorasi_foto');
        const files = input.files;

        previewContainer.innerHTML = '';

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
