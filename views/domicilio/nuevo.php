<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Nuevo Domicilio</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Domicilio&a=insertar&id=<?php echo $id; ?>">
                            <div class="mb-4">
                                <label for="calle" class="form-label">Calle</label>
                                <input type="text" class="form-control" name="calle" id="calle" />
                            </div>
                            <div class="mb-4">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" name="numero" id="numero" />
                            </div>
                            <div class="mb-4">
                                <label for="piso" class="form-label">Piso</label>
                                <input type="text" class="form-control" name="piso" id="piso" />
                            </div>
                            <div class="mb-4">
                                <label for="puerta" class="form-label">Puerta</label>
                                <input type="text" class="form-control" name="puerta" id="puerta" />
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