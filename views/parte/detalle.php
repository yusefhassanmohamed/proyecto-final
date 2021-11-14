<?php include 'views/partials/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col text-center"><h3><b>TÉCNICO: <?php echo $data["usuario"]["nombre"].' '.$data["usuario"]["apellidos"]; ?></b></h3>  </div>
    </div>
    <div class="row">
        <div class="col text-center"><h5><a href="index.php?c=Parte&a=modificar&id=<?php echo $data["parte"]["idparte"]; ?>"><i class="fas fa-edit m-2 p-2">Modificar</i></a></h5></div>
        <div class="col text-center"><h5><a data-bs-toggle="modal" data-bs-target="#confirmParte"><i class="fas fa-trash-alt m-2 p-2">Eliminar</i></a></h5></div>
        
        <div class="modal fade" id="confirmParte" tabindex="-1" aria-labelledby="eliminarParteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark third-text">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="eliminarParteModalLabel"><b>Atención</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Se eliminarán los datos del parte con ID "<?php echo $data["parte"]["idparte"]; ?>".</p>
                        <p>¿Continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-button" data-bs-dismiss="modal">No</button>
                        <a href="index.php?c=Parte&a=eliminar&id=<?php echo $data["parte"]["idparte"]; ?>" class="btn primary-button">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col"><h4>Datos de usuario</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Nombre: </b><?php echo $data["usuario"]["nombre"]; ?></div>
        <div class="col-md mb-2 campo"><b>Apellidos: </b><?php echo $data["usuario"]["apellidos"]; ?></div>
        <div class="col-md mb-2 campo"><b>DNI: </b><?php echo $data["usuario"]["dni"]; ?></div>
        <div class="col-md mb-2 campo"><b>ID Cliente: </b><?php echo $data["cliente"]["idcliente"];  ?></div>
    </div>
    <div class="row">
        <div class="col"><h4>Datos de parte</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Producto: </b><?php echo $data["producto"]["nombre"].' '.$data["producto"]["marca"]; ?></div>
        <div class="col-md mb-2 campo"><b>Fecha de parte: </b><?php echo $data["parte"]["fecha_parte"];  ?></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Descripción: </b><?php echo $data["parte"]["descripcion"]; ?></div>
    </div>
    <div class="row">
        <div class="col"><h4>Datos de contacto</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Email: </b><?php echo $data["usuario"]["email"]; ?></div>
        <div class="col-md mb-2 campo"><b>Telefono: </b><?php echo $data["usuario"]["telefono"]; ?></div>
        <div class="col-md mb-2 campo"><b>Domicilio: </b>
            C/<?php echo $data["domicilio"]["calle"]; ?>
            -Nº<?php echo $data["domicilio"]["numero"]; ?>
            -<?php echo $data["domicilio"]["piso"]; ?>º
            <?php echo $data["domicilio"]["puerta"]; ?></td>
        </div>
    </div>
    
</div>
<?php include 'views/partials/footer.php' ?>