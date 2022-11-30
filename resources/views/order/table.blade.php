<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>No Bon</th>
        <th>Atas Nama</th>
        <th>Customer</th>
        <th>Kasir</th>
        <th>Grandtotal</th>
        <th>Status</th>
        <th>Order</th>
        <th>Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($transaksi as $item)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $item->id_transaksi }}</td>
            <td>{{ $item->atasnama }}</td>
            <td>{{ $item->id_customer }}</td>
            <td>kosong</td>
            <td>
                <button style="background-color: #0c4e68" class="btn text-white btn-sm" onClick="edit({{ $item->id_transaksi }})">Edit</button>
                <button class="btn btn-danger btn-sm" onClick="hapus({{ $item->id_transaksi }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>