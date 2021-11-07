<?php include 'views/partials/nav.php' ?>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?c=Usuario&a=insertar">
                            <div class="mb-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" />
                            </div>
                            <div class="mb-4">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" />
                            </div>
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" />
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">email</label>
                                <input type="text" class="form-control" name="email" id="email" />
                            </div>
                            <div class="mb-4">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" />
                            </div>
                            <div class="mb-4">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" name="dni" id="dni" />
                            </div>
                            <div class="mb-4">
                                <label for="rol" class="form-label">ROL</label>
                                <input type="text" class="form-control" name="rol" id="rol" />
                            </div>
                            <div class="mb-4">
                                <input type="checkbox" class="form-check-input" id="mostrar" />
                                <label for="remember" class="form-label">Mostrar</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn text-light submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'views/partials/footer.php' ?>