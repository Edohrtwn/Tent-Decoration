<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lupa Password</title>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen plus-jakarta-sans font-normal ">
   
@if (session('berhasil'))
    <div id="success-alert"
        class="animate__animated animate__fadeIn fixed top-1/2 left-1/2 z-50 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 13l4 4L19 7"></path>
        </svg>
        <span>{{ session('berhasil') }}</span>
    </div>

    <script>
        setTimeout(() => {
            let alertBox = document.getElementById('success-alert');
            alertBox.classList.add('animate__fadeOut'); // Tambahkan animasi fadeOut

            setTimeout(() => {
                alertBox.remove(); // Hapus setelah animasi selesai
            }, 1000); // Sesuaikan durasi fadeOut (default Animate.css 1 detik)
        }, 3000); // 3 detik sebelum fadeOut mulai
    </script>
@endif
  <div class="grid sm:grid-cols-2 min-h-screen">
    <!-- FORM: tampil dulu di mobile -->
    <div class="order-2 sm:order-none">
      <img src="/img/login/login.png" class="h-screen w-full object-cover" alt="Login Image">
    </div>
    <div class="order-1 sm:order-none flex items-center justify-center p-6">
      <form method="POST" action="{{ route('password.request') }}" class="bg-white p-6 rounded w-full max-w-md">
        @csrf
        <h2 class="text-[28px] font-semibold mb-4 text-center !text-[#101828]">Lupa Kata Sandi</h2>

        @error('email')
          <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <div class="mb-4">
          <label class="font-semibold text-[#344054] text-[16px]">Email</label>
          <input placeholder="contoh@gmail.com" type="email" name="email" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
        </div>

        <button type="submit" class="cursor-pointer w-full bg-[#264BC8] text-white py-2 rounded text-[16px] font-semibold">Kirim Link ke Email</button>
      </form>
    </div>

    <!-- GAMBAR: tampil kedua di mobile -->
    
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