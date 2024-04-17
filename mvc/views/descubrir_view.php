
<?php
    include('includes/config.php');

    $page_title = "Página de Descubrir";
    $meta_description = "Página de descubrir del museo del santo";
    $meta_keywords = "El santo, Museo del santo";

    include('includes/navbar.php');
    include('includes/header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>
  .owl-carousel {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .owl-carousel img {
    max-width: 100%;
    height: auto;
  }
</style>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: justify;">
                <h3 class="text-dark" >Descubrir</h3>
                <div class="underline"></div>
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('mvc/uploads/posts/Restaurante.jpg'); ?>" class="img-fluid rounded-start" style="height: 100%"alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Restaurantes</h5>
                                            <p class="card-text">Para aprovechar al máximo su visita al Museo Del Santo y a Tulancingo de Bravo, le proponemos una lista de los mejores restaurantes de la región, no lo puede dejar pasar.</p>
                                            <p><a href="<?= base_url('restaurantes.php')?>" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Leer más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="<?= base_url('mvc/uploads/posts/Hoteles.jpg') ?>" class="img-fluid rounded-start" style="height: 100%" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Hoteles</h5>
                                            <p class="card-text">¿Vas a pasar un tiempo con nosotros? Entonces no te pierdas de esta lista con los mejores hoteles de la región, para que tengas un hospedaje más que digno. Nada mejor que dormir en una buena visita</p>
                                            <p><a href="<?= base_url('hoteles.php')?>" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Leer más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-dark" >Algunas Obras</h3>
                <div class="underline"></div>
                        <!-- Aquí sigue el código del carrusel utilizando el array $images -->
                        <center>
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $active = true;
                                    foreach ($datos as $image) {
                                        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '" data-bs-interval="2000">';
                                        echo '<img src="data:image/jpeg;base64,' . $image['image'] . '" class="d-block w-50" alt="Image">';
                                        echo '</div>';
                                        $active = false;
                                    }
                                    ?>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>


<?php

    include('includes/footer.php');
?>