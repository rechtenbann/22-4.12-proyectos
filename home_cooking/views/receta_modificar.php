<div class="container marketing">
    <div>
        <nav aria-label="breadcrumb" style="margin-top: 60px">
            <ol class="breadcrumb">
                <?php
                breadcrumb("Modificacion de recetas", "receta_modificar.php");

                for ($i = 0; $i < count($bread); $i++) {
                    if ($i == array_key_last($bread)) {
                ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                        } else {
                                                                                                            ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?>
            </ol>
        </nav>
    </div>
    <form class="receta-alta" method="POST" enctype="multipart/form-data">
        <div class="receta-alta-t">
            <h2 class="receta-alta-h1" style="margin-top: 0px; font-weight:bold; font-size:38px; padding-top: 40px;">Editar receta <i class="fa-solid fa-kitchen-set"></i></h2>
        </div>
        <div class="mb-3">
            <label for="formGroupDescripcion" class="form-label" style="font-weight: bold; font-size: 20px;">Título</label>
            <input name="nombre" type="text" class="form-control" style="margin-bottom: 30px;" maxlength="30" id="formGroupTitulo" placeholder="Título de tu receta." value="<?php echo $comida['nombre']; ?>">
        </div>

        <div class="row">
            <div class="col">
                <label for="principal_img" class="form-label" style="font-weight: bold; font-size: 20px;">Imagen Principal</label>
                <input class="form-control" type="file" style="margin-bottom: 30px;" name="principal_img" id="principal_img">
            </div>

            <div class="col">
                <label for="pais" class="form-label" style="font-weight: bold; font-size: 20px;">País de origen de su receta</label>
                <select name="pais_id" class="form-select" id="formGroupPais">
                    <?php foreach ($paises as $pais) {
                        if ($pais['id'] == $comida['pais_id']) { ?>
                          <option value="<?php echo $pais['id']; ?>" selected><?php echo $pais['pais']; ?></option>
                        <?php } else { ?>

                            <option value="<?php echo $pais['id']; ?>" ><?php echo $pais['pais']; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="formGroupDescripcion" class="form-label" style="font-weight: bold; font-size: 20px;">Descripción</label>
            <textarea name="descripcion" maxlength="81" style="margin-bottom: 30px;" class="form-control" placeholder="Cuéntanos sobre tu receta."><?php echo $comida['descripcion']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="formGroupDescripcion" class="form-label" style="font-weight: bold; font-size: 20px;">Ingredientes</label>
            <textarea name="ingredientes" class="form-control" style="margin-bottom: 30px;" maxlength="1000" id="formGroupDescripcion" placeholder="Ingredientes de tu receta."><?php echo $comida['ingredientes']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="formGroupDescripcion" class="form-label" style="font-weight: bold; font-size: 20px; margin-top: 20px;">Procedimiento</label>
            <textarea name="procedimiento" class="form-control" maxlength="4000" id="formGroup" placeholder="Pasos a seguir de la receta."><?php echo $comida['procedimiento']; ?></textarea>
        </div>

        <label for="formGroupDescripcion" class="form-label" style="font-weight: bold; font-size: 20px; margin-top: 20px;">Seleccione la subcategoria de su receta</label>
        <div class="accordion" id="accordionExampl">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Postre
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php foreach ($subcategorias as $subcategoria) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="pos<?php echo $subcategoria['id'] ?>" id="flexCheckDefaultu" name="subcategoria_id[]" />
                                <label class="form-check-label" for="tipo"><?php echo $subcategoria['sub_categoria'] ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion" id="accordionExample" style="margin-bottom: 30px;">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Comida
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php foreach ($subcategoriasc as $subcategoriac) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="com<?php echo $subcategoriac['id'] ?>" id="flexCheckDefault" name="subcategoria_id[]" />
                                <label class="form-check-label" for="tipo"><?php echo $subcategoriac['sub_categoria'] ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-res-alta">
            <button type="submit" class="btn btn-primary mb-3">Publicar</button>
        </div>
    </form>

</div>