<div class="card" style="width: 1100px">
    <div style="background-color:#0c4e68" class="card-header">
        <h5 class="text-white" > <i class="fa fa-users"></i> <b>Daftar Customer</b></h5>
    </div>
    <div class="card-body">
        <div class="input-group col-md-4 offset-8">
            <input  type="search" class="form-control input-sm" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />     
            <button type="button" class="btn btn-outline-primary">Search</button>
          </div>
          <br>
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Kode Customer</th>
        <th>Nama Customer</th>
        <th>No HP/WA</th>
        <th style="width: 250px" >Alamat</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($customer as $items)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $items->id_customer }}</td>
            <td>{{ $items->nama }}</td>
            <td>{{ $items->kontak }}</td>
            <td>{{ $items->alamat }}</td>
            <td>
                @php
                     $urutan = (int) substr($items->id_customer, 3, 3);
                @endphp
                <button style="background-color: #0c4e68" class="btn text-white" onClick="show({{ $urutan }})">Detail</button>
                <button class="btn btn-warning" onClick="edit({{ $urutan }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $urutan }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
</div>
</div>