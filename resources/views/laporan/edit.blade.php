<div class="p2">
    <div class="row">
        <div class="col-md-4">
            <h6><b>Detail Order</b></h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>        
                        <td>No BON</td>
                        <td>{{$transaksi->id_transaksi}}</td>
                    </tr>
                    <tr>        
                        <td>Customer</td>
                        <td>{{$transaksi->atasnama}}</td>
                    </tr>
                    <tr>        
                        <td>Atas Nama</td>
                        <td>{{$transaksi->atasnama}}</td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran</td>
                        <td>
                            @if($transaksi->status == "Lunas")
                            <span style="color: green"><i class="fa fa-check"></i> {{$transaksi->status}}</span>
                        @else
                            <span style="color: red"><i class="fa fa-info-circle"></i> {{$transaksi->status}}</span>
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Order</td>
                        <td><span style="color: green"><i class="fa fa-check"></i> {{$transaksi->order}}</span></td>
                    </tr>
                    <tr>
                        <td>Tanggal dan Waktu</td>
                        <td>{{$transaksi->waktut}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col col-md-8">
            <h6><b>Detail List Item</b></h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <th>No</th>
                    <th>Kode Menu</th>
                    <th>Kategori</th>
                    <th>Nama Item</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($keranjang as $item)
                    <tr>
                        <td>
                            @php
                             $i = $i+1;
                            echo $i;
                            @endphp
                        </td>
                       <td>{{$item->id_item}}</td>
                       <td>{{$item->id_kategori}}</td>
                       <td>{{$item->item}}</td>
                       <td>{{$item->qty}}</td>
                       <td>{{$item->subtotal}}</td>
                      
                    </tr>
                    @endforeach
                </table>

            </div>

        </div>
    </div>
</div>
