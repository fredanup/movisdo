<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <a href="<?php echo base_url(); ?>/create_encuestado" class="btn btn-secondary">+ Añadir</a>

                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de encuestados
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Dni</th>
                                <th>Celular</th>

                                <th>Promotor</th>
                                <th>Categoría</th>
                                <th>Infantes/<br>Gestantes</th>
                                <th colspan="1">Acciones</th>
                                <!--
                                <th colspan="2">Acciones</th>
-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($encuestados as $row) { ?>

                                <tr>
                                    <td><?php echo $i = $i + 1; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apPaterno']; ?></td>
                                    <td><?php echo $row['apMaterno']; ?></td>
                                    <td><?php echo $row['dni']; ?></td>
                                    <td><?php echo $row['celular']; ?></td>


                                    <td><?php
                                        if(isset($promotores)){
                                            foreach ($promotores as $row2) {
                                                if ($row2['id'] == $row['id_promotor']) {
                                                    echo $row2['nombre'] . ' ' . $row2['apPaterno'] . ' ' . $row2['apMaterno'];
                                                }
                                            }
                                        }
                                        if(isset($promotor)){
                                            echo $promotor['nombre'] . ' ' . $promotor['apPaterno'] . ' ' . $promotor['apMaterno'];
                                        }
                                        
                                        ?></td>
                                    <td><?php echo $row['categoria']; ?></td>
                                    <?php
                                    if ($row['categoria'] == 'Apoderado') {
                                    ?>
                                        <td>
                                            <a href="<?php echo base_url() . '/viewInfantesByEncuestadoId/' . $row['id']; ?>" class="btn btn-link">Historial de infantes</a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>
                                            <a href="<?php echo base_url() . '/viewGestacionesByEncuestadoId/' . $row['id']; ?>" class="btn btn-link">Historial de gestaciones</a>
                                        </td>
                                    <?php
                                    }
                                    ?>


                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_encuestado/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo base_url() . '/delete_one_encuestado/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                -->
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>