<!DOCTYPE html>
<html>
<head>
	<title>reporte automovil</title>
</head>
<body>
	<center>
	@foreach($parkUsu as $p)	
		<h1>{{ $p->parqueadero->nombre }}</h1>
	@endforeach	
	<h1>Reporte automoviles</h1>
	</center>
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #eedf51;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th style="width: 10%">PLACA</th>
                  <th style="width: 20%">MARCA</th>
                  <th style="width: 20%">COLOR</th>
                  <th style="width: 200%">TIPO DE VEHICULO</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($vehiculos as $v)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $v->placa }}</td>
                              <td>{{ $v->marca_vehiculo->nombre }}</td>
                              <td>{{ $v->color }}</td>
                              <td>{{ $v->tipo_vehiculo->nombre }}</td>
                            </tr>
                            @endforeach
                </tbody>
              </table>
            </div>
</body>
</html>