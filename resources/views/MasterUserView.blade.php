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
              
              <!-- form Jenis -->
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Type User <small>pekerjaan umun kota tasik</small></h2>
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
                  

                  <!-- barang -->
                  @if(empty($accept))
                    <form class="form-horizontal form-label-left input_mask" action="{{ url(route('saveUser')) }}" method="POST">
                  @else
                    <form class="form-horizontal form-label-left input_mask" action="{{ url(route('updateUser')) }}" method="POST">

                  @endif
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type User</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="" name="user" value="{{ !empty($accept[0]['name_type']) ? $accept[0]['name_type'] : '' }}">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          {{ csrf_field() }}
                          @if(empty($accept))
                            <button type="submit" class="btn btn-success">Simpan</button>
                          @else
                            <input type="hidden" name="id_user" value="{{ $accept[0]['id_type_user'] }}">
                            <button type="submit" class="btn btn-success">Update</button>
                          @endif
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end form barang -->

             

              <!-- Show Data table-->
             <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Data Type User  <small>data perkerjaan umum</small></h2>
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

                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name Type User</th>
                          <th>Edit</th>
                          <th>Delet</th>
                        </tr>
                      </thead>
                        <?php $no = 1; ?>
                          <tbody>
                          @foreach($listData as $key => $val)
                            <tr>
                              <th>{{ $no }}</th>
                              <td>{{ $val['name_type'] }}</td>
                              <td><a href="{{ url(route('editUser').'?id='.$val['id_type_user']) }}">Edit</a></td>
                              <td><a href="#" onclick="deletProcess({{$val['id_type_user']}})">Delet</a></td>
                            </tr>
                          <?php $no++; ?>
                          @endforeach
                          </tbody>
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

      var  urlDelete = "{{url('/admin/delete-user')}}";
      
      function deletProcess(id_type_user){
        swal({
        title: "Apakah anda yakin ?",
        text: "Anda akan menghapus data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete ",
        closeOnConfirm: true,
       }, function (){
          window.location.href = urlDelete+'/'+id_type_user;
       });
   }

  </script>
@endsection    
        

@stop