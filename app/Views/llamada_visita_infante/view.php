<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>        
                </p>
            </div>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de llamadas
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                
                                <th>Nro</th>
                                <th>Fecha de llamada</th>
                                <th>Duración de llamada</th>
                            
                  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                
                                foreach ($llamadas_visita_infante as $row) { ?>

                                <tr>
                                    <td><?php echo $i=$i+1; ?></td>
                                    <td><?php echo $row['datos_llamada']; ?></td>
                                    <td><?php echo $row['duracion']; ?></td>
                                    
                                    <td>
                                        <a href="<?php echo base_url() . '/viewRespuestasByVisitaOfInfanteId/' . $visita_infante['id']; ?>" class="btn btn-link">Ver respuestas</a>
                                    </td>
                                  

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
  