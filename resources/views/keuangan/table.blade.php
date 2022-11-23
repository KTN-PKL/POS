<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Akun</th>
        <th>Jenis</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($akuntansi as $item)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $item->akun }}</td>
            <td>{{ $item->jenis }}</td>
            <td>
                <button style="background-color: #0c4e68" class="btn text-white" onClick="edit({{ $item->id_akun }})">Edit</button>
                <button class="btn btn-danger" onClick="hapus({{ $item->id_akun }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>