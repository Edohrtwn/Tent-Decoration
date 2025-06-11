@extends('layouts.main')

@section('container')
  <div class="bg-[#F8FAFF] sm:px-25 px-8 sm:py-16 py-8">
    <div class="grid sm:grid-cols-2 grid-cols-1 gap-8">
      <div>
        {{-- Gambar Utama --}}
        <img id="mainImage" class="!h-[492px] !w-full object-cover rounded-lg" src="{{ asset('storage/' . $paket->dekorasi_photos->first()->foto ?? 'img/home/paket-a.png') }}" />

        {{-- Thumbnail Gallery --}}
        <div class="grid sm:grid-cols-4 grid-cols-2 gap-4 mt-6">
          @foreach ($paket->dekorasi_photos as $foto)
            <img 
              onclick="changeMainImage('{{ asset('storage/' . $foto->foto) }}')" 
              class="!h-[124px] !w-full object-cover rounded-lg cursor-pointer transition-all duration-200 hover:scale-105" 
              src="{{ asset('storage/' . $foto->foto) }}" 
            />
          @endforeach
        </div>
        <p class="text-[#344054] font-semibold text-[24px] !mb-0 mt-8">Review</p>
        <div id="scrollContainer" class="overflow-x-auto sm:overflow-x-hidden select-none -mx-2 px-2">
          <div class="flex gap-4 min-w-max">
            @foreach($paket->reviews->sortByDesc('created_at') as $review)
              <div class="w-[295px] rounded shrink-0 p-4">
                  <div class="flex justify-between mb-2">
                      <div class="flex gap-2 items-center">
                          <img src="/img/home/profil-ulasan.jpg" alt="profil" class="w-[44px] rounded-full">
                          <span class="font-semibold text-[16px]">
                              {{ optional($review->user)->first_name }} {{ optional($review->user)->last_name }}
                          </span>
                      </div>
                      <div class="text-[#90A3BF] text-[12px] text-right">
                          <div>{{ $review->created_at->format('d F Y') }}</div>
                          <div>
                              @for($j = 0; $j < 5; $j++)
                                  <i class="{{ $j < $review->rating ? 'fas' : 'far' }} fa-star text-yellow-400"></i>
                              @endfor
                          </div>
                      </div>
                  </div>
                  <p class="text-sm text-[#344054] line-clamp-2">{{ $review->isi }}</p>
              </div>
            @endforeach

          </div>
        </div>
        <p class="text-[#344054] font-semibold text-[24px]  !m-0 !p-0">Tambahkan Review</p>
        <!-- Textarea -->
        <form method="POST" action="{{ route('produk.review.store', $paket->id) }}">
          @csrf
          <div x-data="{ rating: 0 }" class="flex items-center gap-1 mb-3">
              <input type="hidden" name="rating" :value="rating">
              <template x-for="i in 5" :key="i">
                  <i 
                      @click="rating = i" 
                      :class="i <= rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-300'" 
                      class="cursor-pointer text-2xl transition-colors duration-200"
                  ></i>
              </template>
          </div>
          <textarea
              name="isi"
              class="w-full border border-[#D0D5DD] rounded-lg p-3 text-sm text-[#344054] placeholder-[#98A2B3] focus:outline-none focus:ring-2 focus:ring-[#D0D5DD]"
              rows="4"
              placeholder="Tulis reviewmu disini" required></textarea>

          <button class="bg-[#3563E9] text-white mt-4 px-6 py-2 rounded-lg cursor-pointer">
            Kirim Review
          </button>
        </form>

      </div>

      <div class="bg-white border border-[#90A3BF80] rounded-md p-4">
        <p class="text-center text-black font-bold text-[32px] !p-0 !m-0">{{ $paket->nama_paket }}</p>
        <p class="text-center text-[#3563E9] font-bold text-[32px] !p-0 !m-0">Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>
        <div class="flex justify-center items-center">
          @for ($i = 1; $i <= 5; $i++)
              <i class="{{ $i <= $averageRating ? 'fas' : 'far' }} fa-star text-yellow-400 me-1"></i>
          @endfor
          <span class="text-[#596780] font-semibold">{{ $totalReviews }} Review</span>
        </div>
        <p class=" text-black font-semibold text-[24px] !p-0 !m-0">Deskripsi Layanan</p>
        <ul class="list-disc ps-5 !m-0 ">
          @foreach(explode("\n", $paket->detail) as $item)
            @if(trim($item) !== '')
              <li class="font-normal text-[#1A202C] text-[20px]">{{ trim($item) }}</li>
            @endif
          @endforeach
        </ul>
        
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
          <div>
            <p class=" text-black font-normal text-[18px] !p-0 !m-0">Tanggal Mulai</p>
            <div class="relative w-full max-w-xs">
              <input
                type="text"
                id="start_date"
                placeholder="Pilih Tanggal"
                class="border border-[#D0D5DD] rounded-lg p-2 w-full pr-10"
                readonly
              />
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <!-- Icon kalender pakai fontawesome / svg -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
            </div>
          </div>

          <div>
            <p class=" text-black font-normal text-[18px] !p-0 !m-0">Tanggal Selesai</p>
            <div class="relative w-full max-w-xs">
              <input
                type="text"
                id="end_date"
                placeholder="Pilih Tanggal"
                class="border border-[#D0D5DD] rounded-lg p-2 w-full pr-10"
                readonly
              />
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <!-- Icon kalender pakai fontawesome / svg -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
            </div>
          </div>
          
        </div>
        @if ($errors->any())
          <div class="text text-red-600">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        {{-- <button class="bg-[#3563E9] text-white mt-3 py-1 rounded-lg cursor-pointer w-full">
          Lanjut Pesan
        </button> --}}
        <form method="POST" action="{{ route('pemesanan.store') }}">
          @csrf
          <input type="hidden" name="paket_dekorasi_id" value="{{ $paket->id }}">
          <input type="hidden" name="tanggal_mulai" id="tanggal_mulai">
          <input type="hidden" name="tanggal_selesai" id="tanggal_selesai">

          <button type="submit" class="cursor-pointer w-full bg-[#3563E9] px-2 py-1 rounded text-[16px] text-center !no-underline !text-white font-medium mt-4 inline-block">
            Lanjut Pesan
          </button>
        </form>

      </div>
    </div>

    <p class="text-[#344054] font-semibold text-[24px] !p-0 !mt-10">Lihat Paket lainnya</p>
    <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
      @foreach ($pakets as $item)
        <div class="bg-white border border-[#C2C2C280] p-4 rounded-lg">
          <img class="!h-[222px] !w-full object-cover rounded-lg" src="{{ asset('storage/' . $item->dekorasi_photos->first()->foto ?? 'img/home/paket-a.png') }}" />
          <div class="flex justify-between mt-10">
            <span class="font-[600] text-[24px]">{{ $item->nama_paket }}</span>
            <span class="font-[600] text-[24px] text-[#264BC8]">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
          </div>
          <div class="font-semibold line-clamp-2">{{ Str::limit(strip_tags($item->detail), 60) }}</div>
          <a href="{{ route('produk.show', ['id' => $item->id]) }}" class="bg-[#3563E9] px-2 py-1 rounded 
            text-[16px] !no-underline !text-white font-medium mt-4 inline-block">
            Sewa Sekarang
          </a>
        </div>
      @endforeach
      
    </div>

  </div>

  <script>
    const bookedDates = @json($bookedDates);
  </script>
