<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/update_promotor">
                <?= csrf_field() ?>


                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->
                <input type="hidden" name="id" value="<?php echo $promotor['id']; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nombre" type="text" placeholder="Enter your first name" value="<?php echo $promotor['nombre'];?>" name="nombre" required />
                            <label for="nombre">Nombres</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apPaterno" type="text" placeholder="Enter your first name" value="<?php echo $promotor['apPaterno'];?>" name="apPaterno" required />
                            <label for="apPaterno">Apellido paterno</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apMaterno" type="text" placeholder="Enter your last name" value="<?php echo $promotor['apMaterno'];?>" name="apMaterno" required />
                            <label for="apMaterno">Apellido materno</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" value="<?php echo $promotor['fecha_nacimiento'];?>" name="fecha_nacimiento" required />
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="dni" type="text" placeholder="Enter your first name" value="<?php echo $promotor['dni'];?>" name="dni" required />
                            <label for="dni">Dni</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="celular" type="tel" placeholder="Enter your last name" value="<?php echo $promotor['celular'];?>" name="celular" required />
                            <label for="celular">Celular</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="direccion" type="text" placeholder="Enter your first name" value="<?php echo $promotor['direccion'];?>" name="direccion" required />
                            <label for="direccion">Dirección</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="ref_vivienda" type="text" placeholder="Enter your last name" value="<?php echo $promotor['ref_vivienda'];?>" name="ref_vivienda" required />
                            <label for="ref_vivienda">Lugar de referencia</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="usuario" type="text" placeholder="Enter your first name" value="<?php echo $promotor['usuario'];?>" name="usuario" required />
                            <label for="usuario">Usuario</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="contraseña" type="password" placeholder="Enter your last name" value="<?php echo $promotor['contraseña'];?>" name="contraseña" required />
                            <label for="contraseña">Contraseña</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="correo" type="email" placeholder="Enter your first name" value="<?php echo $promotor['correo'];?>" name="correo" required />
                            <label for="correo">Correo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="estudios" type="text" placeholder="Enter your last name" value="<?php echo $promotor['estudios'];?>" name="estudios" required />
                            <label for="estudios">Estudios</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="sector" type="text" placeholder="Enter your first name" value="<?php echo $promotor['sector'];?>" name="sector" required />
                            <label for="sector">Sector</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="activo" placeholder="Enter your last name" name="activo" required>
                                <option value="">¿Activo?</option>
                                <?php
                                    if($promotor['activo']==1){
                                        ?>
                                        <option selected value="1">Si</option>
                                        <php
                                    }
                                    else{
                                        ?>
                                        <option value="0">No</option>
                                        <?php
                                    }
                                ?>
                                <?php
                                    if($promotor['activo']==0){
                                        ?>
                                        <option selected value="0">No</option>
                                        <php
                                    }
                                    else{
                                        ?>
                                        <option value="1">Si</option>
                                        <?php
                                    }
                                ?>

                            </select>

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="estab_salud" type="text" placeholder="Enter your first name" value="<?php echo $promotor['estab_salud'];?>" name="estab_salud" required />
                            <label for="estab_salud">Establecimiento de salud</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="id_coordinador" type="text" name="id_coordinador" required>
                                <option value="">Seleccionar coordinador</option>

                                <?php
                                foreach ($coordinadores as $row) {
                                ?>
                                    <option value="<?php echo $row['id']; ?>"
                                        <?php 
                                        if($row['id']==$promotor['id_coordinador']){
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
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/promotorTab/'; ?>">Cancelar</a></div>
                </div>
            </form>
        </div>
    </main>