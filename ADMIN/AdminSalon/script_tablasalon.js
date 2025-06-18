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

function eliminarSalon(id) {
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
                data: { IDSalon: id },
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
    await listarSalones();
    dataTable = $('#example').DataTable(dataTableOptions);
    dataTableIsInitialized = true;
}

const listarSalones = async () => {

    try {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "getsalones.php",
                method: "post",
                cache: "false",
                success: (respAX) => {
                    let objAX = JSON.parse(respAX);
                    let salones = objAX.data;

                    let content = ``;

                    salones.forEach((element, index) => {
                        if (element.Estatus == 1) {
                            content +=
                                `<tr>
                            <td> ${index + 1} </td>
                            <td> ${element.IDSalon} </td>
                            <td> ${element.Estatus} </td>
                            <td> ${element.NomSalon} </td>
                            <td> ${element.IdTipo} </td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="eliminarSalon(${element.IDSalon})"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>`
                        }
                    });

                    tabla_salones.innerHTML = content;
                    resolve();
                },
                error: (err) => {
                    console.error("Error al cargar salones", err);
                    reject(err);
                }
            });
        })
    } catch (error) {
        console.log(error);
    }
}

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
    let estatus = document.getElementById("agr_status");
    let texto = document.createTextNode("1");
    estatus.appendChild(texto);

    let col_nombre = document.createElement("td");
    let nombre = document.createElement("input");
    nombre.setAttribute("name", "nombre");
    nombre.setAttribute("id", "nombre");
    nombre.setAttribute("class", "fs-10  d-flex justify-content-between rounded-pill border border-black");
    col_nombre.appendChild(nombre);
    element.appendChild(col_nombre);
    let col_tip = document.createElement("td");
    let tip = document.createElement("select");
    tip.setAttribute("id", "tip");
    tip.setAttribute("name", "tip");
    tip.setAttribute("class", "form-select");
    col_tip.appendChild(tip);
    element.appendChild(col_tip);
    $.ajax({
        url: "salon_tip.php",
        method: "post",
        cache: false,
        success: (respAX) => {
            let objAX = JSON.parse(respAX);
            if (objAX.code == 1) {
                let element = document.getElementById("tip");
                for (let i = 0; i < objAX.data.length; i++) {
                    let para = document.createElement("option");
                    para.setAttribute("name", objAX.data[i].IDTipo);
                    para.setAttribute("id", objAX.data[i].IDTipo);
                    let node = document.createTextNode(objAX.data[i].NomTipo);
                    para.appendChild(node);
                    element.appendChild(para);
                }
            }
            else {
                let element = document.getElementById("tip");
                let para = document.createElement("option");
                para.setAttribute("name", "none");
                let node = document.createTextNode("No fue posible obtener las academias");
                para.appendChild(node);
                element.appendChild(para);
            }
        }
    });

    let col_boton = document.createElement("td");
    let bot = document.createElement("button");
    bot.setAttribute("class", "btn btn-sm btn-success");
    bot.innerHTML = `<i class="fa-solid fa-square-plus"></i>`;
    col_boton.appendChild(bot);
    element.appendChild(col_boton);
    bot.addEventListener('click', () => {
        let nom = $('#nombre').val();
        let tipo = $('#tip').val();
        let datos = {
            "nombre": nom, "tipo": tipo,
        }
        Swal.fire({
            title: "¿Esta Seguro?",
            text: "Agregará al salon: " + nom + ", de tipo: " + tipo,
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Agregar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "salon.php",
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

}, false);

window.addEventListener('load', async () => {
    await initDataTable();
});