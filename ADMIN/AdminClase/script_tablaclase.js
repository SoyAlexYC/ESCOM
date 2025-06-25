let dataTable;
let dataTableIsInitialized = false;

let dataTableOptions = {
    lengthMenu: [5, 10, 15, 20],
    dom: "Bfrtilp",
    buttons: [
        {
            extend: "excelHtml5",
            text: "<i class='fa-solid fa-file-excel'></i>",
            titleAttr: "Exportar Excel",
            className: "btn btn-success",
        },
        {
            extend: "pdfHtml5",
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: "Exportar PDF",
            className: "btn btn-danger",
        },
        {
            extend: "print",
            text: "<i class='fa-solid fa-print'></i>",
            titleAttr: "Imprimir",
            className: "btn btn-info",
        },
    ],
    destroy: true,
    language: {
        "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "autoFill": {
            "cancel": "Cancelar",
            "fill": "Rellene todas las celdas con <i>%d<\/i>",
            "fillHorizontal": "Rellenar celdas horizontalmente",
            "fillVertical": "Rellenar celdas verticalmente",
            "info": ""
        },
        "buttons": {
            "collection": "Colección",
            "colvis": "Visibilidad",
            "colvisRestore": "Restaurar visibilidad",
            "copy": "Copiar",
            "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
            "copySuccess": {
                "_": "Copiadas %ds filas al portapapeles",
                "1": "Copiada 1 fila al portapapeles"
            },
            "copyTitle": "Copiar al portapapeles",
            "createState": "Crear Estado",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "_": "Mostrar %d filas",
                "-1": "Mostrar todas las filas"
            },
            "pdf": "PDF",
            "print": "Imprimir",
            "removeAllStates": "Remover Estados",
            "removeState": "Remover",
            "renameState": "Cambiar nombre",
            "savedStates": "Estados Guardados",
            "stateRestore": "Estado %d",
            "updateState": "Actualizar"
        },
        "columnControl": {
            "colVis": "Visibilidad",
            "colVisDropdown": "Desplegable visibilidad",
            "dropdown": "Desplegable",
            "list": {
                "add": "Añadir",
                "none": "Ninguno",
                "search": "Buscar.."
            },
            "orderAddAsc": "Añadir a ordenación ascendente",
            "orderAddDesc": "Añadir a ordenación descencente",
            "orderAsc": "Ordenar ascendentemente",
            "orderDesc": "Ordenar descendentemente",
            "orderRemove": "Borrar de ordenación",
            "reorder": "Reordenar",
            "reorderLeft": "Mover a la izquierda",
            "reorderRight": "Mover a la derecha",
            "search": {
                "datetime": {
                    "empty": "Vacío",
                    "equal": "Igual a",
                    "greater": "Mayor que",
                    "less": "Menor que",
                    "notEmpty": "No vacío",
                    "notEqual": "Diferente de"
                },
                "number": {
                    "empty": "Vacío",
                    "equal": "Igual a",
                    "greater": "Mayor que",
                    "greaterOrEqual": "Mayor o igual a",
                    "less": "Menor que",
                    "lessOrEqual": "Menor o igual a",
                    "notEmpty": "No vacío",
                    "notEqual": "Diferente de"
                },
                "text": {
                    "empty": "Vacío",
                    "ends": "Finaliza con",
                    "equal": "Igual a",
                    "notEmpty": "No vacío",
                    "notEqual": "Diferente de",
                    "starts": "Empieza con"
                }
            },
            "searchClear": "Borrar búsqueda",
            "searchDropdown": "Buscar"
        },
        "datetime": {
            "amPm": {
                "0": "AM",
                "1": "PM"
            },
            "hours": "Horas",
            "minutes": "Minutos",
            "months": {
                "0": "Enero",
                "1": "Febrero",
                "10": "Noviembre",
                "11": "Diciembre",
                "2": "Marzo",
                "3": "Abril",
                "4": "Mayo",
                "5": "Junio",
                "6": "Julio",
                "7": "Agosto",
                "8": "Septiembre",
                "9": "Octubre"
            },
            "next": "Próximo",
            "previous": "Anterior",
            "seconds": "Segundos",
            "unknown": "-",
            "weekdays": {
                "0": "Dom",
                "1": "Lun",
                "2": "Mar",
                "3": "Mié",
                "4": "Jue",
                "5": "Vie",
                "6": "Sáb"
            }
        },
        "decimal": "",
        "editor": {
            "close": "Cerrar",
            "create": {
                "button": "Nuevo",
                "submit": "Crear",
                "title": "Crear Nuevo Registro"
            },
            "edit": {
                "button": "Editar",
                "submit": "Actualizar",
                "title": "Editar Registro"
            },
            "error": {
                "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
            },
            "multi": {
                "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga clic o pulse aquí, de lo contrario conservarán sus valores individuales.",
                "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                "restore": "Deshacer Cambios",
                "title": "Múltiples Valores"
            },
            "remove": {
                "button": "Eliminar",
                "confirm": {
                    "_": "¿Está seguro de que desea eliminar %d filas?",
                    "1": "¿Está seguro de que desea eliminar 1 fila?"
                },
                "submit": "Eliminar",
                "title": "Eliminar Registro"
            }
        },
        "emptyTable": "Ningún dato disponible en esta tabla",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "infoPostFix": "",
        "infoThousands": ".",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "orderClear": "Limpiar ordenación de toda la tabla",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchBuilder": {
            "add": "Añadir condición",
            "button": {
                "_": "Constructor de búsqueda (%d)",
                "0": "Constructor de búsqueda"
            },
            "clearAll": "Borrar todo",
            "condition": "Condición",
            "conditions": {
                "array": {
                    "contains": "Contiene",
                    "empty": "Vacío",
                    "equals": "Igual",
                    "not": "Diferente de",
                    "notEmpty": "No Vacío",
                    "without": "Sin"
                },
                "date": {
                    "after": "Después",
                    "before": "Antes",
                    "between": "Entre",
                    "empty": "Vacío",
                    "equals": "Igual a",
                    "not": "Diferente de",
                    "notBetween": "No entre",
                    "notEmpty": "No Vacío"
                },
                "number": {
                    "between": "Entre",
                    "empty": "Vacío",
                    "equals": "Igual a",
                    "gt": "Mayor a",
                    "gte": "Mayor o igual a",
                    "lt": "Menor que",
                    "lte": "Menor o igual que",
                    "not": "Diferente de",
                    "notBetween": "No entre",
                    "notEmpty": "No vacío"
                },
                "string": {
                    "contains": "Contiene",
                    "empty": "Vacío",
                    "endsWith": "Termina en",
                    "equals": "Igual a",
                    "not": "Diferente de",
                    "notContains": "No Contiene",
                    "notEmpty": "No Vacío",
                    "notEndsWith": "No termina con",
                    "notStartsWith": "No empieza con",
                    "startsWith": "Empieza con"
                }
            },
            "data": "Data",
            "deleteTitle": "Eliminar regla de filtrado",
            "leftTitle": "Criterios anulados",
            "logicAnd": "Y",
            "logicOr": "O",
            "rightTitle": "Criterios de sangría",
            "title": {
                "_": "Constructor de búsqueda (%d)",
                "0": "Constructor de búsqueda"
            },
            "value": "Valor"
        },
        "searchPanes": {
            "clearMessage": "Borrar todo",
            "collapse": {
                "_": "Paneles de búsqueda (%d)",
                "0": "Paneles de búsqueda"
            },
            "collapseMessage": "Colapsar Todo",
            "count": "{total}",
            "countFiltered": "{shown} ({total})",
            "emptyPanes": "Sin paneles de búsqueda",
            "loadMessage": "Cargando paneles de búsqueda",
            "showMessage": "Mostrar Todo",
            "title": "Filtros Activos - %d"
        },
        "searchPlaceholder": "",
        "select": {
            "cells": {
                "_": "%d celdas seleccionadas",
                "0": "",
                "1": "1 celda seleccionada"
            },
            "columns": {
                "_": "%d columnas seleccionadas",
                "0": "",
                "1": "1 columna seleccionada"
            },
            "rows": {
                "_": "%d filas seleccionadas",
                "0": "",
                "1": "1 fila seleccionada"
            }
        },
        "stateRestore": {
            "creationModal": {
                "button": "Crear",
                "columns": {
                    "search": "Búsqueda de Columna",
                    "visible": "Visibilidad de Columna"
                },
                "name": "Nombre:",
                "order": "Clasificación",
                "paging": "Paginación",
                "scroller": "Posición de desplazamiento",
                "search": "Búsqueda",
                "searchBuilder": "Búsqueda avanzada",
                "select": "Seleccionar",
                "title": "Crear Nuevo Estado",
                "toggleLabel": "Incluir:"
            },
            "duplicateError": "Ya existe un Estado con este nombre.",
            "emptyError": "El nombre no puede estar vacío.",
            "emptyStates": "No hay Estados guardados",
            "removeConfirm": "¿Seguro que quiere eliminar %s?",
            "removeError": "Error al eliminar el Estado",
            "removeJoiner": "y",
            "removeSubmit": "Eliminar",
            "removeTitle": "Remover Estado",
            "renameButton": "Cambiar Nombre",
            "renameLabel": "Nuevo nombre para %s:",
            "renameTitle": "Cambiar Nombre Estado"
        },
        "thousands": ".",
        "zeroRecords": "No se encontraron resultados"
    }
};

