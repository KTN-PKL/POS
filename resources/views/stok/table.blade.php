<table class="table table-bordered table-hover" style="width: 100%">
    <tr>
        <th>No</th>
        <th>Kode Menu</th>
        <th>Kategori</th>
        <th>Nama Item</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Gambar</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($stok as $items)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $items->id_item }}</td>
            <td>{{ $items->kategori }}</td>
            <td>{{ $items->item }}</td>
            <td>{{ $items->beli }}</td>
            <td>{{ $items->jual }}</td>
            <td><img src="{{asset('/foto/'. $items->foto)}}"  alt="Gambar" width="100px" height="100px"></td>
            <td>
                <button class="btn btn-warning" onClick="edit({{ $items->id_stok }})">Tambah</button>
            </td>
        </tr>
    @endforeach
</table>