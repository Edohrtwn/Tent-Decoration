@extends('layouts.main')

@section('container')
{{-- banner atas --}}
  <div class="w-full  bg-cover bg-center" style="background-image: url('/img/home/bg-home.png');">
    <div class="flex items-center h-screen inset-0 bg-gradient-to-r from-white via-white/50 to-transparent">
      <div class="sm:px-40 px-10 w-full mb-40">
        <p class="!font-[600] !p-0 !m-0" style="font-family: 'DM Sans';">Pesan Sekarang</p>
        <p class="!font-[700] sm:!text-[60px] !text-3xl !p-0 !m-0" style="font-family: 'DM Sans';">Tenda dan Dekorasi <br/> Sempurna untuk Setiap Acara <br/> Spesial Anda</p>
        <p class="!font-[400] sm:text-[20px] !p-0 !m-0 sm:w-[612px] text-justify" style="font-family: 'DM Sans';">Siap memberikan sentuhan elegan dan nyaman pada setiap acara, mulai dari pernikahan hingga perayaan lainnya. Pilih dari berbagai pilihan tenda dan dekorasi yang dapat disesuaikan dengan tema acara Anda. Wujudkan momen tak terlupakan bersama kami.</p>
      </div>
    </div>
  </div>

  <div id="katalog" class="scroll-mt-24 bg-[#F8FAFF]">
    {{-- paket --}}
    <div class="sm:p-16 p-8">
      <div class="grid sm:grid-cols-2 grid-rows-auto gap-4">
        @foreach ($pakets as $index => $paket)
            <div class="bg-white border border-[#C2C2C280] p-4 rounded-lg {{ $index == 0 ? 'row-span-2' : '' }}">
                <img 
                    class="{{ $index == 0 ? '!h-[682px]' : '!h-[222px]' }} !w-full object-cover rounded-lg" 
                    src="{{ $paket->dekorasi_photos->first() ? asset('storage/' . $paket->dekorasi_photos->first()->foto) : '/img/bg-home.png' }}" 
                    alt="Foto Paket"
                />
                <div class="flex justify-between mt-5 {{ $index > 0 ? 'mt-10' : '' }}">
                    <span class="font-[600] text-[24px]">{{ $paket->nama_paket }}</span>
                    <span class="font-[600] text-[24px] text-[#264BC8]">Rp{{ number_format($paket->harga, 0, ',', '.') }}</span>
                </div>
                <div class="font-semibold">{{ $paket->detail }}</div>
                <a href="{{ route('produk.show', ['id' => $paket->id]) }}" class="bg-[#3563E9] px-2 py-1 rounded 
                    text-[16px] !no-underline !text-white font-medium mt-4 inline-block">
                    Sewa Sekarang
                </a>
            </div>
        @endforeach
    </div>


    </div>

    {{-- Ulasan --}}
    <div id="testimoni" class="sm:px-16 px-8 pb-16 scroll-mt-24">
      <div class="!bg-white px-4 py-2 rounded-xl">
        <span class="font-[600] text-[24px] ">Ulasan</span>
        <div id="scrollContainer" class="flex gap-4 !mt-2 overflow-x-hidden select-none">
          @foreach ($allReviews as $review)
            <div class="min-w-[295px] rounded mb-4">
                <div class="flex justify-between">
                    <div class="flex gap-2 items-center">
                        <img src="{{ $review->user->profile_photo ?? '/img/home/profil-ulasan.jpg' }}" alt="profil" class="w-[44px] h-[44px] rounded-full object-cover">
                        <span class="font-[600] text-[16px] ">{{ $review->user->first_name ?? 'User' }}</span>
                    </div>
                    <div class="text-right">
                        <div class="font-[500] text-[12px] text-[#90A3BF]">
                            {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}
                        </div>
                        <div class="font-[500] text-[12px] text-[#90A3BF]">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star text-yellow-400"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="w-full line-clamp-2 mt-2 text-[#1A202C]">
                    {{ $review->isi }}
                </p>
            </div>
          @endforeach
        </div>
      </div>

    </div>

    {{-- Langkah Pemesanan --}}
    <div id="carapemesanan" class="scroll-mt-24 sm:px-16 px-8 pb-16">
      <p class="!text-[40px] !font-bold !p-0 !m-0 text-center">Langkah Pemesanan Tenda</p>
      <p class="!text-[16px] !font-medium !text-[#717171] !p-0 !m-0 text-center">Tiga langkah mudah untuk proses pemesanan tenda di website kami</p>
      <div class="grid sm:grid-cols-3 gap-8 mt-3">
        <div class="bg-white rounded-md drop-shadow-md px-4 py-4">
          <div class="mt-2 mb-4 bg-[#EAEFFF] text-center rounded-full mx-12 font-bold text-[24px] text-[#3563E9]">1</div>
          <p class="!text-[20px] !font-bold !text-[#4D4D4D] !p-0 !m-0 text-center">Pilih Layanan Tenda dan Dekorasi</p>
          <p class="!text-[14px] !font-medium !text-[#717171] !p-0 !m-0 text-center">Pilih jenis tenda dan dekorasi yang sesuai dengan kebutuhan acara Anda. Kami menyediakan berbagai pilihan tenda, dari yang sederhana hingga mewah, serta dekorasi yang dapat disesuaikan dengan tema acara.</p>

        </div>
        <div class="bg-white rounded-md drop-shadow-md px-4 py-4">
          <div class="mt-2 mb-4 bg-[#EAEFFF] text-center rounded-full mx-12 font-bold text-[24px] text-[#3563E9]">2</div>
          <p class="!text-[20px] !font-bold !text-[#4D4D4D] !p-0 !m-0 text-center">Tentukan Tanggal dan Lokasi</p>
          <p class="!text-[14px] !font-medium !text-[#717171] !p-0 !m-0 text-center">Masukkan detail acara Anda, seperti tanggal dan lokasi. Pastikan tenda dan dekorasi yang Anda pilih tersedia pada tanggal tersebut, dan kami akan mengirimkan tim untuk persiapan di lokasi.</p>

        </div>
        <div class="bg-white rounded-md drop-shadow-md px-4 py-4">
          <div class="mt-2 mb-4 bg-[#EAEFFF] text-center rounded-full mx-12 font-bold text-[24px] text-[#3563E9]">3</div>
          <p class="!text-[20px] !font-bold !text-[#4D4D4D] !p-0 !m-0 text-center">Konfirmasi dan Pembayaran</p>
          <p class="!text-[14px] !font-medium !text-[#717171] !p-0 !m-0 text-center">Setelah memilih layanan, kami akan mengirimkan penawaran harga. Lakukan konfirmasi dan pembayaran melalui metode yang nyaman untuk Anda. Setelah pembayaran diterima, kami akan mengatur pengiriman dan pemasangan tenda sesuai dengan jadwal yang telah ditentukan.</p>

        </div>
      </div>
    </div>

    <div class="sm:px-16 px-8 pb-16">
      <div class="bg-white rounded-xl sm:p-16 p-8">
        <div class="grid sm:grid-cols-2 gap-8">
          <div>
            <div class="flex flex-col gap-8">
              <p class="!text-[40px] !font-semibold !text-[#040815] !p-0 !m-0 leading-[1.5]">Pertanyaan yang sering di tanyakan</p>
              <p class="!text-[16px] w-full !font-medium !text-[#878C91] !p-0 !m-0 text-justify">
                Anda akan menemukan jawaban atas pertanyaan yang sering diajukan tentang layanan penyewaan tenda dan dekorasi kami. Kami berkomitmen untuk memberikan pengalaman yang mudah dan menyenangkan untuk acara Anda. Jika Anda tidak menemukan jawaban yang Anda cari, jangan ragu untuk menghubungi tim customer service kami yang siap membantu kapan saja.
              </p>
              <a href="{{ $kontak->whatsapp }}" target="_blank" class="!no-underline hover:!no-underline border !text-black w-fit px-8 rounded-full py-2">Hubungi Kami</a>
            </div>
          </div>
          <div id="accordion">
            @php
                $faq = [
                    [
                        'q' => 'Apa saja jenis tenda yang tersedia untuk disewa?',
                        'a' => 'Kami menyediakan berbagai jenis tenda, mulai dari tenda klasik hingga tenda mewah, yang bisa disesuaikan dengan tema acara Anda. Anda bisa memilih tenda sesuai dengan ukuran dan desain yang diinginkan.',
                    ],
                    [
                        'q' => 'Bagaimana cara memilih paket tenda yang tepat untuk acara saya?',
                        'a' => 'Kami akan membantu Anda memilih berdasarkan kebutuhan, lokasi, dan jumlah tamu.',
                    ],
                    [
                        'q' => 'Apakah harga sewa sudah termasuk dekorasi?',
                        'a' => 'Harga sewa standar tidak termasuk dekorasi, namun tersedia paket tambahan.',
                    ],
                    [
                        'q' => 'Apakah saya bisa menyesuaikan dekorasi sesuai tema acara?',
                        'a' => 'Ya, kami menyediakan opsi penyesuaian dekorasi sesuai permintaan Anda.',
                    ],
                ];
            @endphp

            @foreach($faq as $index => $item)
            <div class="border-b p-4 {{ $index === 0 ? 'border-t' : '' }}">
              <div class="flex items-center justify-between cursor-pointer accordion-question" data-index="{{ $index }}">
                <p class="text-[24px] font-semibold text-[#040815]  leading-[1.5]">
                  {{ $item['q'] }}
                </p>
                <i class="fas fa-plus transition-all duration-200 text-xl"></i>
              </div>
              <div class="accordion-answer hidden text-[16px] text-[#878C91] text-justify">
                {{ $item['a'] }}
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

    <div class="px-16 pb-16">
      <p class="!text-[64px] !font-semibold !p-0 !m-0 text-center leading-[1.2]">Pesan tenda dan dekorasi untuk acara Anda sekarang!</p>
      <div class="flex justify-center">
        <a href="{{ $kontak->whatsapp }}" target="_blank" class="bg-[#3563E9] !px-4 !py-2 rounded !text-[16px] !no-underline !text-white !font-medium !mt-4 ">Hubungi Kami</a>
      </div>
    </div>   
  </div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('scrollContainer');
    if (!container) return;

    let isDragging = false;
    let startX;
    let scrollLeft;

    // === Desktop (Mouse) ===
    container.addEventListener('mousedown', (e) => {
      isDragging = true;
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });

    container.addEventListener('mouseup', () => {
      isDragging = false;
    });

    container.addEventListener('mouseleave', () => {
      isDragging = false;
    });

    container.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      e.preventDefault();
      const x = e.pageX - container.offsetLeft;
      const walk = (x - startX) * 1.5;
      container.scrollLeft = scrollLeft - walk;
    });

    // === Mobile (Touch) ===
    container.addEventListener('touchstart', (e) => {
      isDragging = true;
      startX = e.touches[0].pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });

    container.addEventListener('touchend', () => {
      isDragging = false;
    });

    container.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      const x = e.touches[0].pageX - container.offsetLeft;
      const walk = (x - startX) * 1.5;
      container.scrollLeft = scrollLeft - walk;
    });

    const questions = document.querySelectorAll('.accordion-question');

    questions.forEach((question) => {
      question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        const icon = question.querySelector('i');

        const isOpen = !answer.classList.contains('hidden');

        // Tutup semua accordion dulu
        document.querySelectorAll('.accordion-answer').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.accordion-question i').forEach(ic => {
          ic.classList.remove('fa-minus');
          ic.classList.add('fa-plus');
        });

        // Kalau belum terbuka, buka
        if (!isOpen) {
          answer.classList.remove('hidden');
          icon.classList.remove('fa-plus');
          icon.classList.add('fa-minus');
        }
      });
    });
  });
</script>
