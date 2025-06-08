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
    <div class="text-xl font-bold text-[32px] text-[#3563E9]">Tent Decoration</div>
    <div class="flex items-center gap-4">
      <img src="/img/dashboard-admin/avatar.png" alt="Profile" class="w-10 h-10 rounded-full object-cover">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="border border-[#C3D4E966] rounded-full p-1 cursor-pointer">
          <img src="/img/dashboard-admin/logout.png" alt="Logout" class="w-[24px] h-[24px] object-cover">
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
          <a href="#" class="py-2 px-5 flex gap-2 items-center text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md {{ Route::is('admin.dashboard') ? 'text-white bg-[#3563E9]' : 'text-black bg-[#FAFAFA]' }}">
          <img src="/img/dashboard-admin/icon-dashboard.png" alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Dashboard
          </a>

          <a href="#" class="py-2 px-5 flex gap-2 items-center text-[#000000] bg-[#FAFAFA] font-semibold text-[14px] rounded-md">
          <img src="/img/dashboard-admin/icon-setting.png" alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Pengaturan
          </a>

          <p class="mt-8 text-[#0A0A0B] text-[12px] font-bold">Mater Data</p>
          <a href="#" class="py-2 px-5 flex gap-2 items-center text-[#000000] bg-[#FAFAFA] font-semibold text-[14px] rounded-md">
          <img src="/img/dashboard-admin/icon-kelola-paket.png" alt="Profile" class="w-[24px] h-[24px] rounded-full object-cover">Kelola Paket Dekorasi
          </a>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-[70px] bg-[#F8FAFF] overflow-auto">
      <h2 class="text-xl mb-4 text-center font-bold text-[40px] text-[#0A196F]">Selamat datang!</h2>

      <div>
        <div class="flex flex-row gap-4">
          <div class="basis-1/3 border border-[#C3D4E9] rounded flex flex-col items-center justify-center">
            <img src="/img/dashboard-admin/avatar.png" class="w-[110px] h-[110px] rounded-full" alt="">
            <h1 class="font-semibold text-[24px]">Saitama</h1>
          </div>
          <div class="basis-2/3 border border-[#C3D4E9] rounded p-[32px]">
            <table class="table-auto">
              <tbody>
                <tr>
                  <td class="text-[#000000] font-medium pr-6 py-1">Nama</td>
                  <td class="text-[#000000] font-medium py-1">: Roger</td>
                </tr>
                <tr>
                  <td class="text-[#000000] font-medium pr-6 py-1">Email</td>
                  <td class="text-[#000000] font-medium py-1">: admin@tentdec.com</td>
                </tr>
                <tr>
                  <td class="text-[#000000] font-medium pr-6 py-1">No Hp</td>
                  <td class="text-[#000000] font-medium py-1">: +628992321523</td>
                </tr>
                <tr>
                  <td class="text-[#000000] font-medium pr-6 py-1">Alamat</td>
                  <td class="text-[#000000] font-medium py-1">: Kota jambi</td>
                </tr>
              </tbody>
            </table>
            <a href="#" class="py-1 px-20 mt-4 inline-flex gap-2 items-center text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md ">
              Ubah Profile
            </a>
          </div>
        </div>
      </div>
    </main>

  </div>
</body>

</html>