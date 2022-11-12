<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($kategori as $item)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $item->kategori }}</td>
            <td>
                <button style="background-color: #0c4e68" class="btn text-white" onClick="edit({{ $item->id_kategori }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $item->id_kategori }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>