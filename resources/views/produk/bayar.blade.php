@extends('layouts.main')

@section('container')
  <div class="bg-[#F8FAFF] sm:px-25 px-8 sm:py-16 py-8">
    <div class="grid sm:grid-cols-2 grid-cols-1 gap-8">
      <div>
        <img class="!w-full object-cover rounded-lg border border-[#D0D5DD]" src="{{ asset('storage/' . $kontak->qris) }}" />
      </div>

      <div class="bg-white border border-[#90A3BF80] rounded-md p-4">
        <p class="text-center text-black font-bold text-[24px] !p-0 !m-0">Bukti Pemesanan</p>
        <p class=" text-[#344054] font-semibold text-[18px] !p-0 !m-0">{{ $pemesanan->paket_dekorasi->nama_paket }}</p>
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
              <td class="text-[#344054] font-medium pr-6 py-1">Status</td>
              <td colspan="2" class="font-medium py-1" style="color: {{ $pemesanan->status_pembayaran === 'Sudah Bayar' ? '#7FB519' : '#EF4444' }}">
                {{ $pemesanan->status_pembayaran }}
              </td>
            </tr>
          </tbody>
        </table>

        <p class=" text-black font-bold text-[24px] !mb-0 !pb-0">Detail Pemesanan</p>

        <ul class="list-disc ps-5 !m-0 ">
          @foreach(explode("\n", $pemesanan->paket_dekorasi->detail) as $item)
            @if(trim($item) !== '')
              <li class="font-normal text-[#1A202C] text-[20px]">{{ trim($item) }}</li>
            @endif
          @endforeach
        </ul>
        
        <div>
          @if(session('success'))
            <p class="text-green-600">{{ session('success') }}</p>
          @endif
          
          <form id="formPembayaran" action="{{ route('pembayaran.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $pemesanan->id }}">
            <p class=" text-[#344054] font-semibold text-[16px] !p-0 !m-0">Bukti Pembayaran <span class="!font-bold !text-red-500">*</span> </p>
            <input type="file" name="bukti_pembayaran" class="border border-[#D0D5DD] block w-full cursor-pointer px-3 py-1 rounded" />
            
          </form>
          <div class="flex justify-between">
            <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="status_pembayaran" value="Cancel">
              <button type="submit" class="bg-[#FF4423] text-white mt-3 py-1 rounded-lg cursor-pointer px-10">
                  Batalkan Pesanan
              </button>
            </form>

            <button onclick="document.getElementById('formPembayaran').submit();" class="bg-[#3563E9] text-white mt-3 py-1 rounded-lg cursor-pointer px-10">
              Kirim Bukti Pembayaran
            </button>
          </div>
          
          @if($pemesanan->bukti_pembayaran)
            <div class="mt-4">
              <p>Status: <strong>{{ ucfirst($pemesanan->status_pembayaran) }}</strong></p>
              <img src="{{ asset('storage/' . $pemesanan->bukti_pembayaran) }}" class="w-60 mt-2 border" />
              <a href="/" class="bg-[#3563E9] mt-2 block text-center !text-white !no-underline rounded-md py-1">Kembali Ke Home</a>
            </div>
          @endif
        </div>
        
        
      </div>
    </div>
  </div>
@endsection