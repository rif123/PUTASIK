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
                    <h2>User Admin<small>pekerjaan umun kota tasik</small></h2>
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
                  
                    @if(empty(@accept))
                    <form class="form-horizontal form-label-left input_mask" action="{{ url(route('saveUserAdm')) }}" method="POST">
                    @else 
                    <form class="form-horizontal form-label-left input_mask" action="{{ url(route('updateAdm')) }}" method="POST">
                    @endif
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="email" class="form-control" placeholder="Email" name="email" value="{{!empty($accept[0]['email']) ? $accept[0]['email'] : '' }}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" class="form-control" placeholder="Password" name="password" value="{{!empty($accept[0]['password']) ? $accept[0]['password'] : '' }}">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          {{ csrf_field() }}
                          @if(empty($accept))
                            <button type="submit" class="btn btn-success">Simpan</button>
                          @else
                            <input type="hidden" name="id" value="{{ $accept[0]['id_user'] }}">
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
             <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Admin<small>data perkerjaan umum</small></h2>
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
                          <th>Email</th>
                          <th>Password</th>
                          <th>Edit</th>
                          <th>Delet</th>
                        </tr>
                      </thead>
                        <?php $i = 1; ?>
                          <tbody>
                          @foreach($listData as $key => $val)
                            <tr>
                              <th>{{ $i }}</th>
                              <td>{{ $val['email'] }}</td>
                              <td><?php echo "*****"; ?></td>
                              <td><a href="{{ url('/admin/edit-adm').'?id='.$val['id_user'] }}">Edit</a></td>
                              <td><a href="{{ url('/admin/delete-adm').'?id='.$val['id_user'] }}">Delet</a></td>
                            </tr>
                          </tbody>
                          <?php $i++; ?>
                          @endforeach
                    </table>

                  </div>
                </div>
             </div>
              <!-- end data table -->

            </div>
          </div>
        </div>
        
        

@stop