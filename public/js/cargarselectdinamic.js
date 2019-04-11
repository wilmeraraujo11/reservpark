$(function(){
	$('#select-park').on('change', onSelectPisoChange);
});

function onSelectPisoChange(){
	var park_id = $(this).val();
	if(! park_id){
		$('#select-piso').html('<option value="">--Pisos deshabilitados--</option>');
		return;
	}	
	$.get('/api/parqueaderos/'+park_id+'/pisos', function (data){
		var html_select = '<option value="">--Seleccione piso--</option>'
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
			$('#select-piso').html(html_select);
	});
}
//cargar usuario segun el rol
$(function(){
	$('#select-rol').on('change', onSelectUsuByRolChange);
});

function onSelectUsuByRolChange(){
	var rol_id = $(this).val();
	if(! rol_id){
		$('#select-usu').html('<option value="">--Usuarios deshabilitados--</option>');
		return;
	}	
	$.get('/api/roles/'+rol_id+'/roles', function (data){
		var html_select = '<option value="">--Seleccione usuario--</option>'
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].name+' '+data[i].ape+'</option>'
			$('#select-usu').html(html_select);
	});
}
//cargar cupos segun el piso
$(function(){
	$('#select-piso').on('change', onSelectCupoChange);
});

function onSelectCupoChange(){
	var cupo_id = $(this).val();
	if(! cupo_id){
		$('#select-cupo').html('<option value="">--Cupos deshabilitados--</option>');
		return;
	}	
	$.get('/api/cupos/'+cupo_id+'/cupos', function (data){
		var html_select = '<option value="">--Seleccione cupo--</option>'
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
			$('#select-cupo').html(html_select);
	});
}
//cargar parqueaderos segun el id del tipo de parqueaderos
$(function(){
	$('#select-tipo-park').on('change', onSelectParkChange);
});

function onSelectParkChange(){
	var id_tipo_park = $(this).val();
	if(! id_tipo_park){
		$('#select-park').html('<option value="">--Parqueaderos deshabilitados--</option>');
		$('#select-valor').html('<option value="">--Valor tarifa deshabilitado--</option>');
		$('#select-valor-adicional').html('<option value="">--Valor adicional tarifa deshabilitado--</option>');
		return;
	}	
	$('#select-valor').html('<option value="">--Valor tarifa deshabilitado--</option>');
	$('#select-valor-adicional').html('<option value="">--Valor adicional tarifa deshabilitado--</option>');
	$.get('/api/park/'+id_tipo_park+'/byidtipopark', function (data){
		var html_select = '<option value="">--Seleccione parqueadero --</option>'
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
			$('#select-park').html(html_select);
	});
}
//cargar valor de la tarifa y valor adicional de la tarifa segun el parqueadero seleccionado
$(function(){
	$('#select-park').on('change', onSelectTarifaChange);
});

function onSelectTarifaChange(){
	var id_park = $(this).val();
	if(! id_park){
		$('#select-valor').html('<option value="">--Valor tarifa deshabilitado--</option>');
		$('#select-valor-adicional').html('<option value="">--Valor adicional tarifa deshabilitado--</option>');
		return;
	}	
	$.get('/api/vr_tarifa/'+id_park+'/tipo_park', function (data){
		var html_select = '<option value="">--Seleccione valor tarifa --</option>'
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].vr_tarifa+'</option>'
			$('#select-valor').html(html_select);
	});
	$.get('/api/vr_adicional_tarifa/'+id_park+'/tipo_park', function (data){
		var html_select = '<option value="">--Seleccione valor adicional tarifa --</option>'
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].vr_adicional+'</option>'
			$('#select-valor-adicional').html(html_select);
	});
}

/*
$(function(){
	$('#select-rol-edit').on('change', onSelectUsuByRolChangeEdit);
});

function onSelectUsuByRolChangeEdit(){
	var rol_edit_id = $(this).val();
	if(! rol_edit_id){
		$('#select-usu-edit').html('<option value="">--Usuarios deshabilitados--</option>');
		return;
	}	
	$.get('/api/roles/'+rol_edit_id+'/roles', function (data){
		var html_edit_select = '<option value="">--Seleccione usuario--</option>'
		for (var i=0; i<data.length; ++i)
			html_edit_select += '<option value="'+data[i].id+'">'+data[i].name+' '+data[i].ape+'</option>'
			$('#select-usu-edit').html(html_edit_select);
	});
}
*/
$('body').on('change','.select-rol-edit', function(event){
      //para evitar que pase al formulario 
	var rol_edit_id = $(this).val();
	if(! rol_edit_id){
		$('#select-usu-edit').html('<option value="">--Seleccione usuario--</option>');
		return;
	}	
	$.get('/api/roles/'+rol_edit_id+'/roles', function (data){
		var html_edit_select = '<option value="">--Seleccione usuario--</option>'
		for (var i=0; i<data.length; ++i)
			html_edit_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>'
			$('#select-usu-edit').html(html_edit_select);
	});
});