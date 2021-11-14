<?php include 'views/partials/nav.php' ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col"><h3><a href="index.php?c=Cliente&a=nuevoCliente"><i class="fas fa-plus m-2 p-2">Cliente</i></a></h3></div>
            <div class="col"><h3><a href="index.php?c=Tecnico&a=nuevoTecnico"><i class="fas fa-plus m-2 p-2">Técnico</i></a></h3></div>
            <div class="col"><h3><a href="index.php?c=Gestor&a=nuevoGestor"><i class="fas fa-plus m-2 p-2">Gestor</i></a></h3></div>
        </div>
    </div>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">ROL</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["usuarios"] as $dato):?>
                    <tr>
                        <th scope="row"><?php echo $dato["idusuario"]; ?></th>
                        <td><?php echo $dato["nombre"]; ?></td>
                        <td><?php echo $dato["apellidos"]; ?></td>
                        <td><?php echo $dato["dni"]; ?></td>
                        <td><?php echo $dato["email"]; ?></td>
                        <td><?php echo $dato["telefono"]; ?></td>
                        <td><?php echo $dato["rol"]; ?></td>
                        <td>
                            <a href="index.php?c=Usuario&a=mostrarUsuario&id=<?php echo $dato["idusuario"]; ?>"><i class="far fa-eye"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Usuario&a=modificar&id=<?php echo $dato["idusuario"]; ?>"><i class="far fa-edit"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Usuario&a=eliminar&id=<?php echo $dato["idusuario"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>
<?php include 'views/partials/footer.php' ?>