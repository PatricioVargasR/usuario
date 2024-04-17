<?php

    include('includes/config.php');

    if(isset($_GET['title'])){


        $page_title = $meta_datos['titulo'];
        $meta_description = $meta_datos['descripcion'];
        $meta_keywords = implode(',', $meta_datos['palabras_clave']);
    }

    include('includes/header.php');
    include('includes/navbar.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <?php

                    if(isset($_GET['title'])){

                        if(count($datos) > 0){

                            foreach ($datos as $postItems) {
                                ?>
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-header">
                                            <h5><?= $postItems['name']; ?></h5>
                                        </div>

                                        <div class="card-body">
                                            <label class="text-dark me-2"><?= date('d-M-Y', strtotime($postItems['created'])); ?> </label>  
                                            <hr/>

                                            <div>
                                                <?= $postItems['description']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }


                        } else {

                            ?>
                                <h4>No se encontró el post</h4>
                            <?php

                        }

                    } else {
                        ?>
                            <h4>No se encontró la URL</h4>
                        <?php
                    }

                ?>

            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Proximos Eventos</h4>
                    </div>
                    <div class="card-body">
                        No hay eventos por lo mientras
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

    include('includes/footer.php');
?>