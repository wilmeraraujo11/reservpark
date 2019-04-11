$('body').on('click','.modal-show', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modalshow-title').text('Ver registro');
      //$('#modal-btn-save').text('Crear usuario');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modalshow-body').html(response);
        }
      });

      $('#modalshow').modal('show');
    });

    $('body').on('click','.modal-edit', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modaledit-title').text('Editar registro');
      //$('#modal-btn-save').text('Crear usuario');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modaledit-body').html(response);
        }
      });

      $('#modaledit').modal('show');
    });

    $('body').on('click','.modal-delete', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modaldelete-title').text('Eliminar registro');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modaldelete-body').html(response);
        }
      });

      $('#modaldelete').modal('show');
    });

    //modal para cargar formulario de actualizar datos de usuario desde el superusuario
     $('body').on('click','.modal-edit-usuario-superadmin', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modaledit-title').text('Actualizar datos de usuario');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modaledit-body').html(response);
        }
      });

      $('#modaledit').modal('show');
    });
    //fin modal para cargar formulario de actualizar datos de usuario desde el superusuario
    
    //modal para cargar formulario de eliminar datos de usuario desde el superusuario
     $('body').on('click','.modal-delete-usuario-superadmin', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modaldelete-title').text('Eliminar registro');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modaldelete-body').html(response);
        }
      });

      $('#modaldelete').modal('show');
    });
    //fin modal para cargar formulario de eliminar datos de usuario desde el superusuario

    //modal para cargar formulario de actualizar datos de tipo de vehiculo desde el superusuario
     $('body').on('click','.modal-edit-tipovehiculo-superadmin', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modaledit-title').text('Actualizar tipo vehiculo');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modaledit-body').html(response);
        }
      });

      $('#modaledit').modal('show');
    });
    //fin modal para cargar formulario de actualizar datos de tipo de vehiculo desde el superusuario
    