<div class="col-md-12">
    <div class="row">
        @foreach ($item as $items)
        @php
        $urutan = (int) substr($items->id_item, 3, 3);
        @endphp
        <div type="button" onclick="tambahbarang({{ $urutan }})" class="col-md-3">
            <div class="card-header" style="border: 1px solid grey" >
                <img src="{{asset('/foto/'. $items->foto)}}" style="display:block; margin:auto;"  alt="Gambar" width="100px" height="80px">
            </div>
            <div class="card-body" style="border: 1px solid grey">
                <h6 style="text-align: center"> ({{ $items->kategori }}) </h6>
                <h6 style="text-align: center"> {{ $items->item }} </h6>
                <h6 style="text-align: center"> @php
                    echo "Rp.".number_format($items->jual,0,',','.');
                @endphp </h6>
                <h6 style="text-align: center">STOK: <span id="stok">{{ $items->stok }}</span> </h6>
            </div>
        </div>
            
        @endforeach
    </div>

</div>
