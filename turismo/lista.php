<?php 
    require_once 'libreria.php';
    $arrReservas = obtenerLista();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
</head>
<body>
    <h1>Listado de Reservas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Cabaña</th>
                <th>Noches</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arrReservas as $reserva) { ?>
            <tr>
                <td><?php echo $reserva["nombre"]; ?></td>
                <td><?php echo $reserva["correo"]; ?></td>
                <td><?php echo $reserva["cabania"]["descripcion"]; ?></td>
                <td><?php echo $reserva["noches"]; ?></td>
                <td><?php echo $reserva["cabania"]["precio"]; ?></td>
                <td><?php echo $reserva["total"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
