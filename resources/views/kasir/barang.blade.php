<table class="table table-striped" width="100%" id="barang">
<tr>
    <th style="width:25%">Nama</th>
    <th style="width:15%">Qty</th>
    <th style="width:20%">Harga</th>
    <th style="width:5%">#</th>
    </tr>
    @foreach ($keranjang as $item)
        <tr>
        <td>{{ $item->item }}</td>
        <td><input class="col-md-12" type="number"></td>
        <td>Rp100.000,-</td>
        <td><button class="btn btn-danger btn-sm" onClick=""> <i class="fa fa-times"></i></button></td>
        </tr>
    @endforeach
</table>