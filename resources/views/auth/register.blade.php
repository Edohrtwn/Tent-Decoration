<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | Tent Decoration</title>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen plus-jakarta-sans font-normal">
  <div class="grid sm:grid-cols-2 min-h-screen">
    <!-- FORM: tampil dulu di mobile -->
    <div class="flex items-center justify-center p-6">
      
      <form method="POST" action="{{ route('register.store') }}" class="bg-white p-6 rounded w-full max-w-md">
        @csrf
        <p class="text-center text-[#5A5A5D] text-[16px]">Selamat Datang!</p>
        <h2 class="text-[28px] font-semibold mb-4 text-center !text-[#101828]">Pendaftaran Akun</h2>

        @error('email')
          <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <div class="flex gap-4">
          <div class="mb-4">
            <label class="font-semibold text-[#344054] text-[16px]">Nama Depan</label>
            <input placeholder="Nama Depan" type="text" name="first_name" value="{{ old('first_name') }}" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
          </div>
          <div class="mb-4">
            <label class="font-semibold text-[#344054] text-[16px]">Nama Belakang</label>
            <input placeholder="Nama Belakang" type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
          </div>
        </div>

        <div class="mb-4">
          <label class="font-semibold text-[#344054] text-[16px]">No Handphone</label>
          <input placeholder="082217812379" type="text" name="phone" value="{{ old('phone') }}" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label class="font-semibold text-[#344054] text-[16px]">Alamat</label>
          <input placeholder="Patimura Kota Jambi" type="text" name="address" value="{{ old('address') }}" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
        </div>

        <div class="mb-4">
          <label class="font-semibold text-[#344054] text-[16px]">Email</label>
          <input placeholder="contoh@gmail.com" type="email" name="email" required class="w-full border border-[#D0D5DD] rounded px-3 py-2" value="{{ old('email') }}">
        </div>

        <div class="mb-4 relative">
          <label class="font-semibold text-[#344054] text-[16px]">Password</label>
          <input 
            id="password" 
            type="password" 
            name="password" 
            placeholder="Masukkan Password"
            required 
            class="w-full border border-gray-300 rounded px-3 py-2 pr-10 mt-1"
            value="{{ old('password') }}"
          >

          <!-- Eye Icon Button -->
          <button 
            type="button" 
            id="togglePassword" 
            class="absolute right-3 top-10 text-gray-500"
          >
            <!-- Eye SVG (default) -->
            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
            </svg>

            <!-- Eye Off SVG (hidden initially) -->
            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.953 9.953 0 012.106-3.248M9.88 9.88a3 3 0 104.24 4.24"/>
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3l18 18"/>
            </svg>
          </button>
        </div>

        <button type="submit" class="cursor-pointer w-full bg-[#264BC8] text-white py-2 rounded text-[16px] font-semibold">Buat Akun</button>
        @if ($errors->any())
          <div style="color: red;">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <p class="text-center mt-5"><span class="text-[#98A2B3]">Sudah Punya Akun?</span> <a href="{{ route('login') }}" class="text-[#0169BF]">Log in</a></p>
      </form>
    </div>
    <div class="">
      <img src="/img/login/login.png" class="h-screen w-full object-cover" alt="Login Image">
    </div>
    
  </div>

  <script>
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    toggleBtn.addEventListener('click', () => {
      const isHidden = passwordInput.getAttribute('type') === 'password';
      passwordInput.setAttribute('type', isHidden ? 'text' : 'password');

      // Toggle icons
      eyeOpen.classList.toggle('hidden', !isHidden);
      eyeClosed.classList.toggle('hidden', isHidden);
    });
  </script>
</body>
</html>