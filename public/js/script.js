const categoriaController = "../../controllers/CategoriaController.php";

$(document).ready(function () {
    let editar = false;

    $("#agregarCategoria .cancelCategoria").hide();

    listarCategorias();

    $("#agregarCategoria .cancelCategoria").off("click");
    $("#agregarCategoria .cancelCategoria").on("click", function () {
        $("#agregarCategoria")[0].reset();
        $("#agregarCategoria .cancelCategoria").hide();
        editar = false;
    });

    $("#agregarCategoria").off("submit");
    $("#agregarCategoria").on("submit", function (event) {
        event.preventDefault();

        metodo = editar === false ? $("#metodo").val() : "editarCategoria";

        // Agregar categoria
        $.ajax({
            type: "POST",
            url: categoriaController,
            data: {
                metodo: metodo,
                nombre_categoria: $("#nombre_categoria").val(),
                id: $("#categoriaId").val()
            },
        }).done(function(data) {
            $("#agregarCategoria .cancelCategoria").hide();
            $("#agregarCategoria")[0].reset();

            listarCategorias();
        });
    })

    $(".table #eliminarCategoria").off("click");
    $(".table").on("click", "#eliminarCategoria", function () {
        let element = $(this).parent().parent().parent();

        if (confirm(`¿Desea eliminar la categoría <<< ${element.find("td").html()} >>>?`))
        {
            let id = element.attr("categoriaId");

            $.ajax({
                type: "POST",
                url: categoriaController,
                data: {
                    metodo: "eliminarCategoria",
                    id: id
                }
            }).done(function (response) {
                listarCategorias();
            });
        }
    });

    $(".table #editarCategoria").off("click");
    $(".table").on("click", "#editarCategoria", function () {
        let element = $(this).parent().parent().parent();
        let id = element.attr("categoriaId");

        $.ajax({
            type: "GET",
            url: categoriaController,
            data: {
                metodo: "obtenerCategoria",
                id: id
            }
        }).done(function (response) {
            let categoria = JSON.parse(response);

            $("#agregarCategoria #nombre_categoria").val(categoria[0].nombre);
            $("#agregarCategoria #categoriaId").val(categoria[0].id);
            $("#agregarCategoria .cancelCategoria").show();

            editar = true;
        });
    });
});

function listarCategorias() {
    $.ajax({
        type: "GET",
        url: categoriaController,
        data: {
            metodo: "listarCategorias"
        }
    }).done(function (response) {
        let categorias = JSON.parse(response);
        let template = "";

        categorias.forEach(categoria => {
            template += `
                <tr categoriaId="${categoria.id}">
                    <td>${categoria.nombre}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" id="editarCategoria" class="btn btn-primary">Editar</button>
                            <button type="button" id="eliminarCategoria" class="btn btn-danger">Eliminar</button>
                        </div>
                    </td>
                </tr>
            `;
        });

        $("#categorias").html(template);

        $('.table').DataTable();
    });
}