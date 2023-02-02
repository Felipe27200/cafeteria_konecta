const ventaController = "../../controllers/VentaController.php";

$(document).ready(function () {

    obtenerProductos();

    if ($("#table_ventas").length > 0)
        listarVentas();

    $("#agregarVenta").off("submit");
    $("#agregarVenta").on("submit", function (event) {
        event.preventDefault();

        // Agregar categoria
        $.ajax({
            type: "POST",
            url: ventaController,
            data: {
                metodo: $("#metodo").val(),
                producto_id: $("#producto_id").val(),
                cantidad: $("#cantidad").val(),
            },
        }).done(function(data) {
            data = JSON.parse(data);

            if (data == false)
            {
                alert("El producto carece de esa cantidad de existencias");
            }
            else
            {
                $("#agregarVenta")[0].reset();
                listarVentas();
            }
        });
    })

});

function listarVentas() {
    $.ajax({
        type: "GET",
        url: ventaController,
        data: {
            metodo: "listarVentas"
        }
    }).done(function (response) {
        let ventas = JSON.parse(response);
        let template = "";

        ventas.forEach(venta => {
            template += `
                <tr productoId="${venta.id}">
                    <td>${venta.producto_id}</td>
                    <td>${venta.precio}</td>
                    <td>${venta.cantidad}</td>
                    <td>${(venta.cantidad * venta.precio)}</td>
                </tr>
            `;
        });

        $("#ventas").html(template);

        $('#table_ventas').DataTable();
    });
}

function obtenerProductos()
{
    $.ajax({
        type: "POST",
        url: productoController,
        data: { metodo: "listarProductos" }
    }).done(function (response) {
        let productos = JSON.parse(response);
        let template = "<option value=''>Seleccione...</option>";

        productos.forEach(producto => {
            template += `
                <option value="${producto.id}">${producto.nombre}</option>
            `;
        });

        $("#producto_id").html(template);
    });
}