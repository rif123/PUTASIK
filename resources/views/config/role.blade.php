
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
                    <h2>Jenis Barang <small>pekerjaan umun kota tasik</small></h2>
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

            <form id="form-menu-role" action="{{url(route('config.roleSave'))}}" method="post" enctype="multipart/form-data">
        <div class="row clearfix">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="body">
                    <!-- Vertical Layout -->
                       <div class="row clearfix">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                   <label for="email_address">User Group</label>
                                   <div class="form-group">
                                       <div class="form-line">
                                           <select class="form-control change"  id ="mySelect"  name="group_name">
                                               <option value=""> ----- </option>
                                               @foreach($listGroup as $key => $val)
                                                    <option value="{{$val->id_jabatan}}">{{$val->name_jabatan}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   <br>
                                   <button type="submit" class="btn btn-primary waves-effect btn-save-role">SAVE</button>
                           </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 listView"></div>      
                       </div>

                </div>
            </div> <!-- enf form -->
     </div>
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
  </div>
    <style>
        h2.group-title{
            margin-left:15px
        }
        [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
            position: relative !important;
            left: 0px !important;
            opacity: 1 !important;
        }
    </style>
</section>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

@section('js')


<script>
    var urlEditMenuSelected = "{{url(route('config.reloadMenu'))}}";
    
   $(".change").change(function(){
    var id = $(this).val();

    $.ajax({
       type : "GET",
       dataType :"json",
       url :urlEditMenuSelected,  
       data :{'id' :id},
       success : function(retval){
        $(".listView").html(retval.html);
        /*console.log(retval.html);*/
       }
    });
     
   }); 
</script>
@endsection
@stop

