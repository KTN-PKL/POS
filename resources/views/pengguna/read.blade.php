<div class="card" style="width: 1100px">
    <div style="background-color:#0c4e68" class="card-header">
        <h5 class="text-white" ><i class="fa fa-user" ></i> <b>Daftar Pengguna</b></h5>
    </div>
    <div class="card-body">
        <div class="input-group col-md-4 offset-8">
            <input  type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />     
            <button type="button" class="btn btn-outline-primary">Search</button>
          </div>
          <br>
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
</div>
</div>