<table class="table table-striped" width="100%" id="barang">
<tr>
    <th style="width:25%">Nama</th>
    <th style="width:20%">Qty</th>
    <th style="width:20%">Harga</th>
    <th style="width:5%">#</th>
    </tr>
    @foreach ($keranjang as $item)
        <tr>
        <td>{{ $item->item }}</td>
        @php
        $urutan = (int) substr($item->id_item, 3, 3);
        @endphp
        <td><input class="col-md-12" type="number" value="{{ $item->qty }}" id="qty" onchange="ubah({{ $urutan }})"></td>
        <td>{{ "Rp.".number_format($item->subtotal,0,',','.') }}</td>
        <td><button class="btn btn-danger btn-sm" onClick=""> <i class="fa fa-times"></i></button></td>
        </tr>
    @endforeach
</table>