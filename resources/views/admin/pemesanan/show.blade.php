@extends('admin.main') 

@section('container')
  <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Pembayaran</h2>
    </div>
    <div class="grid grid-cols-5 gap-4">
      <div class="flex flex-col col-span-3">
        <div class="border border-[#D0D5DD] rounded-md p-4">
          <table class="table-auto">
              <tbody>
                <tr>
                  <td class="font-medium pr-20 py-1">Nama Lengkap</td>
                  <td class="font-medium py-1">: {{ $pemesanan->user->first_name }} {{ $pemesanan->user->last_name }}</td>
                </tr>
                <tr>
                  <td class="font-medium pr-20 py-1">Email</td>
                  <td class="font-medium py-1">: {{ $pemesanan->user->email }}</td>
                </tr>
                <tr>
                  <td class="font-medium pr-20 py-1">No Hp</td>
                  <td class="font-medium py-1">: {{ $pemesanan->user->phone }}</td>
                </tr>
                <tr>
                  <td class="font-medium pr-20 py-1">Alamat</td>
                  <td class="font-medium py-1">: {{ $pemesanan->user->address }}</td>
                </tr>
                <tr>
                  <td class="font-medium pr-20 py-1">Tanggal</td>
                  <td class="font-medium py-1">: {{ $pemesanan->tanggal_mulai }}</td>
                </tr>
                <tr>
                  <td class="font-medium pr-20 py-1">Status Pembayaran</td>
                  <td class="font-medium py-1 text-[#FF7F59]">{{ $pemesanan->status_pembayaran }}</td>
                </tr>
              </tbody>
            </table>
            <div class="grid grid-cols-2 gap-3 mt-4">
              @if($pemesanan->status_pembayaran == "Diproses")
                <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status_pembayaran" value="Sudah Bayar">
                    <button type="submit" class="cursor-pointer w-full px-4 py-2 bg-[#3563E9] text-white rounded-md transition">
                        Terima Pembayaran
                    </button>
                </form>

                <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status_pembayaran" value="Pembayaran Ditolak">
                    <button type="submit" class="cursor-pointer w-full px-4 py-2 bg-[#FF4423] text-white rounded-md transition">
                        Tolak Pembayaran
                    </button>
                </form>
              @endif

              <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status_pembayaran" value="Cancel">
                  <button type="submit" class="cursor-pointer w-full px-4 py-2 bg-[#FF4423] text-white rounded-md transition">
                      Batalkan Pesanan
                  </button>
              </form>
          </div>
        </div>
      </div>
      
      <div class="border border-[#D0D5DD] col-span-2 rounded-md p-8">
        <h2 class="text-2xl font-semibold text-gray-800">Bukti Pembayaran</h2>
        @if($pemesanan->bukti_pembayaran)
          <div class="mt-4">
            <img src="{{ asset('storage/' . $pemesanan->bukti_pembayaran) }}" class="w-[200px] mt-2 border" />
          </div>
        @endif
      </div>
    </div>
    
  </div>
@endsection