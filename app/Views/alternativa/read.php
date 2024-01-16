<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div>
                <p>
                <h1 class="mt-4 display-6"><?php echo $titulo; ?></h1>
                <a href="<?php echo base_url().'/create_alternativa_pregunta/'.$id_pregunta?>" class="btn btn-secondary">+ Añadir</a>

                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lista de alternativas
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Alternativa</th>
                                                 
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0;
                            foreach ($alternativas as $row) { ?>

                                <tr>
                                    <td><?php echo $i=$i+1; ?></td>
                                    <td><?php echo $row['alternativa']; ?></td>                                    
                                    
                                                                       
                                    <td>
                                        <a href="<?php echo base_url() . '/select_one_alternativa/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-edit"></i></a>
                                        </td>
                                        <td>
                                        <a href="<?php echo base_url() . '/delete_one_alternativa/' . $row['id']; ?>" class="btn btn-link"><i class="far fa-trash-alt"></i></a>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
  