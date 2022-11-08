<div class="card" style="width: 1000px">
<table class="table table-bordered table-hover">
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
    @foreach ($item as $items)
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
                @php
                     $urutan = (int) substr($items->id_item, 3, 3);
                @endphp
                <button class="btn btn-primary" onClick="show({{ $urutan }})">Detail</button>
                <button class="btn btn-warning" onClick="edit({{ $urutan }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $urutan }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
</div>