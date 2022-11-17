@extends('layout.template')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 8</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron p-5 rounded-3" style="background-color: rgb(240, 240, 240)">
        <div class="row">
             <div  class="col-sm-12" style="background-color: rgb(240, 240, 240)  ;box-shadow:none; border:none;" >
                {{-- Page Edit --}}
                <div class="card card-rounded ">  
                    <div class="card-header text-white" style="background-color:#0c4e68" >
                        <h5> <i class="fa fa-edit"></i> Pengaturan Sistem Print dan Kasir</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                
                            <div class="col col-sm-6">
                                <div class="form-group row">
                                    <label for="tos" class="col-sm-3 col-form-label">Tipe OS</label>
                                <div class="col-sm-9">
                                    <input name="tos" type="text" id="tos" class="form-control" value="{{$pengaturan->tos}}">
                                    {{-- <select type="text" class="form-control" id="tos">
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Windows">Windows</option>
                                        <option value="Linux">Linux</option>
                                        <option value="MacOS">Mac OS</option>
                                    </select> --}}
                                </div>
                                </div>    
                                {{-- <div class="form-group row">
                                    <label  for="" class="col-sm-3 col-form-label">Ukuran Default</label>
                                <div class="col-sm-9">
                                    <select name="tprintukuran" type="text" class="form-select" id="tprintukuran">
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="58mm">58mm</option>
                                        <option value="80mm">80mm</option>
                                        <option value="a4">A4</option>
                                    </select>
                                </div>
                                </div> --}}
                            </div>
                            {{-- <div class="col col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Model Print</label>
                                <div class="col-sm-9">
                                    <select name="tprintmodel" type="text" class="form-select" id="tprintmodel">
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="browser">Print With Browser</option>
                                    </select>
                                </div>
                                </div>    
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input name="tgambar" type="file" onchange="editgambar()" class="form-control" id="tgambar">
                                </div>
                                </div>
                            </div> --}}
                          
                            {{-- <div class="col col-sm-12">
                                <h4>Pengaturan Kasir</h4>
                            </div>
                           
                            <div class="col col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Struk Footer</label>
                                <div class="col-sm-9">
                                    <textarea name="tfooter" type="text" class="form-control" id="tfooter"></textarea>
                                </div>
                                </div>    
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Diskon (%) </label>
                                        <div class="col-sm-9">
                                            <select name="tdiskonpersen" type="text" class="form-select" id="tdiskonpersen">
                                                <option  disabled>-- Pilih --</option>
                                                <option selected  value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                            </select>    
                                        </div>
                                </div>  
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Pajak (%) </label>
                                        <div class="col-sm-9">
                                            <select name="tpajakpersen" type="text" class="form-select" id="tpajakpersen">
                                                <option selected disabled>-- Pilih --</option>
                                                <option selected  value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                            </select>    
                                        </div>
                                </div>  
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Diskon (Rp) </label>
                                        <div class="col-sm-9">
                                            <select name="tdiskonrp" type="text" class="form-select" id="tdiskonrp">
                                                <option disabled>-- Pilih --</option>
                                                <option  selected value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                            </select>    
                                        </div>
                                </div>  
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Pajak (Rp) </label>
                                        <div class="col-sm-9">
                                            <select name="tpajakrp" type="text" class="form-select" id="tpajakrp">
                                                <option disabled>-- Pilih --</option>
                                                <option  selected value="enable">Enable</option>
                                                <option value="disable">Disable</option>
                                            </select>    
                                        </div>
                                </div>  
                            </div> --}}
                
                        </div>
                    </div>
                <div class="card-footer text-muted">
                    <button style="background-color:  #0c4e68" type="submit" class="btn btn-md text-white"><i class="fa fa-save text-white" onClick="updatePengaturan({{ $pengaturan->id_pengaturan }})"></i> Save </button>
                
                </div>
                </div>
                    

                </div>
                  
            </div>
        </div>  
    </div>



@endsection


{{-- <script>
  function updatePengaturan(id) {
           var tos = $("#tos").val();
         
            $.ajax({
                type: "get",
                url: "{{ url('toko/updatepengaturan') }}/" + id,
                data: {
                "tos": tos,
                },
            success: function(data, response) {
             alert('s')
                }
            });
        }

</script> --}}



    

