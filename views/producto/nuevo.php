<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Nuevo Producto</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Producto&a=insertar&id=<?php echo $id; ?>">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" />
                            </div>
                            <div class="mb-4">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" name="marca" id="marca" />
                            </div>
                            <div class="mb-4">
                                <input type="checkbox" class="form-check-input" id="mostrar" />
                                <label for="remember" class="form-label">Mostrar</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn text-light submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'views/partials/footer.php' ?>