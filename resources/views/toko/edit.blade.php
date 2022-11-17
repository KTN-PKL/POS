      
    <div class="card-header text-white" style="background-color:#0c4e68" >
        <h5> <i class="fa fa-edit"></i> Informasi Toko</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col col-sm-6">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tnama" aria-describedby="basic-addon2" value="{{$toko->tnama}}">
                </div>
                </div>    
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Alamat Toko</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="talamat" aria-describedby="basic-addon2" >{{$toko->talamat}}</textarea>
                </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Telepon Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="thp" aria-describedby="basic-addon2" value="{{$toko->thp}}" >
                </div>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Email Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="temail" aria-describedby="basic-addon2" value="{{$toko->temail}}">
                </div>
                </div>    
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Pemilik Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tpemilik" aria-describedby="basic-addon2" value="{{$toko->tpemilik}}">
                </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Website Toko</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="twebsite" aria-describedby="basic-addon2" value="{{$toko->twebsite}}">
                </div>
                </div>
            </div>
        </div>
    </div>
<div class="card-footer text-muted">
    <button style="background-color:  #0c4e68" type="submit" class="btn btn-md text-white"  onClick="update({{$toko->id_toko}})"><i class="fa fa-save text-white"></i> Save </button>

</div>

<br>
<br>

<script>
     function update(id) {
           var tnama = $("#tnama").val();
           var talamat = $("#talamat").val();
           var thp = $("#thp").val();
           var temail = $("#temail").val();
           var tpemilik = $("#tpemilik").val();
           var twebsite = $("#twebsite").val();
            $.ajax({
                type: "get",
                url: "{{ url('toko/update') }}/" + id,
                data: {
                "tnama": tnama,
                "talamat": talamat,
                "thp": thp,
                "temail": temail,
                "tpemilik": tpemilik,
                "twebsite": twebsite,
                },
            success: function(data, response) {
                edit(),
               notif()
                }
            });
        }
</script>

