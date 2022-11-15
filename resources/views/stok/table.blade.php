<table class="table table-bordered table-hover" style="width: 100%">
    <tr>
        <th>No</th>
        <th>Kode Item</th>
        <th>Kategori</th>
        <th>Nama Item</th>
        <th>Stok</th>
        <th>Stok Minimal</th>
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
            <td>{{ $items->stok }}</td>
            <td>{{ $items->minim }}</td>
            <td><img src="{{asset('/foto/'. $items->foto)}}"  alt="Gambar" width="100px" height="100px"></td>
            <td>
                <button class="btn btn-warning" onClick="edit({{ $items->id_stok }})">Tambah</button>
            </td>
        </tr>
    @endforeach
</table>