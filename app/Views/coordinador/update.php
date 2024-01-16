<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;">Editar coordinador</h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/update_coordinador">
                <?= csrf_field() ?>


                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->
                <input type="hidden" name="id" value="<?php echo $coordinador['id']; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nombre" type="text" placeholder="Enter your first name" name="nombre" value="<?php echo $coordinador['nombre'];?>" required/>
                            <label for="nombre">Nombres</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apPaterno" type="text" placeholder="Enter your first name" name="apPaterno" value="<?php echo $coordinador['apPaterno'];?>" required />
                            <label for="apPaterno">Apellido paterno</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apMaterno" type="text" placeholder="Enter your last name" name="apMaterno" value="<?php echo $coordinador['apMaterno'];?>" required />
                            <label for="apMaterno">Apellido materno</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" name="fecha_nacimiento" value="<?php echo $coordinador['fecha_nacimiento'];?>" required />
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="dni" type="text" placeholder="Enter your first name" name="dni" value="<?php echo $coordinador['dni'];?>" required />
                            <label for="dni">Dni</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="celular" type="text" placeholder="Enter your last name" name="celular" value="<?php echo $coordinador['celular'];?>" required />
                            <label for="celular">Celular</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="direccion" type="text" placeholder="Enter your first name" name="direccion" value="<?php echo $coordinador['direccion'];?>" required />
                            <label for="direccion">Dirección</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="estudios" type="text" placeholder="Enter your last name" name="estudios" value="<?php echo $coordinador['estudios'];?>" required />
                            <label for="estudios">Estudios</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="usuario" type="text" placeholder="Enter your first name" name="usuario" value="<?php echo $coordinador['usuario'];?>" required/>
                            <label for="usuario">Usuario</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="contraseña" type="password" placeholder="Enter your last name" name="contraseña" value="<?php echo $coordinador['contraseña'];?>" required/>
                            <label for="contraseña">Contraseña</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="ref_vivienda" type="text" placeholder="Ingrese lugar de referencia" name="ref_vivienda" value="<?php echo $coordinador['ref_vivienda'];?>" required/>
                            <label for="ref_vivienda">Lugar de referencia</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                        <select class="form-control" id="tipo_usuario" placeholder="Ingrese tipo de usuario" name="tipo_usuario" required>
                                <option value="">Seleccione rol</option>
                                <?php
                                    for ($i = 0; $i < 2; $i++) {
                                        
                                        if($i==0){
                                            if ($coordinador['tipo_usuario'] == 0){
                                                ?>
                                                <option selected value="0">Regular</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="0">Regular</option>
                                                <?php
                                            }
                                        }
                                        if($i==1){
                                            if ($coordinador['tipo_usuario'] == 1){
                                                ?>
                                                <option selected value="1">Administrador</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="1">Administrador</option>
                                                <?php
                                            }
                                        }                                        
                                    }
                                ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="submit">Aceptar</button></div>
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/coordinadorTab/'; ?>">Cancelar</a></div>
                </div>
            </form>
        </div>
    </main>