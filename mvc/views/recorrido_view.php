<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recorrido Virtual</title>
    <style>


        html, body {
            margin: 0;
            padding: 0;
        }

        .boton1 {
            text-decoration: none;
            display: inline-block;
            padding: 10px;
            border-radius: 50px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition: all 0.9s;
            text-align: center;
            font-size: 15px;
        }

        .boton1:hover {
            color: black;
        }

        .contenedor {
            width: 100vw;
            height: 100vh;
        }

        .bottom-div {
            position: fixed;
            bottom: -50px; /* inicialmente fuera de la pantalla */
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
        }
    </style>
</head>
<body>
<div class="contenedor">
    <iframe width="100%" height="100%" frameborder="0" allow="xr-spatial-tracking; gyroscope; accelerometer"
            allowfullscreen scrolling="no"
            src="https://kuula.co/share/collection/7JnzV?logo=1&info=1&fs=1&vr=0&zoom=1&sd=1&autop=10&thumbs=0&inst=es"></iframe>
</div>
<div class="bottom-div">
    <center><a style="margin-top: 20px; margin-bottom: 20px; font-size:larger;" href="index.php" class="boton1">Inico</a></center>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var bottomDiv = document.querySelector('.bottom-div');

        document.addEventListener('mousemove', function (e) {
            var mouseY = e.clientY;
            var windowHeight = window.innerHeight;

            if (mouseY >= windowHeight - 50) { // Mostrar el div cuando el cursor está en la parte baja de la pantalla
                bottomDiv.style.bottom = '0';
            } else { // Ocultar el div cuando el cursor no está en la parte baja de la pantalla
                bottomDiv.style.bottom = '-50px';
            }
        });
    });
</script>
</body>
</html>