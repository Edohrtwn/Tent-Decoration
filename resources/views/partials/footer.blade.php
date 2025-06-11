<div class="bg-[#102587] py-8 sm:px-44">
      <div class="grid sm:grid-cols-5">
        <div class="sm:col-span-3">
          <p class="!text-[40px] !font-bold text-white !p-0 !m-0 leading-[1.2]">TENT DECORATION</p>
          <p class="!text-[14px] !font-normal text-white !p-0 leading-[1.2] sm:w-[300px] !mt-5 !me-0 sm:text-start text-center ">{{ $kontak->alamat ?? 'Alamat belum tersedia' }}</p>
          <p class="!text-[14px] !font-normal text-white !p-0 leading-[1.2] w-[300px] !mt-10 !mb-3">Copyright © 2025 Tent Decoration</p>
          <p class="!text-[14px] !font-normal text-white !p-0 !m-0 leading-[1.2] w-[300px]">All rights reserved</p>
        </div>
        <div class="">
          <p class="!text-[20px] !font-semibold text-white !p-0 !m-0 leading-[1.2]">Navigasi</p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]">Katalog</p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]">Cara Pemesanan</p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]">Hubungi Kami</p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]">Testimoni</p>
        </div>
        <div class="">
          <p class="!text-[20px] !font-semibold text-white !p-0 !m-0 leading-[1.2]">Informasi</p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]"> <a href="{{ $kontak->instagram }}" target="_blank" class="!text-white hover:no-underline no-underline">Instagram</a></p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]"><a href="{{ $kontak->tiktok }}" target="_blank" class="!text-white hover:no-underline no-underline">Tiktok</a></p>
          <p class="!text-[14px] !font-normal text-white leading-[1.2]"><a href="{{ $kontak->whatsapp }}" target="_blank" class="!text-white hover:no-underline no-underline">WhatsApp</a></p>
          <div class="flex gap-4">
            <a href="{{ $kontak->instagram }}" target="_blank" class="!no-underline w-10 h-10 rounded-full bg-[#3E4CB3] flex items-center justify-center !text-white">
              <i class="fab fa-instagram"></i>
            </a>

            <a href="{{ $kontak->tiktok }}" target="_blank" class="!no-underline w-10 h-10 rounded-full bg-[#3E4CB3] flex items-center justify-center !text-white">
              <i class="fab fa-tiktok"></i>
            </a>

            <a href="{{ $kontak->whatsapp }}" target="_blank" class="!no-underline w-10 h-10 rounded-full bg-[#3E4CB3] flex items-center justify-center !text-white">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>

        </div>
      </div>
    </div>