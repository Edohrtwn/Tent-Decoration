<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reset Password</title>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen plus-jakarta-sans font-normal ">

  {{-- SUCCESS ALERT --}}
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
            alertBox.classList.add('animate__fadeOut');
            setTimeout(() => {
                alertBox.remove();
            }, 1000);
        }, 3000);
    </script>
  @endif

  <div class="grid sm:grid-cols-2 min-h-screen">
    <!-- IMAGE -->
    <div class="order-2 sm:order-none">
      <img src="/img/login/login.png" class="h-screen w-full object-cover" alt="Login Image">
    </div>

    <!-- FORM -->
    <div class="order-1 sm:order-none flex items-center justify-center p-6">
      <form method="POST" action="{{ route('password.resetupdate') }}" class="bg-white p-6 rounded w-full max-w-md">
        @csrf

        {{-- Kirim token ke controller --}}
        <input type="hidden" name="token" value="{{ $token }}">

        <h2 class="text-[28px] font-semibold mb-4 text-center text-[#101828]">Reset Password</h2>

        {{-- Error Message --}}
        @if ($errors->any())
          <div class="mb-4 text-red-600 text-sm">
              <ul class="list-disc ml-5">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div class="mb-4">
          <label class="font-semibold text-[#344054] text-[16px]">Email</label>
          <input type="email" name="email" value="{{ old('email', request()->email) }}" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
        </div>

        <div class="mb-4 relative">
          <label class="font-semibold text-[#344054] text-[16px]">Password Baru</label>
          <input id="password" type="password" name="password" required class="w-full border border-[#D0D5DD] rounded px-3 py-2 pr-10">
          <button type="button" id="togglePassword" class="absolute top-9 right-3 text-gray-500" tabindex="-1">
            👁️
          </button>
        </div>

        <div class="mb-4 relative">
          <label class="font-semibold text-[#344054] text-[16px]">Ulangi Password Baru</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border border-[#D0D5DD] rounded px-3 py-2">
          <button type="button" id="togglePasswordUlang" class="absolute top-9 right-3 text-gray-500" tabindex="-1">
            👁️
          </button>
        </div>

        <button type="submit" class="cursor-pointer w-full bg-[#264BC8] text-white py-2 rounded text-[16px] font-semibold">
          Reset Password
        </button>
      </form>
    </div>
  </div>

  {{-- BONUS: Script toggle password --}}
  <script>
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');

    if (toggleBtn && passwordInput) {
      toggleBtn.addEventListener('click', () => {
        const isHidden = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isHidden ? 'text' : 'password');
        toggleBtn.textContent = isHidden ? '🙈' : '👁️';
      });
    }

    const passwordInputUlang = document.getElementById('password_confirmation');
    const toggleBtnUlang = document.getElementById('togglePasswordUlang');

    if (toggleBtnUlang && passwordInputUlang) {
      toggleBtnUlang.addEventListener('click', () => {
        const isHidden = passwordInputUlang.getAttribute('type') === 'password';
        passwordInputUlang.setAttribute('type', isHidden ? 'text' : 'password');
        toggleBtnUlang.textContent = isHidden ? '🙈' : '👁️';
      });
    }
  </script>
</body>
</html>
