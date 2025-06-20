<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin | Tent Decoration</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFF] plus-jakarta-sans font-normal h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="flex justify-between items-center bg-white px-20 py-3 shadow h-[70px]">
    <div class="text-xl font-bold text-[32px] text-[#3563E9]"><a href="/">Tent Decoration</a></div>
    <div class="flex items-center gap-4">
      <img src="/img/dashboard-admin/avatar.png" alt="Profile" class="w-10 h-10 rounded-full object-cover">
      <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="button" id="logout-button" class="ms-2 border border-[#C3D4E966] rounded-full p-1 cursor-pointer">
            <img src="/img/dashboard-admin/logout.png" alt="Logout" class="w-[24px] h-[24px] object-cover" />
        </button>
      </form>
    </div>
  </nav>

  <!-- Main Section -->
  <div class="flex sm:flex-row flex-col flex-1 overflow-hidden">
    
    <!-- Sidebar -->
    <aside class="w-[289px] bg-white shadow-lg p-4 px-6 flex flex-col justify-between">
      <div>
        <nav class="space-y-2">
          <a href="{{ route('admin.dashboard.home') }}" class="py-2 px-5 flex gap-2 items-center text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md {{ Route::is('admin.dashboard.*') ? 'text-white bg-[#3563E9]' : 'text-black bg-[#FAFAFA]' }}">
          <img src="{{ Route::is('admin.dashboard.*') ? asset('img/dashboard-admin/icon-dashboard-active.png') : asset('img/dashboard-admin/icon-dashboard.png') }}" class="w-[24px] h-[24px] rounded-full object-cover">Dashboard
          </a>

          <a href="{{ route('kontak.index') }}" class="py-2 px-5 flex gap-2 items-center font-semibold text-[14px] rounded-md {{ Route::is('kontak.*') ? 'text-white bg-[#3563E9]' : 'text-black bg-[#FAFAFA]' }}">
          <img src="{{ Route::is('kontak.*') ? asset('/img/dashboard-admin/icon-setting-active.png') : asset('/img/dashboard-admin/icon-setting.png') }}"
           alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Pengaturan
          </a>

          <p class="mt-8 text-[#0A0A0B] text-[12px] font-bold">Mater Data</p>
          <a href="{{ route('users.index') }}" class="py-2 px-5 flex gap-2 items-center text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md {{ Route::is('users.*') ? 'text-white bg-[#3563E9]' : 'text-black bg-[#FAFAFA]' }}">
            <img src="{{ Route::is('users.*') ? asset('img/dashboard-admin/icon-bentuk-user-active.png') : asset('img/dashboard-admin/icon-bentuk-user.png') }}" alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Data Pengunjung
          </a>

          <a href="{{ route('admin.pemesanans.index') }}" class="py-2 px-5 flex gap-2 items-center text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md {{ Route::is('admin.pemesanans.*') ? 'text-white bg-[#3563E9]' : 'text-black bg-[#FAFAFA]' }}">
            <img src="{{ Route::is('admin.pemesanans.*') ? asset('img/dashboard-admin/icon-bentuk-user-active.png') : asset('img/dashboard-admin/icon-bentuk-user.png') }}" alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Kelola Pesanan
          </a>
          <a href="{{ route('paket-dekorasi.index') }}" class="py-2 px-5 flex gap-2 items-center text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md {{ Route::is('paket-dekorasi.*') ? 'text-white bg-[#3563E9]' : 'text-black bg-[#FAFAFA]' }}">
          <img src="{{ Route::is('paket-dekorasi.*') ? asset('img/dashboard-admin/icon-kelola-paket-active.png') : asset('img/dashboard-admin/icon-kelola-paket.png') }}" alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Kelola Paket Dekorasi
          </a>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-[20px] bg-[#F8FAFF] overflow-auto">
      @yield('container')
    </main>

  </div>
  <script>
    document.getElementById('logout-button').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission initially

        Swal.fire({
            title: 'Anda Yakin?',
            text: "Anda akan logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit(); // Submit the form if confirmed
            }
        })
    });
</script>
</body>

</html>