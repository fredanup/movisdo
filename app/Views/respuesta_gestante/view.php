<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>

                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <?php
                if (isset($encuestados)) {
                ?>
                
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Gestantes</li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/respuestaOfVisitaOfInfanteTab">Infantes</a></li>
                        
                    </ol>
                    <a href="<?php echo base_url(); ?>/createReporteOfGestantes" class="btn btn-secondary">+ Reporte de gestantes</a>
                <?php
                }

                ?>

                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de respuestas de gestante
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Gestante</th>
                                <th>Fecha de parto</th>
                                <th>Fecha de visita</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Detalle</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($respuestas_gestantes as $row) { ?>

                                <tr>
                                    <td><?php echo $i = $i + 1; ?></td>
                                    <?php
                                    if (isset($encuestados)) {
                                        foreach ($visitas_gestantes as $row1) {
                                            if ($row['id_visita_gestante'] == $row1['id']) {
                                                foreach ($gestaciones as $row4) {
                                                    if ($row1['id_gestante'] == $row4['id']) {
                                                        foreach ($encuestados as $row5) {
                                                            if ($row4['id_encuestado'] == $row5['id']) {
                                                                foreach ($alternativas as $row2) {
                                                                    if ($row['id_alternativa'] == $row2['id']) {
                                                                        foreach ($preguntas as $row3) {
                                                                            if ($row2['id_pregunta'] == $row3['id']) {
                                    ?>
                                                                                <td><?php echo $row5['nombre'] . ' ' . $row5['apPaterno'] . ' ' . $row5['apMaterno']; ?></td>
                                                                                <td><?php echo date("d-m-Y", strtotime($row4['fecha_parto'])); ?></td>
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
                                        }
                                    }
                                    if (isset($encuestado)) {
                                        foreach ($alternativas as $row2) {
                                            if ($row['id_alternativa'] == $row2['id']) {
                                                foreach ($preguntas as $row3) {
                                                    if ($row2['id_pregunta'] == $row3['id']) {
                                                        ?>
                                                        <td><?php echo $encuestado['nombre'] . ' ' . $encuestado['apPaterno'] . ' ' . $encuestado['apMaterno']; ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($gestacion['fecha_parto'])); ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($visita_gestante['fecha'])); ?></td>
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