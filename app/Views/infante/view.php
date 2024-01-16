<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <a href="<?php echo base_url(); ?>/create_infante" class="btn btn-secondary">+ Añadir</a>
                <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/gestanteTab">Gestantes</a></li>
                        <li class="breadcrumb-item active">Infantes</li>
                        
                </ol>
                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de infantes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Dni</th>
                                <th>Fecha de nacimiento</th>
                                <th>Sexo</th>
                                <th>Establecimiento de salud</th>
                                <th>Prematuro</th>
                                <th>Categoria</th>
                                <th>Visitas a infante</th>
                                
                                <!--
                                <th colspan="2">Acciones</th>
-->
                                <th colspan="1">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0;
                            foreach ($infantes as $row) { ?>

                                <tr>
                                    <td><?php echo $i=$i+1; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>                                    
                                    <td><?php echo $row['apPaterno']; ?></td>
                                    <td><?php echo $row['apMaterno']; ?></td>
                                    <td><?php echo $row['dni']; ?></td>                                    
                                    <td><?php echo date("d-m-Y", strtotime($row['fecha_nacimiento']));
                                     ?></td>
                                    <?php
                                        if($row['sexo']==0){
                                            ?>
                                            <td>Femenino</td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <td>Masculino</td>
                                            <?php
                                        }
                                    ?>
                                    <td><?php echo $row['estab_salud']; ?></td>   
                                    <?php
                                        if($row['prematuro']==0){
                                            ?>
                                            <td>No</td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <td>Si</td>
                                            <?php
                                        }
                                    ?>                                                                     
                                    <td><?php echo $row['categoria']; ?></td>
                                    
                                    <td>
                                        <a href="<?php echo base_url() . '/viewVisitasOfInfanteByInfanteId/' . $row['id']; ?>" class="btn btn-link">Ver visitas</a>
                                    </td>

                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_infante/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo base_url() . '/delete_one_infante/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
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
  