<table class="table">
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
            <td><img src="{{asset('/foto/'. $items->foto)}}"  alt="Gambar" width="50px" height="50px"></td>
            <td>
                @php
                     $urutan = (int) substr($items->id_item, 3, 3);
                @endphp
                <button class="btn btn-warning" onClick="show({{ $urutan }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $urutan }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>