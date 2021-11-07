<?php include 'views/partials/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col text-center"><h3><b>PRODUCTO: <?php echo $data["producto"]["nombre"].' '.$data["producto"]["marca"]; ?></b></h3>  </div>
    </div>
    <div class="row">
        <div class="col text-center"><h5><a href="index.php?c=Producto&a=modificar&id=<?php echo $data["producto"]["idproducto"]; ?>"><i class="fas fa-edit m-2 p-2">Modificar</i></a></h5></div>
        <div class="col text-center"><h5><a href="index.php?c=Producto&a=eliminar&id=<?php echo $data["producto"]["idproducto"]; ?>"><i class="fas fa-trash-alt m-2 p-2">Eliminar</i></a></h5></div>
    </div>
    <div class="row">
        <div class="col"><h4>Datos producto</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Nombre: </b><?php echo $data["producto"]["nombre"]; ?></div>
        <div class="col-md mb-2 campo"><b>Marca: </b><?php echo $data["producto"]["marca"]; ?></div>
        <div class="col-md mb-2 campo"><b>Fecha de registro: </b><?php echo $data["producto"]["fecha_registro"]; ?></div>
    </div>
    <div class="row">
        <div class="col"><h4>Datos de usuario</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Usuario: </b><?php echo $data["cliente"]["idusuario"]; ?></div>
        <div class="col-md mb-2 campo"><b>ID Cliente: </b><?php echo $data["cliente"]["idcliente"];  ?></div><!-- AQUI EL ID CLIENTE -->
        <div class="col-md mb-2 campo"><b>Fecha registro: </b><?php echo $data["cliente"]["fecha_registro"]; ?></div><!-- AQUI LA FECHA CLIENTE -->
    </div>
    <div class="row">
        <div class="col"><h4>Datos de domicilio</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>ID: </b><?php echo $data["domicilio"]["iddomicilio"]; ?></div>
        <div class="col-md mb-2 campo"><b>Dirección: </b>
            C/<?php echo $data["domicilio"]["calle"]; ?>
            -Nº<?php echo $data["domicilio"]["numero"]; ?>
            -<?php echo $data["domicilio"]["piso"]; ?>º
            <?php echo $data["domicilio"]["puerta"]; ?>
        </div>
    </div>
</div>
<?php include 'views/partials/footer.php' ?>