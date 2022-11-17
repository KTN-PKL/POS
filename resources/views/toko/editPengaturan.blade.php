<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 8</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div class="card-header text-white" style="background-color:#0c4e68" >
        <h5> <i class="fa fa-edit"></i> Pengaturan Sistem Print dan Kasir</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col col-sm-6">
                <div class="form-group row">
                    <label for="tos" class="col-sm-3 col-form-label">Tipe OS</label>
                <div class="col-sm-9">
                    <input name="operasi" type="text" id="operasi" class="form-control" value="{{$pengaturan->operasi}}">
                </div>
                </div>    
            </div>

        </div>
    </div>
<div class="card-footer">
    <button style="background-color:  #0c4e68" type="submit" class="btn btn-md text-white"><i class="fa fa-save text-white" onClick="updatePengaturan({{ $pengaturan->id_pengaturan }})"></i> Save </button>

</div>
</div>

<script>
 this.datas = new FormData();

          function updatePengaturan(id) {
           var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
           var operasi = $("#operasi").val();
           datas.append('operasi',operasi);
           datas.append('_token',CSRF_TOKEN);
           $.ajax({
                url: "{{ url('toko/updatepengaturan') }}/" + id,
                method: 'post',
                data: datas,
                contentType: false,
                processData: false,
                dataType: 'json',
               success: function(response) 
               {
               if(response.success == 2){ 
                   alert('Success')

               }    
               }
           });
       }

</script>



    