function eliminarClase(id) {
    Swal.fire({
        title: "¿Esta Seguro?",
        text: "¡Esta accion es irreversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./eliminarregistro.php",
                method: "post",
                data: { IDClase: id },
                cache: false,
                success: (respAX) => {
                    console.log(respAX);
                    let objAX = JSON.parse(respAX);
                    Swal.fire({
                        title: "Eliminado",
                        text: objAX.msj,
                        icon: objAX.icono,
                        footer: objAX.log,
                        didDestroy: () => {
                            location.reload();
                        }
                    });
                }
            });
        }
    });
}

const initDataTable = async () => {
    if (dataTableIsInitialized) {
        //Destruimos tabla
        dataTable.destroy();
    }
    await listarClases();
    dataTable = $('#example').DataTable(dataTableOptions);
    dataTableIsInitialized = true;
}

const listarClases = async () => {

    try {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "./deleteclases.php",
                method: "post",
                cache: "false",
                success: (respAX) => {
                    let objAX_clases = JSON.parse(respAX);
                    let clases = objAX_clases.data;
                    //console.log(clases);

                    let content = ``;

                    clases.forEach((element, index) => {
                        if (element.Estatus == 1) {
                            content +=
                                `<tr>
                            <td> ${index + 1} </td>
                            <td> ${element.IDClase} </td>
                            <td> ${element.Estatus} </td>
                            <td> ${element.Materia} </td>
                            <td> ${element.Grupo} </td>
                            <td> ${element.Salon} </td>
                            <td> ${element.TipoSalon} </td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarClase(${element.IDClase})"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>`
                        }
                    });

                    tabla_clases.innerHTML = content;
                    resolve();
                },
                error: (err) => {
                    console.error("Error al cargar clases", err);
                    reject(err);
                }
            });
        })
    } catch (error) {
        console.log(error);
    }
}

