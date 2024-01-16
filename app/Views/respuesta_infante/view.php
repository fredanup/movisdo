<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>


                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <?php
                if (isset($infantes)) {
                ?>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/respuestaOfVisitaOfGestanteTab">Gestantes</a></li>
                        <li class="breadcrumb-item active">Infantes</li>
                    </ol>
                    <a href="<?php echo base_url(); ?>/createReporteOfInfantes" class="btn btn-secondary">+ Reporte de infantes</a>
                <?php
                }
                ?>

                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de respuestas de infante
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Infante</th>
                                <th>Categoria</th>
                                <th>Fecha de visita</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Detalle</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach ($respuestas_infantes as $row) { ?>

                                <tr>
                                    <td><?php echo $i = $i + 1; ?></td>
                                    <?php
                                    if (isset($infantes)) {
                                        foreach ($visitas_infantes as $row1) {
                                            if ($row['id_visita_infante'] == $row1['id']) {
                                                foreach ($infantes as $row4) {
                                                    if ($row1['id_infante'] == $row4['id']) {
                                                        foreach ($alternativas as $row2) {
                                                            if ($row['id_alternativa'] == $row2['id']) {
                                                                foreach ($preguntas as $row3) {
                                                                    if ($row2['id_pregunta'] == $row3['id']) {
                                                                    ?>
                                                                        <td><?php echo $row4['nombre'] . ' ' . $row4['apPaterno'] . ' ' . $row4['apMaterno']; ?></td>
                                                                        <td><?php echo $row4['categoria']; ?></td>
                                                                        <td><?php echo date("d-m-Y", strtotime($row1['fecha'])); ?></td>
                                                                        <td><?php echo $row3['pregunta']; ?></td>
                                                                        <td><?php echo $row2['alternativa']; ?></td>
                                                                        <td><?php echo $row['detalle']; ?></td>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if (isset($infante)) {
                                        foreach ($alternativas as $row2) {
                                            if ($row['id_alternativa'] == $row2['id']) {
                                                foreach ($preguntas as $row3) {
                                                    if ($row2['id_pregunta'] == $row3['id']) {
                                                        ?>
                                                        <td><?php echo $infante['nombre'] . ' ' . $infante['apPaterno'] . ' ' . $infante['apMaterno']; ?></td>
                                                        <td><?php echo $infante['categoria']; ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($visita_infante['fecha'])); ?></td>
                                                        <td><?php echo $row3['pregunta']; ?></td>
                                                        <td><?php echo $row2['alternativa']; ?></td>
                                                        <td><?php echo $row['detalle']; ?></td>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    ?>

                                    

                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>