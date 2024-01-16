<div id="layoutSidenav_content">
    <main>
        <div class="card-body m-4">
            <h2 class="mb-4 display-6" style="color:#343A40;"><?php echo $titulo; ?></h2>
            <?= \Config\Services::validation()->listErrors(); ?>
            <form method="post" action="<?php echo base_url(); ?>/create_alternativa">
                <input type="hidden" name="id_pregunta" value="<?php echo $pregunta['id']; ?>"><!--Row pregunta-->
                <?= csrf_field() ?>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="alternativa" type="text" placeholder="Alternativa" name="alternativa"/>
                        <label for="alternativa">Alternativa</label>
                    </div>
                    
                <!-- <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" name="nombre"/>
                        <label for="inputEmail">Nombres</label>
                    </div>                     -->

                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-dark btn-block" type="submit" name="submit">Aceptar</button></div>
                    <div class="d-grid"><a class="btn btn-secondary btn-block" href="<?php echo base_url() . '/preguntaTab/'; ?>">Cancelar</a></div>
                    
                </div>
            </form>
        </div>
    </main>