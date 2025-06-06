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
          <tr>
          <td>${prof.NombrePro}</td>
          <td>${prof.PaternoPro}</td>
          <td>${prof.MaternoPro}</td>
          <td>${prof.Cubiculo || 'Sin cubículo'}</td> 
          <td>${prof.puesto || 'Sin puesto'}</td> 
            <td><a href="/ESCOM/ADMIN/read/read.HTML" class="btn btn-success">Editar</a></td>
          </tr>
        `;
        $tablaPro.append(fila);
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
            <td>${alu.contraseña}<td> 
            <td><a href="/ESCOM/ADMIN/read/read.HTML" class="btn btn-success">Editar</a></td>
          </tr>
        `;
        $tablaAlu.append(filaAlu);
    });
    ////modificacion de los datos 


    },
    error: function(xhr, status, error) {
      console.error("Error en AJAX:", status, error);
    }
  }



); 
});
