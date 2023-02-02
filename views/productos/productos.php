<?php require_once("../layout/encabezado.php") ?>
    <div class="container-fluid">
        <?php require_once "../layout/nav.php" ?>

        <h1 class="text-center my-4">Productos</h1>

        <div class="row d-flex">
            <div class="col-md-3 mb-3">
                <form id="agregarProducto">
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría: </label>

                        <select name="categoria_id" id="categoria_id" class="form-select" required>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Producto: </label>
                        <input type="text" id="nombre" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="referencia" class="form-label">Referencia Producto: </label>
                        <input type="text" id="referencia" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio Producto: </label>
                        <input type="number" id="precio" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso Producto: </label>
                        <input type="number" id="peso" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock Producto: </label>
                        <input type="number" id="stock" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_creacion" class="form-label">Fecha Creación Producto: </label>
                        <input type="date" id="fecha_creacion" required class="form-control"/>
                    </div>

                    <div class="d-grid gap-2">
                        
                        <input type="submit" value="Agregar Producto" class="btn btn-primary">

                        <button class="btn btn-secondary cancelProducto" type="button">
                            Cancelar Edición
                        </button>
                        
                        <input type="hidden" value="registrarProducto" id="metodo">
                        <input type="hidden" id="productoId">
                    </div>                    
                </form>            
            </div>

            <div class="col-md-9">
                <table class="table table-bordered" id="table_productos">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Stock</th>
                            <th>Fecha Creación</th>

                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody id="productos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once("../layout/pie-pagina.php") ?>