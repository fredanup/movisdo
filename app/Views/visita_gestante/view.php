<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>


                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <?php
                if (isset($encuestados) && isset($gestaciones)) {
                ?>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Gestantes</li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/visitaInfanteTab">Infantes</a></li>

                    </ol>
                <?php
                }
                ?>

            
                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de gestantes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Gestante</th>
                                <th>Fecha</th>
                                <th>Modalidad de visita</th>
                                <th>Coordenadas</th>


                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($visitas_gestantes as $row) { ?>

                                <tr>
                                    <td><?php echo $i = $i + 1; ?></td>
                                    <?php
                                    if (isset($gestaciones) && isset($encuestados)) {
                                        foreach ($gestaciones as $row2) {
                                            if ($row['id_gestante'] == $row2['id']) {

                                                foreach ($encuestados as $row3) {
                                                    if ($row3['id'] == $row2['id_encuestado']) {
                                    ?>
                                                        <td><?php echo $row3['nombre'] . ' ' . $row3['apPaterno'] . ' ' . $row3['apMaterno']; ?></td>
                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if (isset($gestacion) && isset($encuestado)) {

                                        ?>
                                        <td><?php echo $encuestado['nombre'] . ' ' . $encuestado['apPaterno'] . ' ' . $encuestado['apMaterno']; ?></td>
                                    <?php

                                    }
                                    ?>

                                    <td><?php echo date("d-m-Y", strtotime($row['fecha']));?></td>
                                    <td><?php
                                        if($row['mod_visita']=="Remoto")
                                        {
                                            ?>
                                            <a href="<?php echo base_url() . '/viewLlamadasByVisitaOfGestanteId/' . $row['id']; ?>">Remoto</a>
                                            <?php

                                        }
                                        else{
                                            echo $row['mod_visita']; 
                                        }
                                     
                                     ?></td>
                                    <td><?php
                                            
                                            
                                            echo 'Latitud: '.$row['latitud'];?><br>
                                        <?php 
                                            echo 'Longitud: '.$row['longitud'];?>
                                    </td> 
                                    
                                    
                                    
                                    <td>
                                        <a href="<?php echo base_url() . '/viewRespuestasByVisitaOfGestanteId/' . $row['id']; ?>" class="btn btn-link">Ver respuestas</a>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>