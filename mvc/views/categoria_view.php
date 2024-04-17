<?php

    include('includes/config.php');

    $page_title = $meta_datos['titulo'];
    $meta_description = $meta_datos['descripcion'];
    $meta_keywords = implode(',', $meta_datos['palabras_clave']);

    include('includes/header.php');
    include('includes/navbar.php');
?>


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white" >Acerca de la categoría</h3>
                <div class="underline"></div>
                <?php

                if(isset($_GET['title'])){


                    if(count($datos) > 0){

                        foreach ($datos as $item) {

                        ?>
                            <p class="text-white">Nombre de la Categoría: <?= $item['name'] ?></p>
                            <p class="text-white">Descripción: <?= $item['description'] ?></p>
                            <p class="text-white">Palabras Claves: <?= implode(',', $item['meta_keywords']) ?></p>
                        <?php
                        }

                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<section class="portafolio">
        <h2>Últimas noticias relacionadas</h2>
        <p>

        </p>
        <ul class="cartas">
            <?php

                if(isset($_GET['title'])){

                    if(count($datos) > 0){

                        if (count($datos_enviar) > 0) {

                            foreach ($datos_enviar as $postItems) {

                                ?>
                            <li class="carta">
                                <?php

                                    if($postItems['image'] != null):
                                        ?>
                                            <img src="data:image/*;base64,<?= $postItems['image']; ?>" alt="<?=$postItems['name'];?>" style="width:100%">
                                <?php endif; ?>
                                <h3><?=$postItems['name'];?></h3>
                                <p>
                                     <?=$postItems['meta_description'];?><br/><p>
                                     <div>
                                        <label class="text-dark me-3"><?= date('d-M-Y', strtotime($postItems['created'])); ?> </label>
                                    </div>
                                    <br>
                                    <a href="<?= base_url('publicaciones/'.$postItems['slug']); ?>" class="btn btn-primary">Ver noticia</a>
                                </p>
                            </li>
                        <!-- </a> -->
                                <?php



                            }

                        } else{

                            ?>
                                <h4>Posts no disponible</h4>
                            <?php

                        }

                    } else {
                        ?>
                            <h4>No se encontró la categoria</h4>
                        <?php
                    }

                } else {
                    ?>
                        <h4>No se encontró la URL</h4>
                    <?php
                }

            ?>
            </div>
    </section>

<?php

    include('includes/footer.php');
?>