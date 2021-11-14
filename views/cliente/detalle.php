<?php include 'views/partials/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col text-center"><h3><b>CLIENTE: <?php echo $data["usuario"]["nombre"].' '.$data["usuario"]["apellidos"]; ?></b></h3>  </div>
    </div>
    <div class="row">
        <div class="col text-center"><h5><a href="index.php?c=Cliente&a=modificar&id=<?php echo $data["usuario"]["idusuario"]; ?>"><i class="fas fa-edit m-2 p-2">Modificar</i></a></h5></div>
        <div class="col text-center"><h5><a data-bs-toggle="modal" data-bs-target="#confirmUsuario"><i class="fas fa-trash-alt m-2 p-2">Eliminar</i></a></h5></div>
        
        <div class="modal fade" id="confirmUsuario" tabindex="-1" aria-labelledby="eliminarUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark third-text">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="eliminarUsuarioModalLabel"><b>Atención</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Se eliminarán los datos del cliente con ID "<?php echo $data["cliente"]["idcliente"]; ?>".</p>
                        <p>¿Continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn secondary-button" data-bs-dismiss="modal">No</button>
                        <a href="index.php?c=Cliente&a=eliminar&id=<?php echo $data["usuario"]["idusuario"]; ?>" class="btn primary-button">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col"><h4>Datos personales</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Nombre: </b><?php echo $data["usuario"]["nombre"]; ?></div>
        <div class="col-md mb-2 campo"><b>Apellidos: </b><?php echo $data["usuario"]["apellidos"]; ?></div>
        <div class="col-md mb-2 campo"><b>DNI: </b><?php echo $data["usuario"]["dni"]; ?></div>
    </div>
    <div class="row">
        <div class="col"><h4>Datos de usuario</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Usuario: </b><?php echo $data["usuario"]["username"]; ?></div>
        <div class="col-md mb-2 campo"><b>ID Cliente: </b><?php echo $data["cliente"]["idcliente"];  ?></div><!-- AQUI EL ID CLIENTE -->
        <div class="col-md mb-2 campo"><b>Fecha registro: </b><?php echo $data["cliente"]["fecha_registro"]; ?></div><!-- AQUI LA FECHA CLIENTE -->
    </div>
    <div class="row">
        <div class="col"><h4>Datos de contacto</h4></div>
    </div>
    <div class="row datos">
        <div class="col-md mb-2 campo"><b>Email: </b><?php echo $data["usuario"]["email"]; ?></div>
        <div class="col-md mb-2 campo"><b>Telefono: </b><?php echo $data["usuario"]["telefono"]; ?></div>
    </div>
    <div class="row">
        <div class="col-md mb-2 campo"><b>Domicilio/s:</b></div>
    </div>
        <div class="row">
            <div class="col text-center"><h3><a href="index.php?c=Domicilio&a=nuevoDomicilio&id=<?php echo $data["cliente"]["idcliente"]; ?>"><i class="fas fa-plus m-2 p-2">Domicilio</i></a></h3></div>
        </div>
    <section>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["domicilios"] as $domicilio):?>
                    <tr>
                        <th scope="row"><?php echo $domicilio["iddomicilio"]; ?></th>
                        <td>
                            C/<?php echo $domicilio["calle"]; ?>
                            -Nº<?php echo $domicilio["numero"]; ?>
                            -<?php echo $domicilio["piso"]; ?>º
                            <?php echo $domicilio["puerta"]; ?></td>
                        <td>
                            <a href="index.php?c=Domicilio&a=mostrarDomicilio&id=<?php echo $domicilio["iddomicilio"]; ?>"><i class="far fa-eye"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Usuario&a=modificar&id=<?php echo $domicilio["iddomicilio"]; ?>"><i class="far fa-edit"></i></a>
                            &nbsp;&nbsp;
                            <a data-bs-toggle="modal" data-bs-target="#confirmDom<?php echo $domicilio["iddomicilio"];?>"><i class="far fa-trash-alt"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmDom<?php echo $domicilio["iddomicilio"];?>" tabindex="-1" aria-labelledby="eliminarDomicilioModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarDomicilioModalLabel">Atención</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Se eliminarán los datos.</p>
                                            <p>¿Continuar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn secondary-button" data-bs-dismiss="modal">No</button>
                                            <a href="index.php?c=Domicilio&a=eliminar&id=<?php echo $domicilio["iddomicilio"]; ?>" class="btn primary-button">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["partes"] as $parte):?>
                    <tr>
                        <th scope="row"><?php echo $parte["idparte"]; ?></th>
                        <td>
                            <?php echo $parte["idproducto"]; ?>
                        </td>
                        <td>
                            <?php echo $parte["fecha_parte"]; ?>
                        </td>
                        <td>
                            <a href="index.php?c=Parte&a=mostrarParte&id=<?php echo $parte["idparte"]; ?>"><i class="far fa-eye"></i></a>
                            &nbsp;&nbsp;
                            <a data-bs-toggle="modal" data-bs-target="#confirmParte<?php echo $parte["idparte"];?>"><i class="far fa-trash-alt"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmParte<?php echo $parte["idparte"];?>" tabindex="-1" aria-labelledby="eliminarParteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarParteModalLabel">Atención</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Se eliminarán los datos.</p>
                                            <p>¿Continuar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn secondary-button" data-bs-dismiss="modal">No</button>
                                            <a href="index.php?c=Parte&a=eliminar&id=<?php echo $parte["idparte"]; ?>" class="btn primary-button">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    
</div>
<?php include 'views/partials/footer.php' ?>
