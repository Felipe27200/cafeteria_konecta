<?php require_once("../layout/encabezado.php") ?>
    <div class="container-fluid">
        <h1 class="text-center mt-4">Categorías</h1>

        <div class="row d-flex">
            <div class="col-md-6">
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
                <table class="table table-bordered">
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