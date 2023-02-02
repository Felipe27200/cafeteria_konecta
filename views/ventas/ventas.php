<?php require_once("../layout/encabezado.php") ?>
    <div class="container-fluid">
        <?php require_once "../layout/nav.php" ?>

        <h1 class="text-center my-4">Ventas</h1>

        <div class="row d-flex">
            <div class="col-md-3 mb-3">
                <h3>Registrar Venta</h3>

                <form id="agregarVenta">
                    <div class="mb-3">
                        <label for="producto_id" class="form-label">Producto: </label>

                        <select name="producto_id" id="producto_id" class="form-select" required>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad: </label>
                        <input type="number" min="1" id="cantidad" required class="form-control"/>
                    </div>

                    <div class="d-grid gap-2">
                        
                        <input type="submit" value="Realizar Venta" class="btn btn-primary">
                        
                        <input type="hidden" value="registrarVenta" id="metodo">
                    </div>                    
                </form>            
            </div>

            <div class="col-md-9">
                <table class="table table-bordered" id="table_ventas">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Valor</th>
                        </tr>
                    </thead>

                    <tbody id="ventas">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once("../layout/pie-pagina.php") ?>