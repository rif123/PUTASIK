@extends('layouts.index')
@section('content')
   
  <table  id="myTable">
    <thead>
      
    <tr>
      <th>no</th>
      <th>alamat</th>
      <th>email</th>
    </tr>
    </thead>
    <tbody>
      
    <tr>
      <td>1</td>
      <td>jurang </td>
      <td>email</td>
    </tr>
    <tr>
      <td>2</td>
      <td>sukajdi </td>
      <td>sasasa</td>
    </tr>
    </tbody>
  </table>

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#myTable').DataTable({
       "bPaginate": true,
       searching: false
    });
  });
</script>
@endsection
        
@stop