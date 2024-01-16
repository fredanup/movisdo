<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                
                <a href="<?php echo base_url(); ?>/create_promotor" class="btn btn-secondary">+ Añadir</a>

                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de promotores
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
                                <th>Coordinador</th>
                              
                                
                                <th>Estado</th>
                                <th>Encuestados</th>
                                <th colspan="1">Acciones</th>
                                <!--
                                <th colspan="2">Acciones</th>
                                -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($promotores as $row) { ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apPaterno']; ?></td>
                                    <td><?php echo $row['apMaterno']; ?></td>
                                    <td><?php echo $row['dni']; ?></td>                            
                                    <td><?php echo $row['celular']; ?></td>
                                    <td><?php echo $row['direccion']; ?></td>
                                    <?php  
                                        if(isset($coordinadores)){
                                            foreach ($coordinadores as $row2){
                                                if($row2['id'] == $row['id_coordinador']){
                                                    ?>
                                                    <td><?php echo $row2['nombre'].' '.$row2['apPaterno'].' '.$row2['apMaterno']; ?></td>
                                                    <?php
                                                }
                                            }
                                        }
                                        if(isset($coordinador)){
                                            
                                                ?>
                                                <td><?php echo $coordinador['nombre'].' '.$coordinador['apPaterno'].' '.$coordinador['apMaterno']; ?></td>
                                                <?php
                                            
                                        }
                                    
                                    ?>
                                    
                                    <td><?php
                                    if($row['activo']==1) {
                                        echo 'Activo'; 
                                    }
                                    else {
                                        echo 'Inactivo';
                                    }

                                    ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . '/viewEncuestadosByPromotorId/' . $row['id']; ?>" class="btn btn-link">Encuestados asignados</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_promotor/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo base_url() . '/delete_one_promotor/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
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
  