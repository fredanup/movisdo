<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/create_infante">                
                <?= csrf_field() ?>
                
                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->
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
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="dni" type="text" placeholder="Enter your first name" name="dni" required />
                            <label for="dni">Dni</label>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" name="fecha_nacimiento" required />
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="sexo" type="text" name="sexo" required>
                                <option value="">Seleccione género</option>
                                <option value="1">Masculino</option>
                                <option value="0">Femenino</option>
                            </select>

                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="prematuro" type="text" name="prematuro" required>
                                <option value="">¿Prematuro?</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="categoria" type="text" name="categoria" required>
                                <option value="">¿Categoría?</option>
                                <option value="Recién nacido">Recién nacido</option>
                                <option value="Menor de 6 meses">Menor de 6 meses</option>
                                <option value="De 6 a 11 meses">De 6 a 11 meses</option>
                                <option value="De 1 a 3 años">De 1 a 3 años</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                        <input class="form-control" id="estab_salud" type="text" placeholder="Establecimiento de salud" name="estab_salud" />
                        <label for="estab_salud">Establecimiento de salud</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="id_encuestado" type="text" name="id_encuestado" required>
                                <option value="">Seleccione apoderado</option>

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

                </div>
               

                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="submit">Aceptar</button></div>
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/infanteTab/'; ?>">Cancelar</a></div>
                </div>
            </form>
        </div>
    </main>