@extends('layouts.main')

@section('container')
  <div class="bg-[#F8FAFF] sm:px-25 px-8 sm:py-16 py-8">
    <div class="grid sm:grid-cols-2 grid-cols-1 gap-8">
      <div>
        <img class="!w-full object-cover rounded-lg border border-[#D0D5DD]" src="/img/bayar/qris.png" />
      </div>

      <div class="bg-white border border-[#90A3BF80] rounded-md p-4">
        <p class="text-center text-black font-bold text-[24px] !p-0 !m-0">Bukti Pemesanan</p>
        <p class=" text-[#344054] font-semibold text-[18px] !p-0 !m-0">Paket A</p>
        <table class="table-auto">
          <tbody>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Nama</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="text-[#344054] font-medium py-1">Roger</td>
            </tr>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Alamat</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="text-[#344054] font-medium py-1">Mendalo Darat</td>
            </tr>
            <tr>
              <td class="text-[#344054] font-medium pr-6 py-1">Tanggal</td>
              <td class="text-[#344054] font-medium pr-6 py-1">:</td>
              <td class="text-[#344054] font-medium py-1">24 Agustus 2025</td>
            </tr>
          </tbody>
        </table>

        <p class=" text-black font-bold text-[24px] !mb-0 !pb-0">Detail Pemesanan</p>

        <ul class="list-disc !mt-0 !pt-0">
          <li class="font-normal text-[#1A202C] text-[20px]">1 Set Pelaminan Luar</li>
          <li class="font-normal text-[#1A202C] text-[20px]">500 Pcs Kursi Tamu</li>
          <li class="font-normal text-[#1A202C] text-[20px]">5 Set Meja Tamu VIP</li>
          <li class="font-normal text-[#1A202C] text-[20px]">2 Kotak Amplop</li>
          <li class="font-normal text-[#1A202C] text-[20px]">3 Meja Prasmanan + Set Prasmanan</li>
          <li class="font-normal text-[#1A202C] text-[20px]">1 Set Meja Akad</li>
          <li class="font-normal text-[#1A202C] text-[20px]">4 Tenda Tamu</li>
        </ul>
        <div>
          <p class=" text-[#344054] font-semibold text-[16px] !p-0 !m-0">Bukti Pembayaran <span class="!font-bold !text-red-500">*</span> </p>
          <input type="file" class="border border-[#D0D5DD] block w-full cursor-pointer px-3 py-1 rounded" />
        </div>
        
        <button class="bg-[#3563E9] text-white mt-3 py-1 rounded-lg cursor-pointer w-full">
          Kirim Bukti Pembayaran
        </button>
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

    const bookedDates = ["2025-06-10", "2025-06-15", "2025-06-20"];

    flatpickr("#datepicker", {
      dateFormat: "Y-m-d",
      disable: bookedDates,
      onDayCreate: function(dObj, dStr, fp, dayElem) {
        const date = dayElem.dateObj;
        const dateStr = fp.formatDate(date, "Y-m-d");
        if (bookedDates.includes(dateStr)) {
          dayElem.classList.add("!bg-red-500", "!text-white", "cursor-not-allowed");
        }
      }
    });


  });
</script>
