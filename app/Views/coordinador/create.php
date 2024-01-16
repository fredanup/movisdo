<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/create_coordinador">
                <?= csrf_field() ?>


                                
                   
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nombre" type="text" placeholder="Enter your first name" name="nombre" required />
                            <label for="nombre">Nombres</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apPaterno" type="text" placeholder="Enter your first name" name="apPaterno" required />
                            <label for="apPaterno">Apellido paterno</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="apMaterno" type="text" placeholder="Enter your last name" name="apMaterno" required />
                            <label for="apMaterno">Apellido materno</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" name="fecha_nacimiento" required />
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="dni" type="text" placeholder="Enter your first name" name="dni" required />
                            <label for="dni">Dni</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="celular" type="tel" placeholder="Enter your last name" name="celular" required />
                            <label for="celular">Celular</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="direccion" type="text" placeholder="Enter your first name" name="direccion" required />
                            <label for="direccion">Dirección</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="estudios" type="text" placeholder="Enter your last name" name="estudios" required />
                            <label for="estudios">Estudios</label>
                        </div>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="usuario" type="text" placeholder="Enter your first name" name="usuario" required/>
                            <label for="usuario">Usuario</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="contraseña" type="password" placeholder="Enter your last name" name="contraseña" required/>
                            <label for="contraseña">Contraseña</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="ref_vivienda" type="text" placeholder="Ingrese lugar de referencia" name="ref_vivienda" required/>
                            <label for="ref_vivienda">Lugar de referencia</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="tipo_usuario" placeholder="Enter your last name" name="tipo_usuario" required>
                                <option value="">Seleccione rol</option>
                                <option value="1">Administrador</option>
                                <option value="0">Regular</option>
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