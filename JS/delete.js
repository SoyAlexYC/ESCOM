$(document).ready(function() {
  $.ajax({
    url: '../../ADMIN/delete/deleteclases.php',
    type: 'POST',
    dataType: 'json',
    cache:false,
    success:(respAX)=>{
        let objax_clases = JSON.parse(respAX);
        let clases = objax_clases.data;
        console.log(clases);
    },
    error: function(xhr, status, error) {
      console.error("Error en AJAX:", status, error);
    }
  });
});