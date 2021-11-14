<?php include 'views/partials/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col text-center"><h3><b>DOMICILIO: <?php echo $data["domicilio"]["iddomicilio"].'/Cliente: '.$data["domicilio"]["idcliente"]; ?></b></h3>  </div>
    </div>
    <div class="row">
        <div class="col text-center"><h5><a href="index.php?c=Domicilio&a=modificar&id=<?php echo $data["domicilio"]["iddomicilio"]; ?>"><i class="fas fa-edit m-2 p-2">Modificar</i></a></h5></div>
        <div class="col text-center"><h5><a href="index.php?c=Domicilio&a=eliminar&id=<?php echo $data["domicilio"]["iddomicilio"]; ?>"><i class="fas fa-trash-alt m-2 p-2">Eliminar</i></a></h5></div>
    </div>
    <div class="row">
        <div class="col"><h4>Dirección</h4></div>
    </div>
    <div class="row">
        <div class="col-md mb-2 campo"><b>Calle: </b><?php echo $data["domicilio"]["calle"]; ?></div>
        <div class="col-md mb-2 campo"><b>Numero: </b><?php echo $data["domicilio"]["numero"]; ?></div>
        <div class="col-md mb-2 campo"><b>Piso: </b><?php echo $data["domicilio"]["piso"]; ?></div>
        <div class="col-md mb-2 campo"><b>Puerta: </b><?php echo $data["domicilio"]["puerta"]; ?></div>
    </div>
        <div class="row">
            <div class="col text-center"><h3><a href="index.php?c=Producto&a=nuevoProducto&id=<?php echo $data["domicilio"]["iddomicilio"]; ?>"><i class="fas fa-plus m-2 p-2">Producto</i></a></h3></div>
        </div>
    <section>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["productos"] as $producto):?>
                    <tr>
                        <th scope="row"><?php echo $producto["idproducto"]; ?></th>
                        <td><?php echo $producto["nombre"]; ?></td>
                        <td><?php echo $producto["marca"]; ?></td>
                        <td><?php echo $producto["fecha_registro"]; ?></td>
                        <td>
                            <a href="index.php?c=Producto&a=mostrarProducto&id=<?php echo $producto["idproducto"]; ?>"><i class="far fa-eye"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Producto&a=modificar&id=<?php echo $producto["idproducto"]; ?>"><i class="far fa-edit"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Producto&a=eliminar&id=<?php echo $producto["idproducto"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>
</div>
<?php include 'views/partials/footer.php' ?>