<table border="0" cellpadding="5" cellspacing="2" width="100%">
                          
    <tr> 
        <td style="width:30%">
        <label for="FirstName">STATUS</label>
        </td> 
        <td>
            <select type="text" id="#" class="form-select">
              <option selected disabled>-- Status Pembayaran --</option>
              <option value="">z</option>
              <option value="">a</option>
            </select>
        </td> 
    </tr>
    <tr> 
        <td style="width:30%">
        <label for="FirstName">ORDER</label>
        </td> 
        <td>
            <select type="text" id="#" class="form-select">
              <option selected disabled>-- Kategori Order --</option>
              <option value="">z</option>
              <option value="">a</option>
            </select>
        </td> 
    </tr>
    <tr id="total"></tr>
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
                <input type="text" class="form-control" id="discount" aria-describedby="basic-addon2" value="0" onchange="grandtotal()">
               
              </div>
        </td> 
    </tr>
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
                <input type="text" class="form-control" id="pajak" aria-describedby="basic-addon2" value="0" onchange="grandtotal()">
               
              </div>
        </td> 
    </tr>
    <tr id="grandtotal"></tr>
</table>

<script>
     $(document).ready(function() {
           total()
       });
    function total()
    {
        var id = $("#id").val();
        $.get("{{ url('kasir/total') }}/" + id, {}, function(data, status) {
               $("#total").html(data);  
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
                    $("#grandtotal").html(data); 
                }
            });
    }
</script>