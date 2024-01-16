<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        
            <div>
               
                        
                <p>
                <h1 class="mt-4 display-6"><?php



echo $titulo; ?></h1>
                <?php
                if (isset($infantes)) {
                ?>
                <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/visitaGestanteTab">Gestante</a></li>
                        <li class="breadcrumb-item active">Infante</li>
                        
                </ol>
                <?php
                }
                ?>
               

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
                                <th>Infante</th>
                                <th>Fecha</th>
                                <th>Modalidad de visita</th>
                                <th>Coordenadas</th>                                                                
                              
                  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                
                                foreach ($visitas_infantes as $row) { ?>

                                <tr>
                                    <td><?php echo $i=$i+1; ?></td>
                                    <?php 
                                        if(isset($infantes)){
                                            foreach ($infantes as $row2){
                                                if($row['id_infante']==$row2['id']){
                                                    ?>
                                                     <td><?php echo $row2['nombre'].' '.$row2['apPaterno'].' '.$row2['apMaterno']; ?></td>
                                                    <?php
                                                }
                                            }
                                        }
                                        if(isset($infante)){
                                            ?>
                                            <td><?php echo $infante['nombre'].' '.$infante['apPaterno'].' '.$infante['apMaterno']; ?></td>
                                           <?php
                                        }
                                        
                                    ?>
                                   
                                    <td><?php
                                    
                                    echo date("d-m-Y", strtotime($row['fecha'])); ?></td>
                                    <td><?php
                                        if($row['mod_visita']=="Remoto")
                                        {
                                            ?>
                                            <a href="<?php echo base_url() . '/viewLlamadasByVisitaOfInfanteId/' . $row['id']; ?>">Remoto</a>
                                            <?php

                                        }
                                        else{
                                            echo $row['mod_visita']; 
                                        }
                                     
                                     ?></td>
                                    <td><?php
                                            
                                            
                                            echo 'Latitud: '.$row['latitud'];?><br>
                                        <?php 
                                            echo 'Longitud: '.$row['longitud'];?></td> 
                                    
                                    <td>
                                        <a href="<?php echo base_url() . '/viewRespuestasByVisitaOfInfanteId/' . $row['id']; ?>" class="btn btn-link">Ver respuestas</a>
                                    </td>
                                  

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
  