let profh;
create.addEventListener('click', () => {
    let element = document.getElementById("agregar_change");
    const previos = document.getElementsByName("quitable");
    if (previos.length > 0) {
        let lim = previos.length;
        for (let j = 0; j < lim; j++) {
            let todelete = previos[0]
            element.removeChild(todelete);
        }
    }

    let quit = document.getElementById("agr_c");
    quit.innerHTML = "";
    let curso = document.createElement("select");
    curso.setAttribute("id", "curso");
    curso.setAttribute("name", "curso");
    curso.setAttribute("class", "form-select");
    quit.appendChild(curso);

    $.ajax({
        url: "clase_curso.php",
        method: "post",
        cache: false,
        success: (respAX) => {
            let objAX = JSON.parse(respAX);
            if (objAX.code == 1) {
                let element = document.getElementById("curso");
                for (let i = 0; i < objAX.data.length; i++) {
                    let para = document.createElement("option");
                    let a = document.createAttribute("materia");
                    a.value = objAX.data[i].NombMateria;
                    para.setAttributeNode(a);
                    a = document.createAttribute("grupo");
                    a.value = objAX.data[i].NombreGru;
                    para.setAttributeNode(a);
                    a = document.createAttribute("hteo");
                    a.value = objAX.data[i].HorasTeo;
                    para.setAttributeNode(a);
                    a = document.createAttribute("hlab");
                    a.value = objAX.data[i].HorasLab;
                    para.setAttributeNode(a);
                    para.setAttribute("name", objAX.data[i].IDCurso);
                    para.setAttribute("id", objAX.data[i].IDCurso);
                    let node = document.createTextNode(objAX.data[i].NombMateria + " - " + objAX.data[i].NombreGru);
                    para.appendChild(node);
                    element.appendChild(para);
                }
                element = document.getElementById("agregar_change");
                element.setAttribute("name", "first");
                let estatus = document.getElementById("agr_status");
                let texto = document.createTextNode("1");
                estatus.appendChild(texto);
                let col_mat = document.createElement("td");
                let val_cursom = $("#curso").children(":selected").attr("materia");
                let textmat = document.createTextNode(val_cursom);
                col_mat.appendChild(textmat);
                col_mat.setAttribute("id", "col_mat");
                element.appendChild(col_mat);
                let col_gru = document.createElement("td");
                let val_cursog = $("#curso").children(":selected").attr("grupo");
                let textgru = document.createTextNode(val_cursog);
                col_gru.appendChild(textgru);
                col_gru.setAttribute("id", "col_gru");
                element.appendChild(col_gru);
                let col_sal = document.createElement("td");
                let sal = document.createElement("select");
                sal.setAttribute("id", "sal");
                sal.setAttribute("name", "sal");
                sal.setAttribute("class", "form-select");
                col_sal.appendChild(sal);
                element.appendChild(col_sal);
                let col_tip = document.createElement("td");
                let textt = document.createTextNode("Teoria");
                col_tip.appendChild(textt);
                element.appendChild(col_tip);
                let col_boton = document.createElement("td");
                let bot = document.createElement("button");
                bot.setAttribute("class", "btn btn-sm btn-success");
                bot.innerHTML = `<i class="fa-solid fa-square-plus"></i>`;
                col_boton.appendChild(bot);
                element.appendChild(col_boton);
                bot.addEventListener('click', () => {
                    let v_curso = String($('#curso').children(":selected").attr("id"));
                    let v_prof = String($('#prof').children(":selected").attr("id"));
                    let salones = document.getElementsByName("sal");
                    let horas = document.getElementsByName("h");
                    let mensaje_sal = "";
                    let lim = salones.length;
                    let data_sal = [];
                    let data_horas = [];
                    for (let j = 0; j < lim; j++) {
                        mensaje_sal = mensaje_sal.concat(salones[j].value);
                        mensaje_sal = mensaje_sal.concat("->");
                        mensaje_sal = mensaje_sal.concat(horas[j].value);
                        mensaje_sal = mensaje_sal.concat("  |  ");
                        data_sal[j] = salones[j].value;
                        data_horas[j] = horas[j].options[horas[j].selectedIndex].id;
                    }
                    let datos = {
                        "curso": v_curso, "salones": data_sal, "prof": v_prof, "horas": data_horas,
                    }
                    Swal.fire({
                        title: "¿Esta Seguro?",
                        text: "Agregará al curso con materia: " + val_cursom + " y grupo " + val_cursog + " con el profesor: " + String($('#prof').children(":selected").val()) + " y con clases: " + mensaje_sal,
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Agregar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "clases.php",
                                type: "post",
                                data: datos,
                                cache: false,
                                success: (respAX) => {
                                    let objAX = JSON.parse(respAX);
                                    if (objAX.code == 1) {
                                        Swal.fire({
                                            title: "Agregado",
                                            text: objAX.msj,
                                            icon: objAX.icono,
                                            footer: objAX.log,
                                            didDestroy: () => {
                                                location.reload();
                                            }
                                        });
                                    }
                                    else {
                                        alert("NO se logró, intente de nuevo. " + objAX.data);
                                    }
                                },
                                error: (respAX) => {
                                    let objAX = JSON.parse(respAX);
                                    console.error("Error:", objAX.data);
                                }
                            });
                        }
                    });
                }, false);


                let hteo = parseInt($("#curso").children(":selected").attr("hteo"));
                let hlab = parseInt($("#curso").children(":selected").attr("hlab"));
                let foot = document.getElementById("foot");
                if (hteo > 0) {
                    for (let i = 1; i < hteo; i++) {
                        let element = document.createElement("tr");
                        element.setAttribute("name", "row");
                        let col_1 = document.createElement("td");
                        let t1 = document.createTextNode("");
                        col_1.appendChild(t1);
                        element.appendChild(col_1);
                        let col_2 = document.createElement("td");
                        let t2 = document.createTextNode("");
                        col_2.appendChild(t2);
                        element.appendChild(col_2);
                        let col_3 = document.createElement("td");
                        let t3 = document.createTextNode("1");
                        col_3.appendChild(t3);
                        element.appendChild(col_3);
                        let col_mat = document.createElement("td");
                        let t4 = document.createTextNode(val_cursom);
                        col_mat.appendChild(t4);
                        element.appendChild(col_mat);
                        let col_gru = document.createElement("td");
                        let t5 = document.createTextNode(val_cursog);
                        col_gru.appendChild(t5);
                        col_gru.setAttribute("name", "change_gru");
                        element.appendChild(col_gru);
                        let col_sal = document.createElement("td");
                        let sal = document.createElement("select");
                        sal.setAttribute("id", "sal");
                        sal.setAttribute("name", "sal");
                        sal.setAttribute("class", "form-select");
                        col_sal.appendChild(sal);
                        element.appendChild(col_sal);
                        let col_tip = document.createElement("td");
                        let textt = document.createTextNode("Teoría");
                        col_tip.appendChild(textt);
                        element.appendChild(col_tip);
                        foot.appendChild(element);
                    }
                }

                if (hlab > 0) {
                    for (let i = 0; i < hlab; i++) {
                        let element = document.createElement("tr");
                        element.setAttribute("name", "row");
                        let col_1 = document.createElement("td");
                        let t1 = document.createTextNode("");
                        col_1.appendChild(t1);
                        element.appendChild(col_1);
                        let col_2 = document.createElement("td");
                        let t2 = document.createTextNode("");
                        col_2.appendChild(t2);
                        element.appendChild(col_2);
                        let col_3 = document.createElement("td");
                        let t3 = document.createTextNode("1");
                        col_3.appendChild(t3);
                        element.appendChild(col_3);
                        let col_mat = document.createElement("td");
                        let t4 = document.createTextNode(val_cursom);
                        col_mat.appendChild(t4);
                        element.appendChild(col_mat);
                        let col_gru = document.createElement("td");
                        let t5 = document.createTextNode(val_cursog);
                        col_gru.appendChild(t5);
                        col_gru.setAttribute("name", "change_gru");
                        element.appendChild(col_gru);
                        let col_sal = document.createElement("td");
                        let sal = document.createElement("select");
                        sal.setAttribute("id", "sal");
                        sal.setAttribute("name", "sal");
                        sal.setAttribute("class", "form-select");
                        col_sal.appendChild(sal);
                        element.appendChild(col_sal);
                        let col_tip = document.createElement("td");
                        let textt = document.createTextNode("Laboratorio");
                        col_tip.appendChild(textt);
                        element.appendChild(col_tip);
                        foot.appendChild(element);
                    }
                }

                element = document.createElement("tr");
                element.setAttribute("name", "row");
                let col_1 = document.createElement("th");
                let t1 = document.createTextNode("");
                col_1.appendChild(t1);
                element.appendChild(col_1);
                let col_2 = document.createElement("th");
                let t2 = document.createTextNode("");
                col_2.appendChild(t2);
                element.appendChild(col_2);
                let col_3 = document.createElement("th");
                let t3 = document.createTextNode("Profesor");
                col_3.appendChild(t3);
                element.appendChild(col_3);
                let col_4 = document.createElement("th");
                let t4 = document.createTextNode("Hora 1");
                col_4.appendChild(t4);
                element.appendChild(col_4);
                let col_5 = document.createElement("th");
                let t5 = document.createTextNode("Hora 2");
                col_5.appendChild(t5);
                element.appendChild(col_5);
                let col_6 = document.createElement("th");
                let t6 = document.createTextNode("Hora 3");
                col_6.appendChild(t6);
                element.appendChild(col_6);
                let col_7 = document.createElement("th");
                let text7 = document.createTextNode("");
                col_7.appendChild(text7);
                element.appendChild(col_7);
                foot.appendChild(element);

                element = document.createElement("tr");
                element.setAttribute("id", "row");
                element.setAttribute("name", "row");
                let col1z = document.createElement("td");
                let t1z = document.createTextNode("");
                col1z.appendChild(t1z);
                element.appendChild(col1z);
                let col_2z = document.createElement("td");
                let t2z = document.createTextNode("");
                col_2z.appendChild(t2z);
                element.appendChild(col_2z);
                let col_3z = document.createElement("td");
                let prof = document.createElement("select");
                prof.setAttribute("id", "prof");
                prof.setAttribute("name", "prof");
                prof.setAttribute("class", "form-select");
                col_3z.appendChild(prof);
                element.appendChild(col_3z);
                foot.appendChild(element);
                $.ajax({
                    url: "clase_profh.php",
                    method: "post",
                    cache: false,
                    success: (respAX) => {
                        let objAX = JSON.parse(respAX);
                        if (objAX.code == 1) {
                            const epro = document.getElementById("prof");
                            for (let i = 0; i < objAX.data.length; i++) {
                                let para = document.createElement("option");
                                para.setAttribute("name", objAX.data[i].IDProfesor);
                                para.setAttribute("id", objAX.data[i].IDProfesor);
                                let node = document.createTextNode(objAX.data[i].NombrePro + " " + objAX.data[i].PaternoPro + " " + objAX.data[i].MaternoPro);
                                para.appendChild(node);
                                epro.appendChild(para);
                            }
                            element = document.getElementById("row");
                            let col_4z = document.createElement("td");
                            col_4z.setAttribute("name", "hq");
                            let t4z = document.createElement("select");
                            t4z.setAttribute("id", "h1");
                            t4z.setAttribute("name", "h");
                            t4z.setAttribute("class", "form-select");
                            col_4z.appendChild(t4z);
                            element.appendChild(col_4z);
                            let col_5z = document.createElement("td");
                            col_5z.setAttribute("name", "hq");
                            let t5z = document.createElement("select");
                            t5z.setAttribute("id", "h2");
                            t5z.setAttribute("name", "h");
                            t5z.setAttribute("class", "form-select");
                            col_5z.appendChild(t5z);
                            element.appendChild(col_5z);
                            let col_6z = document.createElement("td");
                            col_6z.setAttribute("name", "hq");
                            let t6z = document.createElement("select");
                            t6z.setAttribute("id", "h3");
                            t6z.setAttribute("name", "h");
                            t6z.setAttribute("class", "form-select");
                            col_6z.appendChild(t6z);
                            element.appendChild(col_6z);
                            let col_7z = document.createElement("td");
                            col_7z.setAttribute("name", "hq");
                            let text7z = document.createTextNode("");
                            col_7z.appendChild(text7z);
                            element.appendChild(col_7z);
                            profh = $("#prof").children(":selected").attr("id")
                            let datosh = {
                                "prof": profh,
                            }
                            $.ajax({
                                url: "clase_horasp.php",
                                method: "post",
                                data: datosh,
                                cache: false,
                                success: (respAX) => {
                                    let objAX = JSON.parse(respAX);
                                    if (objAX.code == 1) {
                                        const elements = document.getElementsByName("h");
                                        if (elements.length > 0) {
                                            let lim = elements.length;
                                            for (let j = 0; j < lim; j++) {
                                                for (let i = 0; i < objAX.data.length; i++) {  //para mostrar escalonado (mal): for (let i = j; i < objAX.data.length; i++)
                                                    let para = document.createElement("option");
                                                    para.setAttribute("name", i);
                                                    para.setAttribute("id", objAX.data[i].IDEspacio);
                                                    let node = document.createTextNode(objAX.data[i].NomDia + " " + objAX.data[i].HoraIni + "-" + objAX.data[i].HoraFin);
                                                    para.appendChild(node);
                                                    elements[j].appendChild(para);
                                                }
                                            }
                                        }
                                    }
                                    else {
                                        const elements = document.getElementsByName("h");
                                        let lim = elements.length;
                                        for (let j = 0; j < lim; j++) {
                                            let para = document.createElement("option");
                                            para.setAttribute("name", "none");
                                            let node = document.createTextNode("No fue posible obtener los horarios");
                                            para.appendChild(node);
                                            elements[j].appendChild(para);
                                        }
                                    }
                                }
                            });

                            h2.onchange = function () {
                                console.log("jaa");
                            }
                        }
                        else {
                            const element = document.getElementById("prof");
                            let para = document.createElement("option");
                            para.setAttribute("name", "none");
                            let node = document.createTextNode("No fue posible obtener los profes");
                            para.appendChild(node);
                            element.appendChild(para);
                        }
                    }
                });

                prof.onchange = function () {
                    element = document.getElementById("row");
                    const previos = document.getElementsByName("hq");
                    if (previos.length > 0) {
                        let lim = previos.length;
                        for (let j = 0; j < lim; j++) {
                            let todelete = previos[0]
                            element.removeChild(todelete);
                        }
                    }
                    let col_4z = document.createElement("td");
                    col_4z.setAttribute("name", "hq");
                    let t4z = document.createElement("select");
                    t4z.setAttribute("id", "h1");
                    t4z.setAttribute("name", "h");
                    t4z.setAttribute("class", "form-select");
                    col_4z.appendChild(t4z);
                    element.appendChild(col_4z);
                    let col_5z = document.createElement("td");
                    col_5z.setAttribute("name", "hq");
                    let t5z = document.createElement("select");
                    t5z.setAttribute("id", "h2");
                    t5z.setAttribute("name", "h");
                    t5z.setAttribute("class", "form-select");
                    col_5z.appendChild(t5z);
                    element.appendChild(col_5z);
                    let col_6z = document.createElement("td");
                    col_6z.setAttribute("name", "hq");
                    let t6z = document.createElement("select");
                    t6z.setAttribute("id", "h3");
                    t6z.setAttribute("name", "h");
                    t6z.setAttribute("class", "form-select");
                    col_6z.appendChild(t6z);
                    element.appendChild(col_6z);
                    let col_7z = document.createElement("td");
                    col_7z.setAttribute("name", "hq");
                    let text7z = document.createTextNode("");
                    col_7z.appendChild(text7z);
                    element.appendChild(col_7z);
                    profh = $("#prof").children(":selected").attr("id")
                    let datosh = {
                        "prof": profh,
                    }
                    $.ajax({
                        url: "clase_horasp.php",
                        method: "post",
                        data: datosh,
                        cache: false,
                        success: (respAX) => {
                            let objAX = JSON.parse(respAX);
                            if (objAX.code == 1) {
                                const elements = document.getElementsByName("h");
                                if (elements.length > 0) {
                                    let lim = elements.length;
                                    for (let j = 0; j < lim; j++) {
                                        for (let i = 0; i < objAX.data.length; i++) {
                                            let para = document.createElement("option");
                                            para.setAttribute("name", i);
                                            para.setAttribute("id", objAX.data[i].IDEspacio);
                                            let node = document.createTextNode(objAX.data[i].NomDia + " " + objAX.data[i].HoraIni + "-" + objAX.data[i].HoraFin);
                                            para.appendChild(node);
                                            elements[j].appendChild(para);
                                        }
                                    }
                                }
                            }
                            else {
                                const elements = document.getElementsByName("h");
                                let lim = elements.length;
                                for (let j = 0; j < lim; j++) {
                                    let para = document.createElement("option");
                                    para.setAttribute("name", "none");
                                    let node = document.createTextNode("No fue posible obtener los horarios");
                                    para.appendChild(node);
                                    elements[j].appendChild(para);
                                }
                            }
                        }
                    });
                }

            }
            else {
                let element = document.getElementById("p");
                let para = document.createElement("option");
                para.setAttribute("name", "none");
                let node = document.createTextNode("No fue posible obtener los cursos");
                para.appendChild(node);
                element.appendChild(para);
            }
        }
    });

    $.ajax({
        url: "clase_sal.php",
        method: "post",
        cache: false,
        success: (respAX) => {
            let objAX = JSON.parse(respAX);
            if (objAX.code == 1) {
                const elements = document.getElementsByName("sal");
                if (elements.length > 0) {
                    let lim = elements.length;
                    for (let j = 0; j < lim; j++) {
                        for (let i = 0; i < objAX.data.length; i++) {
                            let para = document.createElement("option");
                            para.setAttribute("name", objAX.data[i].IdTipo);
                            para.setAttribute("id", objAX.data[i].IDSalon);
                            let node = document.createTextNode(objAX.data[i].NomSalon);
                            para.appendChild(node);
                            elements[j].appendChild(para);
                        }
                    }
                }
            }
            else {
                const elements = document.getElementsByName("sal");
                let lim = elements.length;
                for (let j = 0; j < lim; j++) {
                    let para = document.createElement("option");
                    para.setAttribute("name", "none");
                    let node = document.createTextNode("No fue posible obtener los salones");
                    para.appendChild(node);
                    elements[j].appendChild(para);
                }
            }
        }
    });


    curso.onchange = function () {
        let hteo = parseInt($(this).children(":selected").attr("hteo"));
        let hlab = parseInt($(this).children(":selected").attr("hlab"));
        let sel_mat = $(this).children(":selected").attr("materia");
        let sel_gru = $(this).children(":selected").attr("grupo");
        let col_ma = document.getElementById("col_mat");
        col_ma.innerHTML = sel_mat;
        let col_gr = document.getElementById("col_gru");
        col_gr.innerHTML = sel_gru;
        let foot = document.getElementById("foot");
        const previos = document.getElementsByName("row");
        if (previos.length > 0) {
            let lim = previos.length;
            for (let j = 0; j < lim; j++) {
                let todelete = previos[0]
                foot.removeChild(todelete);
            }
        }
        if (hteo > 0) {
            for (let i = 1; i < hteo; i++) {
                let element = document.createElement("tr");
                element.setAttribute("name", "row");
                let col_1 = document.createElement("td");
                let t1 = document.createTextNode("");
                col_1.appendChild(t1);
                element.appendChild(col_1);
                let col_2 = document.createElement("td");
                let t2 = document.createTextNode("");
                col_2.appendChild(t2);
                element.appendChild(col_2);
                let col_3 = document.createElement("td");
                let t3 = document.createTextNode("1");
                col_3.appendChild(t3);
                element.appendChild(col_3);
                let col_mat = document.createElement("td");
                let t4 = document.createTextNode(sel_mat);
                col_mat.appendChild(t4);
                element.appendChild(col_mat);
                let col_gru = document.createElement("td");
                let t5 = document.createTextNode(sel_gru);
                col_gru.appendChild(t5);
                col_gru.setAttribute("name", "change_gru");
                element.appendChild(col_gru);
                let col_sal = document.createElement("td");
                let sal = document.createElement("select");
                sal.setAttribute("id", "sal");
                sal.setAttribute("name", "sal");
                sal.setAttribute("class", "form-select");
                col_sal.appendChild(sal);
                element.appendChild(col_sal);
                let col_tip = document.createElement("td");
                let textt = document.createTextNode("Teoría");
                col_tip.appendChild(textt);
                element.appendChild(col_tip);
                foot.appendChild(element);

            }
        }
        if (hlab > 0) {
            for (let i = 0; i < hlab; i++) {
                let element = document.createElement("tr");
                element.setAttribute("name", "row");
                let col_1 = document.createElement("td");
                let t1 = document.createTextNode("");
                col_1.appendChild(t1);
                element.appendChild(col_1);
                let col_2 = document.createElement("td");
                let t2 = document.createTextNode("");
                col_2.appendChild(t2);
                element.appendChild(col_2);
                let col_3 = document.createElement("td");
                let t3 = document.createTextNode("1");
                col_3.appendChild(t3);
                element.appendChild(col_3);
                let col_mat = document.createElement("td");
                let t4 = document.createTextNode(sel_mat);
                col_mat.appendChild(t4);
                element.appendChild(col_mat);
                let col_gru = document.createElement("td");
                let t5 = document.createTextNode(sel_gru);
                col_gru.appendChild(t5);
                col_gru.setAttribute("name", "change_gru");
                element.appendChild(col_gru);
                let col_sal = document.createElement("td");
                let sal = document.createElement("select");
                sal.setAttribute("id", "sal");
                sal.setAttribute("name", "sal");
                sal.setAttribute("class", "form-select");
                col_sal.appendChild(sal);
                element.appendChild(col_sal);
                let col_tip = document.createElement("td");
                let textt = document.createTextNode("Laboratorio");
                col_tip.appendChild(textt);
                element.appendChild(col_tip);
                foot.appendChild(element);
            }
        }

        element = document.createElement("tr");
        element.setAttribute("name", "row");
        let col_1a = document.createElement("th");
        let t1a = document.createTextNode("");
        col_1a.appendChild(t1a);
        element.appendChild(col_1a);
        let col_2a = document.createElement("th");
        let t2a = document.createTextNode("");
        col_2a.appendChild(t2a);
        element.appendChild(col_2a);
        let col_3a = document.createElement("th");
        let t3a = document.createTextNode("Profesor");
        col_3a.appendChild(t3a);
        element.appendChild(col_3a);
        let col_4a = document.createElement("th");
        let t4a = document.createTextNode("Hora 1");
        col_4a.appendChild(t4a);
        element.appendChild(col_4a);
        let col_5a = document.createElement("th");
        let t5a = document.createTextNode("Hora 2");
        col_5a.appendChild(t5a);
        element.appendChild(col_5a);
        let col_6 = document.createElement("th");
        let t6 = document.createTextNode("Hora 3");
        col_6.appendChild(t6);
        element.appendChild(col_6);
        let col_7 = document.createElement("th");
        let text7 = document.createTextNode("");
        col_7.appendChild(text7);
        element.appendChild(col_7);
        foot.appendChild(element);
        element = document.createElement("tr");
        element.setAttribute("id", "row");
        element.setAttribute("name", "row");
        let col1z = document.createElement("td");
        let t1z = document.createTextNode("");
        col1z.appendChild(t1z);
        element.appendChild(col1z);
        let col_2z = document.createElement("td");
        let t2z = document.createTextNode("");
        col_2z.appendChild(t2z);
        element.appendChild(col_2z);
        let col_3z = document.createElement("td");
        let prof = document.createElement("select");
        prof.setAttribute("id", "prof");
        prof.setAttribute("name", "prof");
        prof.setAttribute("class", "form-select");
        col_3z.appendChild(prof);
        element.appendChild(col_3z);
        foot.appendChild(element);
        $.ajax({
            url: "clase_profh.php",
            method: "post",
            cache: false,
            success: (respAX) => {
                let objAX = JSON.parse(respAX);
                if (objAX.code == 1) {
                    const epro = document.getElementById("prof");
                    for (let i = 0; i < objAX.data.length; i++) {
                        let para = document.createElement("option");
                        para.setAttribute("name", objAX.data[i].IDProfesor);
                        para.setAttribute("id", objAX.data[i].IDProfesor);
                        let node = document.createTextNode(objAX.data[i].NombrePro + " " + objAX.data[i].PaternoPro + " " + objAX.data[i].MaternoPro);
                        para.appendChild(node);
                        epro.appendChild(para);
                    }
                    element = document.getElementById("row");
                    let col_4z = document.createElement("td");
                    col_4z.setAttribute("name", "hq");
                    let t4z = document.createElement("select");
                    t4z.setAttribute("id", "h1");
                    t4z.setAttribute("name", "h");
                    t4z.setAttribute("class", "form-select");
                    col_4z.appendChild(t4z);
                    element.appendChild(col_4z);
                    let col_5z = document.createElement("td");
                    col_5z.setAttribute("name", "hq");
                    let t5z = document.createElement("select");
                    t5z.setAttribute("id", "h2");
                    t5z.setAttribute("name", "h");
                    t5z.setAttribute("class", "form-select");
                    col_5z.appendChild(t5z);
                    element.appendChild(col_5z);
                    let col_6z = document.createElement("td");
                    col_6z.setAttribute("name", "hq");
                    let t6z = document.createElement("select");
                    t6z.setAttribute("id", "h3");
                    t6z.setAttribute("name", "h");
                    t6z.setAttribute("class", "form-select");
                    col_6z.appendChild(t6z);
                    element.appendChild(col_6z);
                    let col_7z = document.createElement("td");
                    col_7z.setAttribute("name", "hq");
                    let text7z = document.createTextNode("");
                    col_7z.appendChild(text7z);
                    element.appendChild(col_7z);
                    profh = $("#prof").children(":selected").attr("id")
                    let datosh = {
                        "prof": profh,
                    }
                    $.ajax({
                        url: "clase_horasp.php",
                        method: "post",
                        data: datosh,
                        cache: false,
                        success: (respAX) => {
                            let objAX = JSON.parse(respAX);
                            if (objAX.code == 1) {
                                const elements = document.getElementsByName("h");
                                if (elements.length > 0) {
                                    let lim = elements.length;
                                    for (let j = 0; j < lim; j++) {
                                        for (let i = 0; i < objAX.data.length; i++) {
                                            let para = document.createElement("option");
                                            para.setAttribute("name", objAX.data[i].HoraFin);
                                            para.setAttribute("id", objAX.data[i].IDEspacio);
                                            let node = document.createTextNode(objAX.data[i].NomDia + " " + objAX.data[i].HoraIni + "-" + objAX.data[i].HoraFin);
                                            para.appendChild(node);
                                            elements[j].appendChild(para);
                                        }
                                    }
                                }
                            }
                            else {
                                const elements = document.getElementsByName("h");
                                let lim = elements.length;
                                for (let j = 0; j < lim; j++) {
                                    let para = document.createElement("option");
                                    para.setAttribute("name", "none");
                                    let node = document.createTextNode("No fue posible obtener los horarios");
                                    para.appendChild(node);
                                    elements[j].appendChild(para);
                                }
                            }
                        }
                    });
                }
                else {
                    const element = document.getElementById("prof");
                    let para = document.createElement("option");
                    para.setAttribute("name", "none");
                    let node = document.createTextNode("No fue posible obtener los profes");
                    para.appendChild(node);
                    element.appendChild(para);
                }
            }
        });

        prof.onchange = function () {
            element = document.getElementById("row");
            const previos = document.getElementsByName("hq");
            if (previos.length > 0) {
                let lim = previos.length;
                for (let j = 0; j < lim; j++) {
                    let todelete = previos[0]
                    element.removeChild(todelete);
                }
            }
            let col_4z = document.createElement("td");
            col_4z.setAttribute("name", "hq");
            let t4z = document.createElement("select");
            t4z.setAttribute("id", "h1");
            t4z.setAttribute("name", "h");
            t4z.setAttribute("class", "form-select");
            col_4z.appendChild(t4z);
            element.appendChild(col_4z);
            let col_5z = document.createElement("td");
            col_5z.setAttribute("name", "hq");
            let t5z = document.createElement("select");
            t5z.setAttribute("id", "h2");
            t5z.setAttribute("name", "h");
            t5z.setAttribute("class", "form-select");
            col_5z.appendChild(t5z);
            element.appendChild(col_5z);
            let col_6z = document.createElement("td");
            col_6z.setAttribute("name", "hq");
            let t6z = document.createElement("select");
            t6z.setAttribute("id", "h3");
            t6z.setAttribute("name", "h");
            t6z.setAttribute("class", "form-select");
            col_6z.appendChild(t6z);
            element.appendChild(col_6z);
            let col_7z = document.createElement("td");
            col_7z.setAttribute("name", "hq");
            let text7z = document.createTextNode("");
            col_7z.appendChild(text7z);
            element.appendChild(col_7z);
            profh = $("#prof").children(":selected").attr("id")
            let datosh = {
                "prof": profh,
            }
            $.ajax({
                url: "clase_horasp.php",
                method: "post",
                data: datosh,
                cache: false,
                success: (respAX) => {
                    let objAX = JSON.parse(respAX);
                    if (objAX.code == 1) {
                        const elements = document.getElementsByName("h");
                        if (elements.length > 0) {
                            let lim = elements.length;
                            for (let j = 0; j < lim; j++) {
                                for (let i = 0; i < objAX.data.length; i++) {
                                    let para = document.createElement("option");
                                    para.setAttribute("name", objAX.data[i].HoraFin);
                                    para.setAttribute("id", objAX.data[i].IDEspacio);
                                    let node = document.createTextNode(objAX.data[i].NomDia + " " + objAX.data[i].HoraIni + "-" + objAX.data[i].HoraFin);
                                    para.appendChild(node);
                                    elements[j].appendChild(para);
                                }
                            }
                        }
                    }
                    else {
                        const elements = document.getElementsByName("h");
                        let lim = elements.length;
                        for (let j = 0; j < lim; j++) {
                            let para = document.createElement("option");
                            para.setAttribute("name", "none");
                            let node = document.createTextNode("No fue posible obtener los horarios");
                            para.appendChild(node);
                            elements[j].appendChild(para);
                        }
                    }
                }
            });
        }

        $.ajax({
            url: "clase_sal.php",
            method: "post",
            cache: false,
            success: (respAX) => {
                let objAX = JSON.parse(respAX);
                if (objAX.code == 1) {
                    const elements = document.getElementsByName("sal");
                    if (elements.length > 0) {
                        let lim = elements.length;
                        console.log(elements)
                        for (let j = 1; j < lim; j++) {
                            for (let i = 0; i < objAX.data.length; i++) {
                                let para = document.createElement("option");
                                para.setAttribute("name", objAX.data[i].IdTipo);
                                para.setAttribute("id", objAX.data[i].IDSalon);
                                let node = document.createTextNode(objAX.data[i].NomSalon);
                                para.appendChild(node);
                                elements[j].appendChild(para);
                            }
                        }
                    }
                }
                else {
                    let element = document.getElementById("gru");
                    let para = document.createElement("option");
                    para.setAttribute("name", "none");
                    let node = document.createTextNode("No fue posible obtener los salones");
                    para.appendChild(node);
                    element.appendChild(para);
                }
            }
        });
    }

}, false);

window.addEventListener('load', async () => {
    await initDataTable();
});