function cargarDatos() {
  $.ajax({
    url: 'update.php',
    type: 'POST',
    dataType: 'json',
    cache: false,
    success: function(respAX) {
      const $tablaPro = $('#tabla-pro').empty();
      const $tablaMat = $('#tabla-Mat').empty();
      const $tablaAlu = $('#tabla-Alu').empty();

      let filasProfesor = "", filasMateria = "", filasAlumno = "";

      respAX.dataPro.forEach(element => {
        filasProfesor += `
          <tr data-id="${element.IDProfesor}">
            <td>${element.NombrePro}</td>
            <td>${element.PaternoPro}</td>
            <td>${element.MaternoPro}</td>
            <td>${element.Cubiculo || 'Sin cubículo'}</td>
            <td>${element.puesto || 'Sin puesto'}</td>
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
      });
      $tablaPro.append(filasProfesor);

      respAX.dataMat.forEach(element => {
        filasMateria += `
          <tr>
            <td>${element.NombMateria}</td>
            <td><a href="/ESCOM/ADMIN/read/read.HTML" class="btn btn-success">Editar</a></td>
          </tr>
        `;
      });
      $tablaMat.append(filasMateria);

      respAX.dataAlu.forEach(element => {
        filasAlumno += `
          <tr>
            <td>${element.NombreAlu}</td>
            <td>${element.PaternoAlu}</td>
            <td>${element.MaternoAlu}</td>
            <td>${element.boleta}</td> 
            <td>${element.contraseña}</td> 
            <td><a href="/ESCOM/ADMIN/read/read.HTML" class="btn btn-success">Editar</a></td>
          </tr>
        `;
      });
      $tablaAlu.append(filasAlumno);
    },
    error: function(xhr, status, error) {
      console.error("Error en AJAX:", status, error);
      alert("Error al cargar los datos.");
    }
  });
}

function registrarEventos() {
  // Activar input y botón si se selecciona un campo
  $(document).on('change', '.campo-editable-select', function () {
    const $fila = $(this).closest('tr');
    const campo = $(this).val();
    $fila.find('.nuevo-valor-input').prop('disabled', campo === "");
    $fila.find('.btn-guardar').prop('disabled', campo === "");
    if (campo !== "") $fila.find('.nuevo-valor-input').focus();
  });

  // Guardar cambios
  $(document).on('click', '.btn-guardar', function () {
    const $fila = $(this).closest('tr');
    const id = $fila.data('id');
    const campo = $fila.find('.campo-editable-select').val();
    const valor = $fila.find('.nuevo-valor-input').val();

    if (!campo || valor.trim() === "") {
      alert("Selecciona un campo y escribe un nuevo valor.");
      return;
    }

    $.ajax({
      url: 'updProfesor.php',
      type: 'POST',
      data: { id, campo, valor },
      success: function(respuesta) {
        try {
          // Si el PHP responde un JSON, lo parseamos
          const json = JSON.parse(respuesta);
          alert(json.msg || "Actualización exitosa");
        } catch (e) {
          // Si no es JSON, asumimos texto plano
          alert(respuesta);
        }
        cargarDatos(); // Recargar tabla después de actualizar
      },
      error: function(xhr, status, error) {
        alert("Error al actualizar el registro.");
        console.error("AJAX error:", status, error);
      }
    });
  });
}

$(document).ready(function () {
  cargarDatos();
  registrarEventos();
});
