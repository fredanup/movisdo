<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <a href="<?php echo base_url(); ?>/create_pregunta" class="btn btn-secondary">+ Añadir</a>
                </p>
            
            


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de preguntas
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Categoría</th>
                                <th>Área</th>
                                <th>Pregunta</th>
                                <th>Sugerencia</th>
                                <th colspan="2">Alternativas</th>
                                <!--
                                <th colspan="2">Acciones</th>
-->
                                <th colspan="1">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($preguntas as $row) { ?>
                                <tr>
                                    <td><?php echo $i = $i + 1; ?></td>
                                    <td><?php echo $row['categoria']; ?></td>
                                    <td><?php echo $row['area']; ?></td>
                                    <td><?php echo $row['pregunta']; ?></td>
                                    <td><?php echo $row['sug_temporal']; ?></td>

                                    <td><?php
                                        $j = 0;
                                        foreach ($alternativas as $row2) {

                                            if ($row2['id_pregunta'] == $row['id']) {
                                                $j = $j + 1;
                                                echo $j . '. ' . $row2['alternativa']; ?><br><?php
                                                                                            }
                                                                                        }
                                                                                                ?>


                                    <td>
                                        <a href="<?php echo base_url() . '/read_alternativa_pregunta/' . $row['id']; ?>" class="btn btn-link"><i class="fas fa-eye"></i></a>
                                    </td>

                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_pregunta/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo base_url() . '/delete_one_pregunta/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
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