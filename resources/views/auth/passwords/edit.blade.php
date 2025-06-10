@extends('admin.main')

@section('container')
  <h2 class="text-[40px] text-[#0A196F] mt-5 font-semibold mb-4 text-center ">Ubah Password</h2>
  <div class=" bg-white p-6 rounded flex justify-center">
      @if ($errors->any())
          <div class="text-red-600 mb-4">
              <ul class="list-disc ml-5">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form class="w-[557px]" method="POST" action="{{ route('password.update') }}">
          @csrf

          <div class="mb-4">
              <label for="current_password" class="block text-[16px] text-[#344054] font-semibold">Password Lama<span class="!text-[#F50D0C] text-[16px]">*</span> </label>
              <input type="password" name="current_password" class="w-full border p-2 rounded" required>
          </div>

          <div class="mb-4">
              <label for="new_password" class="block text-[16px] text-[#344054] font-semibold">Password Baru<span class="!text-[#F50D0C] text-[16px]">*</span></label>
              <input type="password" name="new_password" class="w-full border p-2 rounded" required>
          </div>

          <div class="mb-4">
              <label for="new_password_confirmation" class="block text-[16px] text-[#344054] font-semibold">Konfirmasi Password Baru<span class="!text-[#F50D0C] text-[16px]">*</span></label>
              <input type="password" name="new_password_confirmation" class="w-full border p-2 rounded" required>
          </div>

          <button type="submit"
                  class="!bg-[#3563E9] cursor-pointer text-white font-medium text-[16px] px-10 py-2 rounded">
              Simpan 
          </button>
      </form>
  </div>
@endsection