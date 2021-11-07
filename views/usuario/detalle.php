<?php include 'views/partials/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col"><h2><?php echo $data["usuario"]["nombre"].' '.$data["usuario"]["apellidos"]; ?></h2>  </div>
    </div>
    <div class="row">
        <div class="col-md">Nombre: </div>
        <div class="col-md">Apellidos</div>
        <div class="col-md">DNI</div>
    </div>
    <div class="row">
        <div class="col-md">Usuario: </div>
        <div class="col-md">Email</div>
        <div class="col-md">Telefono</div>
    </div>
    <div class="row">
        <div class="col-md">Email: </div>
        <div class="col-md">Telefono</div>
        <div class="col-md">Domicilio</div>
    </div>
        <?php
                /* var_dump($dato); */
                echo "<tr>";
                echo "<td>".$data["usuario"]["nombre"]."</td>";
                echo "<td>".$data["usuario"]["apellidos"]."</td>";
                echo "<td>".$data["usuario"]["username"]."</td>";
                echo "<td>".$data["usuario"]["email"]."</td>";
                echo "<td>".$data["usuario"]["rol"]."</td>";
                echo "<td>".$data["usuario"]["telefono"]."</td>";
                echo "</tr>"; 
        ?>
    
</div>
<?php include 'views/partials/footer.php' ?>