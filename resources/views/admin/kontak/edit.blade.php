@extends('admin.main') 

@section('container')
  <h2 class="text-[40px] text-[#0A196F] mt-5 font-semibold mb-4 text-center ">Edit Kontak</h2>
	<div class=" bg-white p-6 rounded flex justify-center">
		<form class="w-[557px]" action="{{ route('kontak.update', $kontak->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="mb-4">
				<label class="block text-[16px] text-[#344054] font-semibold">Alamat:</label>
				<input class="w-full border p-2 rounded" required type="text" name="alamat" value="{{ old('alamat', $kontak->alamat) }}">
			</div>

			<div class="mb-4">
				<label class="block text-[16px] text-[#344054] font-semibold">Instagram:</label>
				<input class="w-full border p-2 rounded" type="url" name="instagram" value="{{ old('instagram', $kontak->instagram) }}">
			</div>

			<div class="mb-4">
				<label class="block text-[16px] text-[#344054] font-semibold">Tiktok:</label>
				<input class="w-full border p-2 rounded" type="url" name="tiktok" value="{{ old('tiktok', $kontak->tiktok) }}">
			</div>

			<div class="mb-4">
				<label class="block text-[16px] text-[#344054] font-semibold">WhatsApp:</label>
				<input class="w-full border p-2 rounded" type="url" name="whatsapp" value="{{ old('whatsapp', $kontak->whatsapp) }}">
			</div>

			<label>QRIS:</label>
			@if($kontak->qris)
					<img id="qrisPreview" src="{{ asset('storage/' . $kontak->qris) }}" width="100" class="mb-2">
			@endif
			<input class="w-full border p-2 rounded cursor-pointer mb-4" type="file" name="qris" id="qrisInput" accept="image/*">
			<button type="submit"
				class="!bg-[#3563E9] cursor-pointer text-white font-medium text-[16px] px-10 py-2 rounded">
					Simpan 
			</button>
		</form>
	</div>

	<script>
		document.getElementById('qrisInput').addEventListener('change', function(event) {
			const file = event.target.files[0];
			if (file) {
				const preview = document.getElementById('qrisPreview');
				preview.src = URL.createObjectURL(file);
			}
		});
	</script>

@endsection