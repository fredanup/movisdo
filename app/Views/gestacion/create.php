<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/create_gestacion">               
                <?= csrf_field() ?>
                <div class="row mb-3">
                
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="id_encuestado" type="text" name="id_encuestado" required>
                                <option value="">Seleccione gestante</option>

                                <?php
                                foreach ($encuestados as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['nombre'] . ' ' . $row['apPaterno'] . ' ' . $row['apMaterno']; ?>
                                    <?php } ?>
                                    </option>

                            </select>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="fecha_parto" type="date" placeholder="Fecha de parto" name="fecha_parto" required />
                            <label for="fecha_parto">Fecha de parto</label>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="estab_salud" type="text" placeholder="Ingrese establecimiento de salud" name="estab_salud" required/>
                            <label for="estab_salud">Establecimiento de salud</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="sexo_bebe" type="text" name="sexo_bebe" required>
                                <option value="">Seleccione género</option>
                                <option value="1">Masculino</option>
                                <option value="0">Femenino</option>
                            </select>

                        </div>

                    </div>
                </div>

               
                    
                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->

                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="submit">Aceptar</button></div>
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/gestanteTab/'; ?>">Cancelar</a></div>
                    
                </div>
            </form>
        </div>
    </main>