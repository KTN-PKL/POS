
 <div class="card-body" style="border-bottom:1px solid grey">
    <div class="col-md-4 offset-md-4">
        <img src="{{asset('/fototoko/'. $pengaturan->tgambar)}}" style="display:block; margin:auto;"  alt="Gambar" width="100px" height="80px">
        <h4 style="text-align: center">{{ $toko->tnama }}</h4>
        <p style="text-align: center">{{ $toko->talamat }}</p>
    </div>
    <div class="row">
        <div class="col-md-2">No Struk</div>
        <div class="col-md-2">: {{ $transaksi->id_transaksi }}</div>
    </div>
    <div class="row">
        <div class="col-md-2">Atas Nama</div>
        <div class="col-md-2">: {{ $transaksi->atasnama }}</div>
    </div>
    <div class="row">
        <div class="col-md-2">Kasir</div>
        <div class="col-md-2">: {{ Auth::user()->name }}</div>
        <div class="col-md-3 offset-md-5">{{ $transaksi->order }}({{ $transaksi->status }})</div>
    </div>     
 </div>
 <div class="card-body" style="border-bottom:1px solid grey">
    <div class="row">
        <div class="col-md-3">Item</div>
        <div class="col-md-3">Qty</div>
        <div class="col-md-3">Harga</div>
        <div class="col-md-3">Sub-Total</div>
    </div>
    @foreach ($keranjang as $item)
    <div class="row">
        <div class="col-md-3">{{ $item->item }}</div>
        <div class="col-md-3">{{ $item->qty }}</div>
        <div class="col-md-3">{{ $item->jual }}</div>
        <div class="col-md-3">{{ $item->subtotal }}</div>
    </div>
    @endforeach
 </div>
 <div class="card-body" style="border-bottom:1px solid grey">
    <div class="row">
        <div class="col-md-3 offset-md-6">Total</div>
        <div class="col-md-3">{{ $transaksi->total }}</div>
    </div>
    @if ($pengaturan->tdiskonpersen == "enable")
         
    <div class="row">
        <div class="col-md-3 offset-md-6">Discount {{ $transaksi->discountrate }}%</div>
        <div class="col-md-3">@php
            $d = ($transaksi->discountrate / 100) * $transaksi->total;
            echo $d;
        @endphp</div>
    </div>
    @endif
    @if ($pengaturan->tpajakpersen == "enable")
    <div class="row">
        <div class="col-md-3 offset-md-6">Pajak {{ $transaksi->pajakrate }}%</div>
        <div class="col-md-3">@php
            $d = ($transaksi->pajakrate / 100) * $transaksi->total;
            echo $d;
        @endphp</div>
    </div>  
    @endif
    @if ($pengaturan->tdiskonrp == "enable")
    <div class="row">
        <div class="col-md-3 offset-md-6">Discount</div>
        <div class="col-md-3">{{ $transaksi->discount }}</div>
    </div>  
    @endif
    @if ($pengaturan->tpajakrp == "enable")
    <div class="row">
        <div class="col-md-3 offset-md-6">Pajak</div>
        <div class="col-md-3">{{ $transaksi->pajak }}</div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-3 offset-md-6">Grand Total</div>
        <div class="col-md-3">{{ $transaksi->grandtotal }}</div>
    </div>
    @if ($transaksi->status == 1)
    <div class="row">
        <div class="col-md-3 offset-md-6">Bayar</div>
        <div class="col-md-3">{{ $transaksi->bayar }}</div>
    </div>
    <div class="row">
        <div class="col-md-3 offset-md-6">Kembalian</div>
        <div class="col-md-3">{{ $transaksi->kembali }}</div>
    </div>
    @endif
    
 </div>
 <div class="card-body"> {{ $pengaturan->tfooter }} </div>