@endsection

<script>
  function changeMainImage(imageSrc) {
    document.getElementById('mainImage').src = imageSrc;
  }

  document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('scrollContainer');
    if (container) {
      let isDragging = false, startX, scrollLeft;

      container.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
      });
      container.addEventListener('mouseup', () => isDragging = false);
      container.addEventListener('mouseleave', () => isDragging = false);
      container.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const x = e.pageX - container.offsetLeft;
        container.scrollLeft = scrollLeft - (x - startX) * 1.5;
      });

      container.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
      });
      container.addEventListener('touchend', () => isDragging = false);
      container.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const x = e.touches[0].pageX - container.offsetLeft;
        container.scrollLeft = scrollLeft - (x - startX) * 1.5;
      });
    }

    flatpickr("#start_date", {
      dateFormat: "Y-m-d",
      disable: bookedDates,
      onDayCreate: function(dObj, dStr, fp, dayElem) {
        const dateStr = fp.formatDate(dayElem.dateObj, "Y-m-d");
        if (bookedDates.includes(dateStr)) {
          dayElem.classList.add("!bg-red-500", "!text-white", "cursor-not-allowed");
        }
      },
      onChange: function(selectedDates, dateStr) {
        document.getElementById('tanggal_mulai').value = dateStr;
      }
    });

    flatpickr("#end_date", {
      dateFormat: "Y-m-d",
      disable: bookedDates,
      onDayCreate: function(dObj, dStr, fp, dayElem) {
        const dateStr = fp.formatDate(dayElem.dateObj, "Y-m-d");
        if (bookedDates.includes(dateStr)) {
          dayElem.classList.add("!bg-red-500", "!text-white", "cursor-not-allowed");
        }
      },
      onChange: function(selectedDates, dateStr) {
        document.getElementById('tanggal_selesai').value = dateStr;
      }
    });
  });
</script>

