<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th style="width: 200px" >Nama</th>
        <th>Username</th>
        <th>Telepon</th>
        <th style="width:250px" >Alamat</th>
        <th style="width:120px" >Pas Foto</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($pengguna as $items)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $items->name }}</td>
            <td>{{ $items->username }}</td>
            <td>{{ $items->telepon}}</td>
            <td>{{ $items->alamatuser }}</td>
            <td><img src="{{asset('/fotouser/'. $items->foto)}}"  alt="Gambar" width="100px" height="100px"></td>
            <td>
                <button class="btn btn-warning" onClick="edit({{ $items->id }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $items->id }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>