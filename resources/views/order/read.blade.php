<div class="card">
    <div style="background-color:#0c4e68" class="card-header">
        <h5 class="text-white" ><b>Daftar Order</b></h5>
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
        <th>No Bon</th>
        <th>Atas Nama</th>
        <th>Customer</th>
        <th>Kasir</th>
        <th>Grand Total</th>
        <th>Tanggal</th>
        <th>Jenis Order</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>1</td>
        <td>B0042</td>
        <td>Sulaimana</td>
        <td>Sulaimana</td>
        <td>Kasir Utama</td>
        <td>38000</td>
        <td>2022-10-10</td>
        <td>xx</td>
        <td>xx</td>
        <td><a class="btn btn-primary" href="#"><i class="fa fa-edit" ></i></a> <a class="btn btn-danger" href=""> <i class="fa fa"></a></i></td>
    </tr>
    {{-- @php
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
                <button style="background-color: #0c4e68" class="btn text-white" onClick="show({{ $item->id_kategori }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $item->id_kategori }})">Delete</button>
            </td>
        </tr>
    @endforeach --}}
</table>
</div>
</div>