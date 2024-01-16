<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <a href="<?php echo base_url(); ?>/create_coordinador" class="btn btn-secondary">+ Añadir</a>
                </p>
               
            </div>


            <div class="card mb-4">
                <div class="card-header">
                    
                    <i class="fas fa-table me-1" ></i>
                    Lista de coordinadores
                    
                </div>
                <div>
                
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Dni</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Promotores</th>
                                <!--
                                <th colspan="2">Acciones</th>
                                -->
                                <th colspan="1">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0;
                            foreach ($coordinadores as $row) { ?>

                                <tr>
                                    <td><?php echo $i=$i+1; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apPaterno']; ?></td>
                                    <td><?php echo $row['apMaterno']; ?></td>
                                    <td><?php echo $row['dni']; ?></td>
                                    <td><?php echo $row['celular']; ?></td>
                                    <td><?php echo $row['direccion']; ?></td>
                                    <td>
                                            <a href="<?php echo base_url() . '/viewPromotoresByCoordinadorId/' . $row['id']; ?>" class="btn btn-link">Promotores a cargo</a>
                                    </td>


                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_coordinador/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo base_url() . '/delete_one_coordinador/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
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