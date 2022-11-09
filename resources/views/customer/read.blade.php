<div class="card" style="width: 1000px">
<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Kode Customer</th>
        <th>Nama Customer</th>
        <th>No HP/WA</th>
        <th>Alamat</th>
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
                <button class="btn btn-primary" onClick="show({{ $urutan }})">Detail</button>
                <button class="btn btn-warning" onClick="edit({{ $urutan }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $urutan }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
</div>