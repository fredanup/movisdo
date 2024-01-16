<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <a href="<?php echo base_url(); ?>/create_gestacion" class="btn btn-secondary">+ Añadir</a>
                <?php
                if (isset($encuestados)) {
                ?>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Gestaciones</li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/infanteTab">Infantes</a></li>

                    </ol>
                <?php
                }
                ?>


                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de gestaciones
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Gestante</th>
                                <th>Fecha de parto</th>
                                <th>Establecimiento de salud</th>
                                <th>Sexo del bebé</th>
                                <th>Visitas a gestante</th>
                                <th colspan="1">Acciones</th>
                                <!--
                                <th colspan="2">Acciones</th>
            -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($gestaciones as $row) { ?>

                                <tr>
                                    <td><?php echo $i = $i + 1; ?></td>
                                    <?php
                                    if (isset($encuestados)) {
                                        foreach ($encuestados as $row2) {
                                            if ($row['id_encuestado'] == $row2['id']) {
                                    ?>
                                                <td><?php echo $row2['nombre'] . ' ' . $row2['apPaterno'] . ' ' . $row2['apMaterno']; ?></td>
                                        <?php
                                            }
                                        }
                                    }
                                    if (isset($encuestado)) {
                                        ?>
                                        <td><?php echo $encuestado['nombre'] . ' ' . $encuestado['apPaterno'] . ' ' . $encuestado['apMaterno']; ?></td>
                                    <?php
                                    }

                                    ?>
                                    <td><?php echo date("d-m-Y", strtotime($row['fecha_parto']));?></td>
                                    <td><?php echo $row['estab_salud']; ?></td>
                                    <?php
                                    if ($row['sexo_bebe'] == 0) {
                                    ?>
                                        <td>Femenino</td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>Masculino</td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url() . '/viewVisitasOfGestantesByGestanteId/' . $row['id']; ?>" class="btn btn-link">Ver visitas</a>
                                    </td>

                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_gestacion/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo base_url() . '/delete_one_gestacion/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
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