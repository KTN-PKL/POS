<div class="card">
    <div style="background-color:#0c4e68" class="card-header">
        <h5 class="text-white" ><b>Daftar Kategori<b></h5>
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
</div>
</div>