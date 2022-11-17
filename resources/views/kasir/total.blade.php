<td>
    <label for="FirstName">TOTAL BAYAR</label>
    <small class="text-danger"></small>
</td> 
<td>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
        </div>
            @php
                $isi = number_format($total,0,",",".");
            @endphp
        <input type="text" id="total1" class="form-control" value="{{ $isi }}" readonly>   
    </div>
</td> 
