<?php include 'views/partials/nav.php' ?>
<section>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["partes"] as $parte):?>
                    <tr>
                        <th scope="row"><?php echo $parte["idparte"]; ?></th>
                        <td><?php echo $parte["asunto"]; ?></td>
                        <td>
                            <?php
                                foreach($data["productos"] as $productoAux){
                                    if($parte['idproducto'] == $productoAux['idproducto']){
                                        $producto = $productoAux;
                                    }
                                }
                                echo $producto["nombre"].' '.$producto["marca"]; 
                            ?>
                        </td>
                        <td>
                            <?php
                                foreach($data["clientes"] as $clienteAux){
                                    if($parte['idcliente'] == $clienteAux['idcliente']){
                                        $cliente = $clienteAux;
                                        foreach($data["usuarios"] as $usuarioAux){
                                            if($cliente['idusuario'] == $usuarioAux['idusuario']){
                                                $usuario = $usuarioAux;
                                            }
                                        }
                                    }
                                }
                                echo $usuario["nombre"].' '.$usuario["apellidos"]; 
                            ?>
                        </td>
                        <td>
                            <?php
                                foreach($data["productos"] as $productoAux){
                                    if($parte['idproducto'] == $productoAux['idproducto']){
                                        $producto = $productoAux;
                                        foreach($data["domicilios"] as $domicilioAux){
                                            if($producto['iddomicilio'] == $domicilioAux['iddomicilio']){
                                                $domicilio = $domicilioAux;
                                            }
                                        }
                                    }
                                }
                                echo 'C/'.$domicilio["calle"].' -Nº'.$domicilio["numero"].'-'.$domicilio["piso"].'º'.$domicilio["puerta"];   
                            ?>
                        </td>
                        <td>
                            <a href="index.php?c=Parte&a=mostrarParte&id=<?php echo $parte["idparte"]; ?>"><i class="far fa-eye"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Parte&a=modificar&id=<?php echo $parte["idparte"]; ?>"><i class="far fa-edit"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Parte&a=eliminar&id=<?php echo $parte["idparte"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>
<?php include 'views/partials/footer.php' ?>