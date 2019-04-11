@if ($success=Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Atención!</strong>{{ $success }}
    </div>
@endif
@if ($warning=Session::get('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Atención!</strong>{{ $warning }}
    </div>
@endif
@if ($danger=Session::get('danger'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Atención!</strong>{{ $danger }}
  </div>
@endif