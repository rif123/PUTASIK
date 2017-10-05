@if (!empty (\Session::get('insertKotaSuccess')))
<script type="text/javascript">
	swal(
  'Good job!',
  '{{\Session::get('insertKotaSuccess')}}',
  'success'
)
</script>
@endif

@if (!empty (\Session::get('insertKotaError')))
<script type="text/javascript">
	swal(
  'Oops...',
  '{{\Session::get('insertKotaError')}}',
  'error'
)
</script>
@endif


@if (!empty (\Session::get('insertDistrictsSuccess')))
<script type="text/javascript">
	swal(
  'Good job!',
  '{{\Session::get('insertDistrictsSuccess')}}',
  'success'
)
</script>
@endif

@if (!empty (\Session::get('insertDistrictsError')))
<script type="text/javascript">
	swal(
  'Oops...',
  '{{\Session::get('insertDistrictsError')}}',
  'error'
)
</script>
@endif

@if (!empty (\Session::get('insertSuccess')))
<script type="text/javascript">
  swal(
  'Good job!',
  '{{\Session::get('insertSuccess')}}',
  'success'
)
</script>
@endif

@if (!empty (\Session::get('insertError')))
<script type="text/javascript">
  swal(
  'Oops...',
  '{{\Session::get('insertError')}}',
  'error'
)
</script>
@endif
