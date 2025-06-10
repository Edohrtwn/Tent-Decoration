@extends('layouts.main')

@section('container')
  <div class="sm:px-40 ">
    <h1 class="text-center !text-[#0A196F]">Selamat Datang!</h1>
    <div class="flex sm:flex-row flex-col gap-4">
      <div class="basis-1/3 border border-[#C3D4E9] rounded flex flex-col items-center justify-center">
        <img 
          src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '/img/dashboard-admin/avatar.png' }}"
          class="w-[110px] h-[110px] rounded-full" 
          alt="">
        <span class="font-semibold text-[24px]">{{ $user->first_name }} {{ $user->last_name }}</span>
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
        <a href="#" class="!no-underline py-1 px-20 mt-4 inline-flex gap-2 items-center !text-[#FFFFFF] bg-[#3563E9] font-semibold text-[14px] rounded-md ">
          Ubah Profile
        </a>
      </div>
    </div>
    <h1 class="!text-[#0A196F]">Riwayat Pemesanan</h1>
    <div id="scrollContainer" class="flex gap-4 !mt-2 overflow-x-hidden select-none !mb-8">
      @forelse ($pemesanans as $index => $pemesanan)
    @php
        $status = $pemesanan->status_pembayaran;
        $isCancel = strtolower($status) === 'cancel';
        $route = '#';

        if ($status === 'Sudah Bayar') {
            $route = route('pembayaran.berhasil', $pemesanan->id);
        } elseif (! $isCancel) {
            $route = route('pembayaran.detail', $pemesanan->id);
        }

        $linkClass = $isCancel 
            ? '!cursor-default pointer-events-none !no-underline'
            : 'hover:shadow-lg transition !cursor-pointer !no-underline';
    @endphp

    <a href="{{ $route }}" class="block  {{ $linkClass }}">
      <div class="bg-white min-w-[591px] border border-[#90A3BF80] rounded-md p-4">
        <p class="text-center text-black font-bold text-[24px] !p-0 !m-0">{{ $pemesanan->paket_dekorasi->nama_paket }}</p>
        <p class="text-[#344054] font-semibold text-[18px] !p-0 !m-0">{{ $pemesanan->paket_dekorasi->nama_paket }}</p>
        <table class="table-auto">
          <tbody>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Nama</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="text-[#344054] font-medium py-1">{{ $pemesanan->user->first_name }}</td>
            </tr>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Alamat</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="text-[#344054] font-medium py-1">{{ $pemesanan->user->address }}</td>
            </tr>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Tanggal</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="text-[#344054] font-medium py-1">{{ $pemesanan->tanggal_mulai }}</td>
            </tr>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Pembayaran</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="font-medium py-1" 
              style="color: {{ $status === 'Sudah Bayar' ? '#7FB519' : '#EF4444' }}">
              {{ $status }}
              </td>
            </tr>
          </tbody>
        </table>
        <p class="text-black font-bold text-[24px] !mb-0 !pb-0">Detail Pemesanan</p>

        <ul class="list-disc ps-5 !m-0 ">
          @foreach(explode("\n", $pemesanan->paket_dekorasi->detail) as $item)
            @if(trim($item) !== '')
              <li class="font-normal text-[#1A202C] text-[20px]">{{ trim($item) }}</li>
            @endif
          @endforeach
        </ul>
      </div>
    </a>
@empty
    <div class="text-center text-gray-500 py-4">
        Belum ada Pesanan.
    </div>
@endforelse


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