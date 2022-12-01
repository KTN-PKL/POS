<table class="table table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>No Bon</th>
        <th>Atas Nama</th>
        <th>Customer</th>
        <th>Kasir</th>
        <th>Grandtotal</th>
        <th>Tanggal</th>
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
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kasir }}</td>
            <td>@php
                $grandtotal = number_format($item->grandtotal,0,",",".");
                echo "Rp.".$grandtotal.",-";
                $d = strtotime($item->waktut);
            @endphp</td>
            <td>{{ date("d-m-Y", $d) }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->order }}</td>
            <td>
                @php
                $kode = $item->id_transaksi;
                $urutan = (int) substr($kode, 3, 3);
            @endphp
                <span class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></span>
                @if ($item->status == "Bayar Nanti")
                <span class="btn btn-outline-success btn-sm" onclick="edit({{ $urutan }})"><i class="fa fa-money"></i></span>
                @endif
                <span class="btn btn-outline-danger btn-sm" onclick="hapus({{ $urutan }})"><i class="fa fa-trash"></i></span>
            </td>
        </tr>
    @endforeach
</table>