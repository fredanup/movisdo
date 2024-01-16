<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/update_pregunta">
                <?= csrf_field() ?>


                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->
                <input type="hidden" name="id" value="<?php echo $pregunta['id']; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-control form-control-lg">
                            <select class="form-control" id="categoria" placeholder="Enter your last name" name="categoria" required>
                                <option value="">Seleccione categoría</option>
                            
                                <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        
                                        if($i==0){
                                            if ($pregunta['categoria'] == "Gestante"){
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
                                            if ($pregunta['categoria'] == "Recién nacido"){
                                                ?>
                                                <option selected value="Recién nacido">Recién nacido</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Recién nacido">Recién nacido</option>
                                                <?php
                                            }
                                        }
                                        if($i==2){
                                            if ($pregunta['categoria'] == "Menor de 6 meses"){
                                                ?>
                                                <option selected value="Menor de 6 meses">Menor de 6 meses</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Menor de 6 meses">Menor de 6 meses</option>
                                                <?php
                                            }
                                        }
                                        if($i==3){
                                            if ($pregunta['categoria'] == "De 6 a 11 meses"){
                                                ?>
                                                <option selected value="De 6 a 11 meses">De 6 a 11 meses</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="De 6 a 11 meses">De 6 a 11 meses</option>
                                                <?php
                                            }
                                        }
                                        if($i==4){
                                            if ($pregunta['categoria'] == "De 1 a 3 años"){
                                                ?>
                                                <option selected value="De 1 a 3 años">De 1 a 3 años</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="De 1 a 3 años">De 1 a 3 años</option>
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
                            <select class="form-control" id="area" placeholder="Enter your last name" name="area" required>
                                <option value="">Seleccione área</option>
                                <?php
                                    for ($i = 0; $i < 3; $i++) {
                                        
                                        if($i==0){
                                            if ($pregunta['area'] == "Prácticas saludables"){
                                                ?>
                                                <option selected value="Prácticas saludables">Prácticas saludables</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Prácticas saludables">Prácticas saludables</option>
                                                <?php
                                            }
                                        }
                                        if($i==1){
                                            if ($pregunta['area'] == "Prevención y respuesta ante el COVID-19"){
                                                ?>
                                                <option selected value="Prevención y respuesta ante el COVID-19">Prevención y respuesta ante el COVID-19</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Prevención y respuesta ante el COVID-19">Prevención y respuesta ante el COVID-19</option>
                                                <?php
                                            }
                                        }
                                        if($i==2){
                                            if ($pregunta['area'] == "Salud mental y prevención de violencia"){
                                                ?>
                                                <option selected value="Salud mental y prevención de violencia">Salud mental y prevención de violencia</option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="Salud mental y prevención de violencia">Salud mental y prevención de violencia</option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>

                            </select>

                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                        <input class="form-control" id="pregunta" type="text" placeholder="Ingrese pregunta" name="pregunta" value="<?php echo $pregunta['pregunta']; ?>"/>
                        <label for="pregunta">Ingrese pregunta</label>
                </div> 
                <div class="form-floating mb-3">
                        <input class="form-control" id="sug_temporal" type="text" placeholder="Sugerencia temporal del promotor" name="sug_temporal" value="<?php echo $pregunta['sug_temporal']; ?>"/>
                        <label for="sug_temporal">Sugerencia temporal del promotor</label>
                </div> 
                

                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="submit">Registrar</button></div>
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/preguntaTab/'; ?>">Cancelar</a></div>
                </div>
            </form>
        </div>
    </main>