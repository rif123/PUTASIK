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
              
              <!-- form Districts -->
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Districts </h2>
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
                      @if (!empty ($editData[0]['id_districts']))
                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ url(route('updateDistricts')) }}">
                      @else
                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ url(route('saveDistricts')) }}">
                      @endif
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Districts <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="districts" placeholder="Input your districts ..." required="required" type="text" value="{{! empty ($editData[0]['name_districts']) ? $editData[0]['name_districts'] : ''}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kota<span class="required"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="selectName">
                              <option>Nama Kota</option>
                            @foreach($showData as $key => $val)
                              <?php 
                              $selected = "";
                               ?>
                                @if (!empty ($editData[0]['id_city']))
                                      @if ($editData[0]['id_city'] == $val['id_city'])
                                          <?php 
                                          $selected = "selected";
                                           ?>
                                      @endif
                                  @endif
                              <option value="{{ $val['id_city'] }}" {{$selected}}>{{ $val['name_city'] }}</option>
                            @endforeach
                            </select>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        {{ csrf_field() }}
                        <div class="col-md-6 col-md-offset-3">
                           @if (!empty ($editData[0]['id_districts']))
                          <button id="send" type="submit" class="btn btn-success">Update</button>
                          <input type="hidden" name="id_districts" value="{{$editData[0]['id_districts']}}">
                          @else
                            <button id="send" type="submit" class="btn btn-success">Simpan</button>
                          @endif

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end form Districts -->

              <!-- table -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Data</small></h2>
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
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
                             <th><input type="checkbox" id="check-all" class="flat"></th>
                          </th>
                          <th>Nomer</th>
                          <th>Nama District</th>
                          <th>Nama Kota</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1;
                      
                         ?>
                          @foreach($allData as $key => $val)
                        <tr>
                          <td>
                            <th><input type="checkbox" id="check-all" class="flat"></th>
                          </td>
                          <td>{{$i}}</td>
                          <td>{{$val->name_districts}}</td>
                          <td>{{$val->name_city}}</td>
                          <td><a href="{{url('admin/districts/edit').'?id='. $val->id_districts}}">Edit</a> || <a href="#" onclick="deletProcess({{$val->id_districts}})" >Delete</a></td>
                        </tr>
                        <?php $i++; ?>
                          @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
@section('js')
  <script>

      var  urlDelete = "{{url('/admin/districts/delete')}}";

      function deletProcess(id_districts){
        swal({
        title: "Apakah anda yakin ?",
        text: "Anda akan menghapus data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete ",
        closeOnConfirm: true,
       }, function (){
          window.location.href = urlDelete+'/'+id_districts;
       });
   }
  </script>
@endsection    

@stop