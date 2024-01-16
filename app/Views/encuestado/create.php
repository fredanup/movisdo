<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/create_encuestado">
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
                            <input class="form-control" id="ref_vivienda" type="text" placeholder="Enter your last name" name="ref_vivienda" required />
                            <label for="ref_vivienda">Lugar de referencia</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="categoria" placeholder="Enter your last name" name="categoria" required>
                                <option value="">Seleccione categoría</option>
                                <option value="Gestante">Gestante</option>
                                <option value="Apoderado">Apoderado</option>
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
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/encuestadoTab/'; ?>">Cancelar</a></div>
                </div>
            </form>
        </div>
    </main>