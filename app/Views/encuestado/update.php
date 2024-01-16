<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/update_encuestado">
                <?= csrf_field() ?>


                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->
                <input type="hidden" name="id" value="<?php echo $encuestado['id']; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nombre" type="text" placeholder="Enter your first name" value="<?php echo $encuestado['nombre']; ?>" name="nombre" required />
                            <label for="nombre">Nombres</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apPaterno" type="text" placeholder="Enter your first name" value="<?php echo $encuestado['apPaterno']; ?>" name="apPaterno" required />
                            <label for="apPaterno">Apellido paterno</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apMaterno" type="text" placeholder="Enter your last name" value="<?php echo $encuestado['apMaterno']; ?>" name="apMaterno" required />
                            <label for="apMaterno">Apellido materno</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" value="<?php echo $encuestado['fecha_nacimiento']; ?>" name="fecha_nacimiento" required />
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="dni" type="text" placeholder="Enter your first name" value="<?php echo $encuestado['dni']; ?>" name="dni" required />
                            <label for="dni">Dni</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="celular" type="tel" placeholder="Enter your last name" value="<?php echo $encuestado['celular']; ?>" name="celular" required />
                            <label for="celular">Celular</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="direccion" type="text" placeholder="Enter your first name" value="<?php echo $encuestado['direccion']; ?>" name="direccion" required />
                            <label for="direccion">Dirección</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="ref_vivienda" type="text" placeholder="Enter your last name" value="<?php echo $encuestado['ref_vivienda']; ?>" name="ref_vivienda" required />
                            <label for="ref_vivienda">Lugar de referencia</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="categoria" placeholder="Enter your last name" name="categoria" required>
                                <option value="">Categoría</option>
                                <?php
                                    for ($i = 0; $i < 3; $i++) {
                                        
                                        if($i==0){
                                            if ($encuestado['categoria'] == "Gestante"){
                                                ?>
                                                <option selected value="Gestante">Gestante</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Gestante">Gestante</option>
                                                <?php
                                            }
                                        }
                                        if($i==1){
                                            if ($encuestado['categoria'] == "Apoderado"){
                                                ?>
                                                <option selected value="Apoderado">Apoderado</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Apoderado">Apoderado</option>
                                                <?php
                                            }
                                        }                                        
                                    }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="id_promotor" type="text" name="id_promotor" required>
                                <option value="">Seleccionar promotor</option>

                                <?php
                                foreach ($promotores as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>" <?php
                                                                                if ($row['id'] == $encuestado['id_promotor']) {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>
                                        <?php
                                        echo $row['nombre'] . ' ' . $row['apPaterno'] . ' ' . $row['apMaterno'];
                                        ?>
                                    <?php } ?>
                                    </option>

                            </select>

                        </div>

                    </div>
                </div>



                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="submit">Aceptar</button></div>
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/encuestadoTab/'; ?>">Cancelar</a></div>
                </div>
            </form>
        </div>
    </main>