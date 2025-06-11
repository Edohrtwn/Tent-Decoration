@extends('layouts.main')

@section('container')
  <h2 class="text-[40px] text-[#0A196F] mt-5 font-semibold mb-4 text-center">Ubah Profile</h2>

  <div class="bg-white p-6 rounded flex justify-center">
    <form class="w-[557px]" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      {{-- Profile Photo --}}
      {{-- Foto Profile --}}
<div class="mb-4">
  <label class="block text-[16px] text-[#344054] font-semibold">Foto Profile</label>
  <div class="mb-2">
    <img id="preview-photo"
         src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://via.placeholder.com/100' }}"
         alt="Foto Profile"
         class="w-[100px] h-[100px] object-cover rounded-full">
  </div>
  <input type="file" name="profile_photo" id="photo-input" class="w-full border p-2 rounded" accept="image/*">
</div>


      {{-- Nama Depan --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Nama Depan <span class="text-[#F50D0C]">*</span></label>
        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="w-full border p-2 rounded" required>
      </div>

      {{-- Nama Belakang --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Nama Belakang <span class="text-[#F50D0C]">*</span></label>
        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="w-full border p-2 rounded" required>
      </div>

      {{-- Telepon --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Nomor HP</label>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full border p-2 rounded">
      </div>

      {{-- Alamat --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Alamat</label>
        <input type="text" name="address" value="{{ old('address', $user->address) }}" class="w-full border p-2 rounded">
      </div>

      <hr class="my-6 border-t border-gray-200">

      {{-- Password Lama --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Password Lama</label>
        <input type="password" name="current_password" class="w-full border p-2 rounded">
      </div>

      {{-- Password Baru --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Password Baru</label>
        <input type="password" name="new_password" class="w-full border p-2 rounded">
      </div>

      {{-- Konfirmasi Password Baru --}}
      <div class="mb-4">
        <label class="block text-[16px] text-[#344054] font-semibold">Konfirmasi Password Baru</label>
        <input type="password" name="new_password_confirmation" class="w-full border p-2 rounded">
      </div>

      @if ($errors->any())
        <div class="text-red-600 mb-4">
          <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <button type="submit" class="!bg-[#3563E9] cursor-pointer text-white font-medium text-[16px] px-10 py-2 rounded">
        Simpan
      </button>
    </form>
  </div>

  <script>
  document.getElementById('photo-input').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (event) {
        document.getElementById('preview-photo').src = event.target.result;
      }
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection
