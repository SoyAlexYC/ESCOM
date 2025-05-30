//parametros minimos 
$(document).ready(()=>{
    $.ajax({
        url:"./archivo php",
        method:"post",
        data:{dato1:"valor", dato2:"valor"},
        cache:false,
        succes:(respAX)=>{
            console.log(respAX);
        }

    }) //
})