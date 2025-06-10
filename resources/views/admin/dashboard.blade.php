@extends('admin.main')

@section('container')
  <h2 class="text-xl mb-4 text-center font-bold text-[40px] text-[#0A196F]">Selamat datang!</h2>
  <div>
    <div class="flex flex-row gap-4">
      <div class="basis-1/3 border border-[#C3D4E9] rounded flex flex-col items-center justify-center">
        <img 
          src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '/img/dashboard-admin/avatar.png' }}"
          class="w-[110px] h-[110px] rounded-full" 
          alt="">
        <h1 class="font-semibold text-[24px]">{{ $user->first_name }} {{ $user->last_name }}</h1>
      </div>
      <div class="basis-2/3 border border-[#C3D4E9] rounded p-[32px]">
        <table class="table-auto">
          <tbody>
            <tr>
              <td class="text-[#000000] font-medium pr-6 py-1">Nama</td>
              <td class="text-[#000000] font-medium py-1">: {{ $user->first_name }} {{ $user->last_name }}</td>
            </tr>
            <tr>
              <td class="text-[#000000] font-medium pr-6 py-1">Email</td>
              <td class="text-[#000000] font-medium py-1">: {{ $user->email }}</td>
            </tr>
            <tr>
              <td class="text-[#000000] font-medium pr-6 py-1">No Hp</td>
              <td class="text-[#000000] font-medium py-1">: {{ $user->phone }}</td>
            </tr>
            <tr>
              <td class="text-[#000000] font-medium pr-6 py-1">Alamat</td>
              <td class="text-[#000000] font-medium py-1">: {{ $user->address }}</td>
            </tr>
          </tbody>
        </table>
        <a href="{{ route('admin.dashboard.password.edit') }}" class="no-underline py-1 px-20 mt-4 inline-flex gap-2 items-center !text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md ">
          Ubah Password
        </a>
      </div>
    </div>
  </div>
@endsection