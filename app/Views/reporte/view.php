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
                    Lista de reportes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th colspan="1">Link de descarga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <td>1</td>
                        <td>
                            <a href="<?php echo base_url(); ?>/createPrimerReporte"><i class="fas fa-file-download"></i>Reporte de gestantes</a>
                        </td>
                        </tbody>
                        <tbody>
                        <td>2</td>
                        <td>
                        <a href="<?php echo base_url(); ?>/createSegundoReporte"><i class="fas fa-file-download"></i>Reporte de recién nacidos</a>
                        </td>

                        </tbody>
                        <tbody>
                        <td>3</td>
                        <td>
                        <a href="<?php echo base_url(); ?>/createTercerReporte"><i class="fas fa-file-download"></i>Reporte de menores de 6 meses</a>
                        </td>

                        </tbody>
                        <tbody>
                        <td>4</td>
                        <td>
                        <a href="<?php echo base_url(); ?>/createCuartoReporte"><i class="fas fa-file-download"></i>Reporte de infantes de 6 a 11 meses</a>
                        </td>
                        </tbody>
                        <tbody>
                        <td>5</td>
                        <td>
                        <a href="<?php echo base_url(); ?>/createQuintoReporte"><i class="fas fa-file-download"></i>Reporte de infantes de 1 a 3 años</a>
                        </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
  