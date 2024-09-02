<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

$num_doc_est = $_GET['num_doc_est'];

include("../../conexion.php");

$query = "SELECT * FROM familiasalud WHERE num_doc_est = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $num_doc_est);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detalles de Encuestas</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style>
        .table th, .table td {
            white-space: nowrap;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
    <script>
        function confirmarEliminacion(id_prePostnatales) {
            if (confirm('¿Está seguro que desea eliminar esta encuesta? Esta acción no se puede deshacer.')) {
                window.location.href = 'deleteSurvey.php?id_prePostnatales=' + id_prePostnatales;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Detalles de Encuestas Aplicadas</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Fecha de Digitación</th>
                        <th>Municipio de Digitación</th>
                        <th>Nombre del Encuestador</th>
                        <th>Rol del Encuestador</th>
                        <th>Relacion con  Madre</th>
                        <th>Relacion con Padre</th>
                        <th>Relacion con Hermanos</th>
                        <th>Relacion con Abuelos</th>
                        <th>Relacion con Tios</th>
                        <th>Relacion con Otros familiares</th>
                        <th>Presenta Discapacidad</th>
                        <th>Situaciones que Afectan Aprendizaje</th>
                        <th>Beneficiario PAE</th>
                        <th>Momentos de comida dia</th>
                        <th>EPS del Estudiante</th>
                        <th>Nombre EPS</th>
                        <th>Sistema Afiliado</th>
                        
                        
                        
                        <th>Estado</th>
                        <th>Fecha de Aplicación</th>
                        <th>Fecha de Modificación</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        print_r($row);
                        echo "<tr>
                            <td>{$i}</td>
                            <td>{$row['id_salud_familiaSalud']}</td>
                            <td>{$row['fecha_dig_familiaSalud']}</td>
                            <td>{$row['mun_dig_familiaSalud']}</td>
                            <td>{$row['nombre_encuestador_familiaSalud']}</td>
                            <td>{$row['rol_encuestador_familiaSalud']}</td> ";
                        //     <td>{$row['edad_madre_prePostnatales']}</td>
                        //     <td>{$row['gestacion_meses_prePostnatales']}</td>
                        //     <td>{$row['embarazo_mama_prePostnatales']}</td>
                        //     <td>{$row['lactancia_mama_prePostnatales']}</td>
                        //     <td>{$row['gateo_prePostnatales']}</td>
                        //     <td>{$row['camino_prePostnatales']}</td>
                        //     <td>{$row['num_doc_est']}</td>
                        //     <td>{$row['estado_prePostnatales']}</td>
                        //     <td>{$row['fecha_alta_prePostnatales']}</td>
                        //     <td>{$row['fecha_edit_prePostnatales']}</td>
                        //     <td><a href='#' onclick='confirmarEliminacion({$row['id_prePostnatales']})'><img src='../../img/delete1.png' width=28 height=28></a></td>
                        // </tr>";
                        // $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$mysqli->close();
?>
