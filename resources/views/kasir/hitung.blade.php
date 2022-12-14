<table border="0" cellpadding="5" cellspacing="2" width="100%">
                          
    <tr> 
        <td style="width:30%">
        <label for="FirstName">STATUS</label>
        </td> 
        <td>
            <select type="text" id="status" class="form-select" onchange="tampil()">
              <option selected disabled>-- Status Pembayaran --</option>
              <option value="Lunas">Lunas</option>
              <option value="Bayar Nanti">Bayar Nanti</option>
            </select>
            <small style="display: none" class="text-danger" id="erorr2">Status Pembayaran Harus Dipilih!</small>
        </td> 
    </tr>
    <tr> 
        <td style="width:30%">
        <label for="FirstName">ORDER</label>
        </td> 
        <td>
            <select type="text" id="order" class="form-select">
              <option disabled>-- Kategori Order --</option>
              <option value="Ditempat" selected>Ditempat</option>
              <option value="Booking">Booking</option>
              <option value="Delivery">Delivery</option>
            </select>
        </td> 
    </tr>
    <tr>
        <td>
            <label for="FirstName">TOTAL BAYAR</label>
            <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" id="total1" class="form-control" readonly>   
            </div>
        </td> 
    </tr>
    @if ($pengaturan->tdiskonpersen == "enable")
    <tr> 
        <td>
        <label for="FirstName">DISKON</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
               
                <input type="number" id="discountrate" class="form-control" aria-describedby="basic-addon2" value="0" onchange="grandtotal()">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
              </div>
        </td> 
    </tr>
    @endif
    @if ($pengaturan->tpajakpersen == "enable")
    
    <tr> 
        <td>
        <label for="FirstName">PAJAK</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
               
                <input type="number" class="form-control" id="pajakrate" aria-describedby="basic-addon2" value="0" onchange="grandtotal()">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
              </div>
        </td> 
    </tr>
        
    @endif
    @if ($pengaturan->tdiskonrp == "enable")
    <tr> 
        <td>
        <label for="FirstName">DISKON</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" id="discount" aria-describedby="basic-addon2" value="0" onchange="grandtotal()" onkeyup="rupiah(1)">
               
              </div>
        </td> 
    </tr>
        
    @endif
    @if ($pengaturan->tpajakrp == "enable")
    <tr> 
        <td>
        <label for="FirstName">PAJAK</label>
        <small class="text-danger"></small>
        </td> 
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" id="pajak" aria-describedby="basic-addon2" value="0" onchange="grandtotal()" onkeyup="rupiah(2)">
               
              </div>
        </td> 
    </tr>
    @endif
    
    <tr>
        <td>
            <label for="FirstName">GRAND TOTAL</label>
            <small class="text-danger"></small>
            </td> 
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" id="grandtotal1" class="form-control" aria-describedby="basic-addon2" readonly>
                  </div>
            </td> 
    </tr>
</table>
<div id="bayar"></div>


<script>
     $(document).ready(function() {
           total()
       });
    function total()
    {
        var id = $("#id").val();
        $.get("{{ url('kasir/total') }}/" + id, {}, function(data, status) {
               $("#total1").val(data);  
               grandtotal()
        });
    }

    function grandtotal()
    {
        var total = $("#total1").val();
        var discountrate = $("#discountrate").val();
        var pajakrate = $("#pajakrate").val();
        var discount = $("#discount").val();
        var pajak = $("#pajak").val();
        $.ajax({
                type: "get",
                url: "{{ url('kasir/grandtotal') }}",
                data: {
                "total": total,
                "discountrate": discountrate,
                "pajakrate": pajakrate,
                "discount": discount,
                "pajak": pajak,
                },
                success: function(data) {
                    $("#grandtotal1").val(data); 
                    bayar()
                }
            });
    }
    function tampil(){
        var status = $("#status").val();
        if (status == "Lunas") {
            $("#bayar").html(`
        <table border="0" cellpadding="5" cellspacing="2" width="100%">
        <tr> 
            <td style="width:30%">
            <label for="FirstName">Bayar</label>
            <small class="text-danger"></small>
            </td> 
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control" id="bayaru" value="0" aria-describedby="basic-addon2" onkeyup="bayar()">
                   
                  </div>
            </td> 
        </tr>
        <tr> 
            <td>
            <label for="FirstName">Kembalian</label>
            <small class="text-danger"></small>
            </td> 
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control" id="kembalian" aria-describedby="basic-addon2" readonly>
                   
                  </div>
                  <small style="display: none" class="text-danger" id="erorr3">Jumlah Pembayaran Kurang!</small>
            </td> 
        </tr>
        </table>`);
        bayar()
        } else {
            $("#bayar").html("")
        }
        document.getElementById("erorr2").style.display = "none";
        
    }
    function rupiah(id){
        if (id == 1) {
            var discount = $("#discount").val();
            var number_string = discount.replace(/[^,\d]/g, '').toString(),
	        split = number_string.split(','),
	        sisa  = split[0].length % 3,
	        rupiah  = split[0].substr(0, sisa),
	        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
	    	separator = sisa ? '.' : '';
		    rupiah += separator + ribuan.join('.');
	        }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $("#discount").val(rupiah)
        }
        if (id == 2) {
            var pajak = $("#pajak").val();
            var number_string = pajak.replace(/[^,\d]/g, '').toString(),
	        split = number_string.split(','),
	        sisa  = split[0].length % 3,
	        rupiah  = split[0].substr(0, sisa),
	        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
	    	separator = sisa ? '.' : '';
		    rupiah += separator + ribuan.join('.');
	        }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $("#pajak").val(rupiah)
        }
        if (id == 3) {
            var bayaru = $("#bayaru").val();
            var number_string = bayaru.replace(/[^,\d]/g, '').toString(),
	        split = number_string.split(','),
	        sisa  = split[0].length % 3,
	        rupiah  = split[0].substr(0, sisa),
	        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
	    	separator = sisa ? '.' : '';
		    rupiah += separator + ribuan.join('.');
	        }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $("#bayaru").val(rupiah)
        }
    }
    function bayar(){
        var gt = $("#grandtotal1").val();
        var bayar = $("#bayaru").val();

        $.ajax({
                type: "get",
                url: "{{ url('kasir/kembalian') }}",
                data: {
                "gt": gt,
                "bayar": bayar,
                },
                success: function(data) {
                    $("#kembalian").val(data); 
                }
            });
    rupiah(3)
    }
</script>