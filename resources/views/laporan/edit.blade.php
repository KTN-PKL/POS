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
                        <td>
                            @if($transaksi->order == "Ditempat")
                            <span style="color:blue"><i class="fa fa-home"></i> {{$transaksi->order}}</span>
                            @elseif($transaksi->order == "Delivery")
                            <span style="color:green"><i class="fa fa-motorcycle"></i> {{$transaksi->order}}</span>
                            @else
                            <span style="color:rgb(216, 188, 2)"><i class="fa fa-ticket-alt"></i> {{$transaksi->order}}</span>
                            @endif
                        </td>
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
            <div class="table-responsive" style="height:310px">
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
                       <td>{{$item->kategori}}</td>
                       <td>{{$item->item}}</td>
                       <td>{{$item->qty}}</td>
                       <td>{{$item->subtotal}}</td>
                      
                    </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    <table>
                   <tr>
                    <td><b>Total Harga</b></td>
                    <td>
                        @php
                            $total = number_format($transaksi->total,0,",",".");
                            echo ": Rp.".$total.",-";
                        @endphp    
                    </td>
                   </tr>
                   <tr>
                    <td><b>Diskon</b></td>
                    <td>
                        @php
                        $d = ($transaksi->discountrate / 100) * $transaksi->total;
                        $di = number_format($d,0,",",".");
                        @endphp 
                        : {{$transaksi->discountrate}}% / Rp. {{$di}}
                       
                    </td>
                   </tr>
                   <tr>
                    <td><b>Pajak</b></td>
                    <td>
                        @php
                        $d = ($transaksi->pajakrate / 100) * $transaksi->total;
                        $di = number_format($d,0,",",".");
                        @endphp 
                        : {{$transaksi->pajakrate}}% / Rp. {{$di}}
                       
                    </td>
                   </tr>
                   <tr>
                    <td><b>Diskon</b></td>
                    <td>
                       : Rp. {{$transaksi->discount}}
                    </td>
                   </tr>
                   <tr>
                    <td><b>Pajak</b></td>
                    <td>
                        : Rp. {{$transaksi->pajak}}
                    </td>
                   </tr>
                   <tr>
                    <td><b>Grand Total</b></td>
                    <td>
                        @php
                            $grandtotal = number_format($transaksi->grandtotal,0,",",".");
                            echo ": Rp.".$grandtotal.",-";
                        @endphp  
                    </td>
                   </tr>
                   <tr>
                    <td><b>Dibayar</b></td>
                    <td>
                        @if ($transaksi->bayar<>null)
                        : Rp.{{$transaksi->bayar}}
                        @else
                        : Rp.0
                        @endif
                    </td>
                   </tr>
                   <tr>
                    <td><b>Kembali</b></td>
                    <td>
                        @if ($transaksi->kembali<>null)
                        : Rp.{{$transaksi->kembali}}
                        @else
                        : Rp.0
                        @endif
                    </td>
                   </tr>
                </table>
                </div>
            </div>

        </div>
    </div>
</div>
