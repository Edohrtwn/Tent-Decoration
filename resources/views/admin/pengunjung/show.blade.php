@extends('admin.main')

@section('container')
  <h2 class="text-2xl font-semibold text-gray-800 my-4">Detail Data Pengunjung</h2>
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
        <button id="btn-delete" class="btn btn-danger mt-3 bg-[#DB2719] w-[229px] text-white rounded-md cursor-pointer">Hapus Akun</button>

        <form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
      </div>
    </div>
  </div>

<script>
  document.getElementById('btn-delete').addEventListener('click', function () {
      Swal.fire({
          title: 'Yakin ingin menghapus akun ini?',
          text: "Tindakan ini tidak dapat dibatalkan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('delete-form').submit();
          }
      });
  });
</script>
@endsection