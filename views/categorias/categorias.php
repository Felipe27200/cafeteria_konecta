<?php require_once("../layout/encabezado.php") ?>
    <div class="container-fluid">
        <?php require_once "../layout/nav.php" ?>
        <h1 class="text-center my-4">Categorías</h1>

        <div class="row d-flex">
            <div class="col-md-6 mb-3">
                <form id="agregarCategoria">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre Categoría: </label>
                        <input type="text" id="nombre_categoria" required class="form-control"/>
                    </div>

                    <div class="d-grid gap-2">
                        
                        <input type="submit" value="Agregar Categoría" class="btn btn-primary">

                        <button class="btn btn-secondary cancelCategoria" type="button">
                            Cancelar Edición
                        </button>
                        
                        <input type="hidden" value="registrarCategoria" id="metodo">
                        <input type="hidden" id="categoriaId">
                    </div>                    
                </form>            
            </div>

            <div class="col-md-6">
                <table class="table table-bordered" id="table_categorias">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody id="categorias">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once("../layout/pie-pagina.php") ?>