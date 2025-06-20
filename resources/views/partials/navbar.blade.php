<header class="page-header ">
  <div class="page-header__scroll " data-uk-sticky>
    <div class="uk-container ">
      <div class="page-header__inner !py-4">
        <div class="page-header__left">
          <a href="/" class="!no-underline hover:!no-underline sm:text-[32px] text-lg font-bold text-[#3563E9]">Tent Decoration</a>
          {{-- <div class="page-header_logo logo"><a class="logolink" href="index.html"><img class="logo_img" src="assets/img/logo.svg" alt="Doremi"></a></div> --}}
        </div>

        @if (Request::is('/'))
          <div class="sm:flex hidden gap-x-20">
            <a href="#katalog" class="!no-underline hover:!no-underline font-bold text-[18px] !text-[#0A196F]">Katalog</a>
            <a href="#carapemesanan" class="!no-underline hover:!no-underline font-bold text-[18px] !text-[#0A196F]">Cara Pemesanan</a>
            <a href="#testimoni" class="!no-underline hover:!no-underline font-bold text-[18px] !text-[#0A196F]">Testimoni</a>
          </div>
        @endif

        <div class="page-header__right">
          <div class="flex items-center">
            @guest
                <a href="{{ route('login') }}" class="!no-underline hover:!no-underline rounded-[8px] bg-[#3563E9] !text-white px-6 py-1 me-2">Login</a>
                <a href="{{ route('register.create') }}" class="!no-underline hover:!no-underline rounded-[8px] bg-[#3563E9] !text-white px-6 py-1">Daftar</a>
            @else
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard.home') : route('user.dashboard') }}">
    <div class="w-10 h-10 rounded-full overflow-hidden">
  <img 
    src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : '/img/dashboard-admin/avatar.png' }}" 
    alt="Profile" 
    class="w-full h-full object-cover" 
  />
</div>

</a>


                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="button" id="logout-button" class="ms-2 border border-[#C3D4E966] rounded-full p-1 cursor-pointer">
                      <img src="/img/dashboard-admin/logout.png" alt="Logout" class="w-[24px] h-[24px] object-cover" />
                  </button>
                </form>
            @endguest
        </div>

          <div class="page-header__btn-menu"><a href="#offcanvas" data-uk-toggle data-uk-icon="menu"></a></div>
        </div>
      </div>
    </div>
  </div>
</header>
<div id="offcanvas" data-uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column uk-flex-between"><button class="uk-offcanvas-close" type="button" data-uk-close=""></button>
          <div>
            <div class="uk-margin">
              <a href="/" class="!no-underline hover:!no-underline sm:text-[32px] text-lg font-bold !text-[#3563E9]">Tent Decoration</a>
            </div>
            <div class="flex flex-col gap-3">
              <a href="#katalog" class="font-bold text-[12px] !text-[#0A196F]">Katalog</a>
              <a href="#carapemesanan" class="font-bold text-[12px] !text-[#0A196F]">Cara Pemesanan</a>
              <a href="#testimoni" class="font-bold text-[12px] !text-[#0A196F]">Testimoni</a>
            </div>
          </div>
          <div>
          </div>
        </div>
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