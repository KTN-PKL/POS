<table class="table">
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
                <button class="btn btn-warning" onClick="show({{ $item->id_kategori }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $item->id_kategori }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
