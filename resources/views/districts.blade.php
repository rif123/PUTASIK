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

                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ url(route('saveDistricts')) }}">
                  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Districts <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="districts" placeholder="Input your districts ..." required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kota<span class="required"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="selectName">
                              <option>Nama Kota</option>
                            @foreach($showData as $key => $val)
                              <option value="{{ $val['id_city'] }}">{{ $val['name_city'] }}</option>
                            @endforeach
                            </select>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        {{ csrf_field() }}
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Simpan</button>
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
                        </tr>
                      </thead>

                      <tbody>
                          @foreach($showData as $key => $val)
                        <tr>
                          <td>
                            <th><input type="checkbox" id="check-all" class="flat"></th>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                          @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        
        

@stop