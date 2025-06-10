$(document).ready(function() {
  $.ajax({
    url: 'update.php',
    type: 'GET',
    dataType: 'json',
    cache:false,
    success: function(data) {
     

      const $tablaPro = $('#tabla-pro'); // tbody de la tabla
      $tablaPro.empty(); 
      const $tablaMat = $('#tabla-Mat'); // tbody de la tabla
      $tablaMat.empty(); 
      const $tablaAlu = $('#tabla-Alu'); // tbody de la tabla
      $tablaAlu.empty(); 

      data.prof.forEach(function(prof) {
        const fila = `
          <tr data-id="${prof.IDProfesor}">
            <td>${prof.NombrePro}</td>
            <td>${prof.PaternoPro}</td>
            <td>${prof.MaternoPro}</td>
            <td>${prof.Cubiculo || 'Sin cubículo'}</td>
            <td>${prof.puesto || 'Sin puesto'}</td>
            <td>
              <select class="campo-editable-select">
                <option value="">-- Selecciona campo --</option>
                <option value="NombrePro">Nombre</option>
                <option value="PaternoPro">Paterno</option>
                <option value="MaternoPro">Materno</option>
                <option value="Cubiculo">Cubículo</option>
                <option value="puesto">Puesto</option>
              </select>
            </td>
            <td><input type="text" class="nuevo-valor-input form-control" disabled></td>
            <td><button class="btn btn-success btn-guardar" disabled>Guardar</button></td>
          </tr>
        `;
        $tablaPro.append(fila);
      });
// Cuando seleccionas el campo a editar
      $(document).on('change', '.campo-editable-select', function () {
        const $fila = $(this).closest('tr');
        const campo = $(this).val();

        // Activar el input y botón solo si se seleccionó un campo
        if (campo !== "") {
          $fila.find('.nuevo-valor-input').prop('disabled', false).focus();
          $fila.find('.btn-guardar').prop('disabled', false);
        } else {
          $fila.find('.nuevo-valor-input').prop('disabled', true);
          $fila.find('.btn-guardar').prop('disabled', true);
        }
      });

      // Guardar actualización
      $(document).on('click', '.btn-guardar', function () {
        const $fila = $(this).closest('tr');
        const id = $fila.data('id');
        const campo = $fila.find('.campo-editable-select').val();
        const valor = $fila.find('.nuevo-valor-input').val();

        if (campo === "" || valor.trim() === "") {
          alert("Selecciona un campo y escribe un nuevo valor.");
          return;
        }

        $.post('updProfesor.php', {
          id: id,
          campo: campo,
          valor: valor
        }, function (respuesta) {
          alert("Resultado: " + respuesta);
          location.reload(); // Opcional: recargar para ver cambios reflejados
        });
      });
  //materias
    data.mat.forEach(function(mat) {
     const filaMat = `
          <tr>
            <td>${mat.NombMateria}</td>
            <td><a href="/ESCOM/ADMIN/read/read.HTML" class="btn btn-success">Editar</a></td>
          </tr>
        `;
        $tablaMat.append(filaMat);
    });

    // Alumnos
    data.alu.forEach(function(alu) {
      const filaAlu = `
          <tr>
            <td>${alu.NombreAlu}</td>
            <td>${alu.PaternoAlu}</td>
            <td>${alu.MaternoAlu}</td>
            <td>${alu.boleta}</td> 
            <td>${alu.contraseña}</td> 
            <td><a href="/ESCOM/ADMIN/read/read.HTML" class="btn btn-success">Editar</a></td>
          </tr>
        `;
        $tablaAlu.append(filaAlu);
    });
    ////modificacion de los datos 
$('.campo-editable').change(function () {
  const IDProfesor = $(this).data('IDProfesor');
  const campo = $(this).data('campo');
  const valor = $(this).val();

  $.post('actualizar_profesor.php', {
    id: IDProfesor,
    campo: campo,
    valor: valor
  }, function (respuesta) {
    console.log(respuesta);
  });
});

    },
    error: function(xhr, status, error) {
      console.error("Error en AJAX:", status, error);
    }
  });


});
    

