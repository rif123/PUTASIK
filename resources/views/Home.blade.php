@extends('layouts.index')
@section('content')
   
        <!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              
              <!-- form Kota -->
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Kota <small>pekerjaan umun kota tasik</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                  

                  @if(empty($acceptData))  
                    <form class="form-horizontal form-label-left input_mask" action="{{ url(route('inputCityProcees')) }}" method="POST">
                  @else
                    <form class="form-horizontal form-label-left input_mask" action="{{ url(route('updateHome')) }}" method="POST">
                  @endif 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kota</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Nama Kota" name="name_kota" value="{{ !empty($acceptData[0]['name_city']) ? $acceptData[0]['name_city'] : '' }}">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          {{ csrf_field() }}
                          @if(empty($acceptData))
                            <button type="submit" class="btn btn-success">Simpan</button>
                          @else
                            <input type="hidden" name="id_namaKota" value="{{ $acceptData[0]['id_city'] }}">
                            <button type="submit" class="btn btn-success">Update</button>
                          @endif
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end form kota -->

              <!-- Show Data table-->
             <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Nama Kota <small>data perkerjaan umum</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table" id="myTable">
                      <thead> 
                        <tr>
                          <th>No</th>
                          <th>Nama Kota</th>
                          <th>Edit</th>
                          <th>Delet</th>
                        </tr>
                      </thead>
                        
                    </table>

                  </div>
                </div>
             </div>
              <!-- end data table -->

            </div>
          </div>
        </div>
@section('js')
  <script>

      var  urlDelete = "{{url('/admin/deleteCity')}}";
      var  urlAjaxTable = "{{url(route('city.indexAjax'))}}";
      var  urlEdit = "{{url('/admin/editCity')}}";
      
      function deletProcess(id_city){
        swal({
        title: "Apakah anda yakin ?",
        text: "Anda akan menghapus data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete ",
        closeOnConfirm: true,
       }, function (){
          window.location.href = urlDelete+'/'+id_city;
       });
   }


  $(document).ready(function(){
    $('#myTable').DataTable({
       "processing": false,
        "bFilter": false,
        "bInfo": false,
        "bLengthChange": false,
        "serverSide": true,
      "ajax" :{
          "url": urlAjaxTable,
             "type": "GET"
      },
       "columns" :[
          {"data" :"no"},
          {"data" :"name_city"},
          { "render": function (data, type, row, meta) {

                        var edit = $('<a><button>')
                                    .attr('class', "btn bg-blue-grey waves-effect edit-menu")
                                    .attr('href',urlEdit+'/'+row.id_city)
                                    .text('Edit')
                                    .wrap('<div></div>')
                                    .parent()
                                    .html();

                        return edit ;
                     }
            },
             { "render": function (data, type, row, meta) {

                        var del = $('<a><button>')
                                    .attr('class', "btn bg-blue-grey waves-effect edit-menu")
                                    .attr('onclick', "deletProcess('"+row.id_city+"')")
                                    .text('delete')
                                    .wrap('<div></div>')
                                    .parent()
                                    .html();


                        return del ;
                     }
            },

       ]

       
      });
   });

  </script>
@endsection    
    

@stop