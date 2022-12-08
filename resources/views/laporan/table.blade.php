<table class="table table-bordered table-hover">
  <thead>
    <tr>
        <th>No</th>
        <th>No BON</th>
        <th>Atas Nama</th>
        <th>Customer</th>
        <th>Kasir</th>
        <th>Tanggal</th>
        <th>Jenis Order</th>
        <th>Status</th>
        <th>Grand Total</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i = 0;
    @endphp
    @foreach ($transaksi as $laporan)
        <tr>
            <td>@php
                $i = $i+1;
                echo $i;
            @endphp</td>
            <td>{{ $laporan->id_transaksi }}</td>
            <td>{{ $laporan->atasnama }}</td>
            <td>{{$laporan->atasnama}}</td>
            <td>{{$laporan->kasir}}</td>
           
            <td>
                @php
                $waktu = strtotime($laporan->waktut);
                @endphp
                {{ date("d-m-Y", $waktu) }}</td>
            <td>
                @if($laporan->order == "Ditempat")
                <span class="badge badge-primary"><i class="fa fa-home"></i> {{$laporan->order}}</span>
                @elseif($laporan->order == "Booking")
                <span class="badge badge-warning"><i class="fa fa-ticket-alt"></i> {{$laporan->order}}</span>
                @else
                <span class="badge badge-success"><i class="fa fa-motorcycle"></i> {{$laporan->order}}</span>
                @endif
            </td>
            <td>
                @if($laporan->status == "Lunas")
                <span class="badge badge-success"><i class="fa fa-check"></i> {{$laporan->status}}</span>
                @else
                <span class="badge badge-danger"><i class="fa fa-info-circle"></i> {{$laporan->status}}</span>  
                @endif
            </td>
            <td>
            @php
            $grandtotal = number_format($laporan->grandtotal,0,",",".");
                echo "Rp.".$grandtotal.",-";
            @endphp    
            </td>
            <td>
                @php
                     $urutan = (int) substr($laporan->id_transaksi, 3, 3);
                @endphp
                <a onClick="edit({{ $urutan }})" class="btn btn-outline-primary"><i class="fa fa-eye" ></i></a>
            </td>
        </tr>
    
    @endforeach
</tbody>
    <tfoot>
        <th colspan="8" rowspan="1">Total</th>
        <th>
            @php
            $grandtotal = number_format($total,0,",",".");
                echo "Rp.".$grandtotal.",-";
            @endphp    
        </th>
    </tfoot>

  
</table>
<nav aria-label="Page">
    <ul class="pagination justify-content-end">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>