<?php include 'views/partials/nav.php' ?>
<section>
        <div class="table-responsive col-lg-12">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Cliente </th>
                        <th scope="col">Producto </th>
                        <th scope="col">Descripcion </th>
                        <th scope="col">fecha de inicio</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data["trabajos"] as $trabajo):?>
                    <tr>
                        <th scope="row"><?php echo $trabajo["idtrabajo"]; ?></th>
                        <td>
                            <?php
                                foreach($data['partes'] as $parteAux){
                                    if($trabajo['idparte'] == $parteAux['idparte']){
                                        $parte = $parteAux;
                                    }
                                }
                                foreach($data['clientes'] as $clienteAux){
                                    if($parte['idcliente'] == $clienteAux['idcliente']){
                                        $cliente = $clienteAux;
                                    }
                                }
                                foreach($data['usuarios'] as $usuarioAux){
                                    if($cliente['idusuario'] == $usuarioAux['idusuario']){
                                        $usuario = $usuarioAux;
                                    }
                                }
                                echo $usuario['nombre']; 
                            ?>
                        </td>
                        <td><?php
                                foreach($data['partes'] as $parteAux){
                                    if($trabajo['idparte'] == $parteAux['idparte']){
                                        $parte = $parteAux;
                                        foreach($data['productos'] as $productoAux){
                                            if($parte['idproducto'] == $productoAux['idproducto']){
                                                $producto = $productoAux;
                                            }
                                        }
                                    }
                                }
                                echo $producto['nombre']; 
                            ?></td>
                            <td>
                            <?php
                                foreach($data['partes'] as $parteAux){
                                    if($trabajo['idparte'] == $parteAux['idparte']){
                                        $parte = $parteAux;
                                    }
                                }
                                echo $parte['descripcion']; 
                            ?>
                        </td>
                        <td><?php echo $trabajo['fecha_aceptado']; ?></td>
                        <td>
                            <a href="index.php?c=Usuario&a=mostrarUsuario&id=<?php echo $trabajo["idtrabajo"]; ?>"><i class="far fa-eye"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Usuario&a=modificar&id=<?php echo $trabajo["idtrabajo"]; ?>"><i class="far fa-edit"></i></a>
                            &nbsp;&nbsp;
                            <a href="index.php?c=Usuario&a=eliminar&id=<?php echo $trabajo["idtrabajo"]; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>
<?php include 'views/partials/footer.php' ?>