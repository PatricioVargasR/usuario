<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Calendario</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      align-items: flex-start;
      padding: 0 10px;
      justify-content: center;
      min-height: 100vh;
      background: #fff;
    }

    .checkbox-label {
      display: flex;
      align-items: center;
      margin-bottom: 200px; /* Ajusta este valor según lo necesites */
    }

    .checkbox-label input[type="checkbox"] {
      margin-right: 10px; /* Ajusta este valor para controlar la separación entre el checkbox y el texto */
    }

    .formulario-reservas {
      width: 600px;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 10px;
      margin-left: 20px;
      flex-direction: column;
      align-self: flex-end;
    }

    .formulario-reservas p {
      cursor: pointer;
    }

    .formulario-reservas h1 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .formulario-reservas div {
      margin-bottom: 15px;
    }

    .formulario-reservas label {
      display: block;
      margin-bottom: 5px;
    }

    .formulario-reservas input,
    .formulario-reservas select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .formulario-reservas button {
      width: 100%;
      padding: 10px;
      background-color: #9B59B6;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .formulario-reservas button:hover {
      background-color: #8e4f9e;

    }

    .hour-box {
      display: inline-block;
      border: 1px solid black;
      padding: 10px;
      margin: 5px;
      cursor: pointer;
    }


    .days li.inactive {
      color: #aaa;
    }

    .days li.active {
      color: #fff;
    }

    .days li.active::before {
      background: #9B59B6;
    }

    .hour-box.selected-hour {
      background-color: #dbc3e1;

    }


  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <input type="hidden" name="fecha_seleccionada" id="fecha_seleccionada" value="">


  <!-- Google Font Link for Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

  <body>


 <div class="formulario-reservas">
  <h1>Formulario de Reservas</h1>


  <form action="visitas.php" method="POST" enctype="multipart/form-data">

    <p>Selecciona una fecha:</p>
    <input type="date" name="date" id="date" min="">

    <script>
        // Obtener la fecha actual
        var today = new Date();

        // Sumar tres días a la fecha actual
        var threeDaysLater = new Date();
        threeDaysLater.setDate(today.getDate() + 3);

        // Obtener las fechas de hoy, mañana y pasado mañana
        var todayFormatted = today.toISOString().split('T')[0];
        var tomorrowFormatted = new Date(today);
        tomorrowFormatted.setDate(today.getDate() + 1);
        tomorrowFormatted = tomorrowFormatted.toISOString().split('T')[0];
        var dayAfterTomorrowFormatted = new Date(today);
        dayAfterTomorrowFormatted.setDate(today.getDate() + 2);
        dayAfterTomorrowFormatted = dayAfterTomorrowFormatted.toISOString().split('T')[0];

        // Asignar los valores al atributo 'min' del input
        var dateInput = document.getElementById('date');
        dateInput.min = threeDaysLater.toISOString().split('T')[0];

        // Deshabilitar las fechas anteriores a tres días después de hoy
        dateInput.addEventListener('focus', function() {
            var options = this.querySelectorAll('option');
            for (var i = 0; i < options.length; i++) {
                var optionDate = new Date(options[i].value);
                if (optionDate < threeDaysLater) {
                    options[i].disabled = true;
                } else {
                    options[i].disabled = false;
                }
            }
        });
    </script>

    <div class="seleccion-hora">
      <p>Selecciona la hora:</p>
      <div class="horas-disponibles" id="horas-disponibles">
        <div class="hour-box" data-hour="9:00" onclick="selectHour('9:00')">9:00 - 10:00 am</div>
        <div class="hour-box" data-hour="10:00" onclick="selectHour('10:00')">10:00 - 11:00 am</div>
        <div class="hour-box" data-hour="11:00" onclick="selectHour('11:00')">11:00 - 12:00 pm</div>
        <div class="hour-box" data-hour="12:00" onclick="selectHour('12:00')">12:00 - 1:00 pm</div>
        <div class="hour-box" data-hour="13:00" onclick="selectHour('13:00')">1:00 - 2:00 pm</div>
        <div class="hour-box" data-hour="14:00" onclick="selectHour('14:00')">2:00 - 3:00 pm</div>
        <div class="hour-box" data-hour="15:00" onclick="selectHour('15:00')">3:00 - 4:00 pm</div>
        <div class="hour-box" data-hour="16:00" onclick="selectHour('16:00')">4:00 - 5:00 pm</div>
      </div>
      <input type="hidden" name="hora" id="hora" required>
    </div>

    <div id="mensaje" style="display: none;">
      <p id="mensaje-contenido"></p>
      <button id="cerrar-mensaje">Cerrar</button>
    </div>

    <div>
      <label for="nombres">Nombres:</label>
      <input type="text" name="nombres" id="nombres" required>
    </div>

    <div>
      <label for="apellidos">Apellidos:</label>
      <input type="text" name="apellidos" id="apellidos" required>
    </div>

    <div>
      <label for="pais">País:</label>
        <select name="pais">
          <option value="Afganistán">Afganistán</option>
          <option value="Albania">Albania</option>
          <option value="Alemania">Alemania</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Antigua y Barbuda">Antigua y Barbuda</option>
          <option value="Arabia Saudita">Arabia Saudita</option>
          <option value="Argelia">Argelia</option>
          <option value="Argentina">Argentina</option>
          <option value="Armenia">Armenia</option>
          <option value="Australia">Australia</option>
          <option value="Austria">Austria</option>
          <option value="Azerbaiyán">Azerbaiyán</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bangladés">Bangladés</option>
          <option value="Barbados">Barbados</option>
          <option value="Baréin">Baréin</option>
          <option value="Bélgica">Bélgica</option>
          <option value="Belice">Belice</option>
          <option value="Benín">Benín</option>
          <option value="Bielorrusia">Bielorrusia</option>
          <option value="Birmania/Myanmar">Birmania/Myanmar</option>
          <option value="Bolivia">Bolivia</option>
          <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
          <option value="Botsuana">Botsuana</option>
          <option value="Brasil">Brasil</option>
          <option value="Brunéi">Brunéi</option>
          <option value="Bulgaria">Bulgaria</option>
          <option value="Burkina Faso">Burkina Faso</option>
          <option value="Burundi">Burundi</option>
          <option value="Bután">Bután</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Camboya">Camboya</option>
          <option value="Camerún">Camerún</option>
          <option value="Canadá">Canadá</option>
          <option value="Catar">Catar</option>
          <option value="Chad">Chad</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Chipre">Chipre</option>
          <option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
          <option value="Colombia">Colombia</option>
          <option value="Comoras">Comoras</option>
          <option value="Corea del Norte">Corea del Norte</option>
          <option value="Corea del Sur">Corea del Sur</option>
          <option value="Costa de Marfil">Costa de Marfil</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Croacia">Croacia</option>
          <option value="Cuba">Cuba</option>
          <option value="Dinamarca">Dinamarca</option>
          <option value="Dominica">Dominica</option>
          <option value="Ecuador">Ecuador</option>
          <option value="Egipto">Egipto</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
          <option value="Eritrea">Eritrea</option>
          <option value="Eslovaquia">Eslovaquia</option>
          <option value="Eslovenia">Eslovenia</option>
          <option value="España">España</option>
          <option value="Estados Unidos">Estados Unidos</option>
          <option value="Estonia">Estonia</option>
          <option value="Etiopía">Etiopía</option>
          <option value="Filipinas">Filipinas</option>
          <option value="Finlandia">Finlandia</option>
          <option value="Fiyi">Fiyi</option>
          <option value="Francia">Francia</option>
          <option value="Gabón">Gabón</option>
          <option value="Gambia">Gambia</option>
          <option value="Georgia">Georgia</option>
          <option value="Ghana">Ghana</option>
          <option value="Granada">Granada</option>
          <option value="Grecia">Grecia</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guyana">Guyana</option>
          <option value="Guinea">Guinea</option>
          <option value="Guinea ecuatorial">Guinea ecuatorial</option>
          <option value="Guinea-Bisáu">Guinea-Bisáu</option>
          <option value="Haití">Haití</option>
          <option value="Honduras">Honduras</option>
          <option value="Hungría">Hungría</option>
          <option value="India">India</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Irak">Irak</option>
          <option value="Irán">Irán</option>
          <option value="Irlanda">Irlanda</option>
          <option value="Islandia">Islandia</option>
          <option value="Islas Marshall">Islas Marshall</option>
          <option value="Islas Salomón">Islas Salomón</option>
          <option value="Israel">Israel</option>
          <option value="Italia">Italia</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Japón">Japón</option>
          <option value="Jordania">Jordania</option>
          <option value="Kazajistán">Kazajistán</option>
          <option value="Kenia">Kenia</option>
          <option value="Kirguistán">Kirguistán</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Kuwait">Kuwait</option>
          <option value="Laos">Laos</option>
          <option value="Lesoto">Lesoto</option>
          <option value="Letonia">Letonia</option>
          <option value="Líbano">Líbano</option>
          <option value="Liberia">Liberia</option>
          <option value="Libia">Libia</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Lituania">Lituania</option>
          <option value="Luxemburgo">Luxemburgo</option>
          <option value="Macedonia del Norte">Macedonia del Norte</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Malasia">Malasia</option>
          <option value="Malaui">Malaui</option>
          <option value="Maldivas">Maldivas</option>
          <option value="Malí">Malí</option>
          <option value="Malta">Malta</option>
          <option value="Marruecos">Marruecos</option>
          <option value="Mauricio">Mauricio</option>
          <option value="Mauritania">Mauritania</option>
          <option value="México">México</option>
          <option value="Micronesia">Micronesia</option>
          <option value="Moldavia">Moldavia</option>
          <option value="Mónaco">Mónaco</option>
          <option value="Mongolia">Mongolia</option>
          <option value="Montenegro">Montenegro</option>
          <option value="Mozambique">Mozambique</option>
          <option value="Namibia">Namibia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option value="Nicaragua">Nicaragua</option>
          <option value="Níger">Níger</option>
          <option value="Nigeria">Nigeria</option>
          <option value="Noruega">Noruega</option>
          <option value="Nueva Zelanda">Nueva Zelanda</option>
          <option value="Omán">Omán</option>
          <option value="Países Bajos">Países Bajos</option>
          <option value="Pakistán">Pakistán</option>
          <option value="Palaos">Palaos</option>
          <option value="Panamá">Panamá</option>
          <option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
          <option value="Paraguay">Paraguay</option>
          <option value="Perú">Perú</option>
          <option value="Polonia">Polonia</option>
          <option value="Portugal">Portugal</option>
          <option value="Reino Unido">Reino Unido</option>
          <option value="República Centroafricana">República Centroafricana</option>
          <option value="República Checa">República Checa</option>
          <option value="República del Congo">República del Congo</option>
          <option value="República Democrática del Congo">República Democrática del Congo</option>
          <option value="República Dominicana">República Dominicana</option>
          <option value="República Sudafricana">República Sudafricana</option>
          <option value="Ruanda">Ruanda</option>
          <option value="Rumanía">Rumanía</option>
          <option value="Rusia">Rusia</option>
          <option value="Samoa">Samoa</option>
          <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
          <option value="San Marino">San Marino</option>
          <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
          <option value="Santa Lucía">Santa Lucía</option>
          <option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
          <option value="Senegal">Senegal</option>
          <option value="Serbia">Serbia</option>
          <option value="Seychelles">Seychelles</option>
          <option value="Sierra Leona">Sierra Leona</option>
          <option value="Singapur">Singapur</option>
          <option value="Siria">Siria</option>
          <option value="Somalia">Somalia</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Suazilandia">Suazilandia</option>
          <option value="Sudán">Sudán</option>
          <option value="Sudán del Sur">Sudán del Sur</option>
          <option value="Suecia">Suecia</option>
          <option value="Suiza">Suiza</option>
          <option value="Surinam">Surinam</option>
          <option value="Tailandia">Tailandia</option>
          <option value="Tanzania">Tanzania</option>
          <option value="Tayikistán">Tayikistán</option>
          <option value="Timor Oriental">Timor Oriental</option>
          <option value="Togo">Togo</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad y Tobago">Trinidad y Tobago</option>
          <option value="Túnez">Túnez</option>
          <option value="Turkmenistán">Turkmenistán</option>
          <option value="Turquía">Turquía</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Ucrania">Ucrania</option>
          <option value="Uganda">Uganda</option>
          <option value="Uruguay">Uruguay</option>
          <option value="Uzbekistán">Uzbekistán</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietnam">Vietnam</option>
          <option value="Yemen">Yemen</option>
          <option value="Yibuti">Yibuti</option>
          <option value="Zambia">Zambia</option>
          <option value="Zimbabue">Zimbabue</option>
        </select>
    </div>

    <div>
      <label for="ciudad">Ciudad:</label>
      <input type="text" name="ciudad" id="ciudad">
    </div>

    <div>
      <label for="edad">Edad:</label>
      <input type="number" name="edad" id="edad" min="18" required>
    </div>

    <div>
      <label for="genero">Género:</label>
      <select name="genero" id="genero" required>
        <option value="femenino">Femenino</option>
        <option value="masculino">Masculino</option>
        <option value="otro">Otro</option>
      </select>
    </div>

    <div>
      <label for="cantidad-acompanantes">Cantidad de acompañantes:</label>
      <input type="number" name="cantidad_acompanantes" id="cantidad_acompanantes">
    </div>

    <div>
      <label for="">Numero de contacto:</label>
      <input type="number" name="telefono" id="telefono"/>
    </div>

    <div>
      <label for="acompanante" class="checkbox-label">
        <input type="checkbox" name="acompanante" id="acompanante">
        ¿Vienen de alguna institución?
      </label>
    </div>

    <div>
      <label for="nombre_institucion">Nombre de la institución:</label>
      <input type="text" name="nombre_institucion" id="nombre_institucion" disabled>
    </div>

    <div>
      <label for="genero_acompanantes">Género de los acompañantes:</label>

      <div>
        <label for="femenino">Femenino:</label>
        <input type="number" name="genero_acompanante_femenino" id="genero_acompanante_femenino" min="1" disabled>
      </div>

      <div>
        <label for="masculino">Masculino:</label>
        <input type="number" name="genero_acompanante_masculino" id="genero_acompanante_masculino" min="1" disabled>
      </div>

      <div>
        <label for="otro">Otro:</label>
        <input type="number" name="genero_acompanante_otro" id="genero_acompanante_otro" min="1" disabled>
      </div>
    </div>

    <div>
      <label for="rango_edad">Rango de edad de los acompañantes:</label>
      <select name="rango_edad" id="rango_edad" required disabled>
        <option value="kinder">3-5 años</option>
        <option value="primaria">6-11 años</option>
        <option value="secundaria">12-14 años</option>
        <option value="preparatoria">15-18 años</option>
        <option value="mayor">+18 años</option>
      </select>
    </div>


    <input type="hidden" name="fecha_seleccionada" id="fecha_seleccionada_input" value="">

      <button type="submit" name="reservar" disabled>Reservar</button>

  </form>

<br>
<center><a href="<?= base_url('descubrir.php'); ?>" class="ink-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Regresar</a></center>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {

// Habilitar y deshabilitar campos
const checkbox = document.getElementById('acompanante');
// const aviso = document.getElementById('terminos');

const buttonReservar = this.documentElementById('reservar');
const inputNombreInstitucion = document.getElementById('nombre_institucion');
// const inputCiudad = document.getElementById('ciudad');
// const inputCantidadAcompanantes = document.getElementById('cantidad-acompanantes');
const inputMasculino = document.getElementById('genero_acompanante_masculino');
const inputFemenino = document.getElementById('genero_acompanante_femenino');
const inputOtro = document.getElementById('genero_acompanante_otro');
const inputRangoEdad = document.getElementById('rango_edad');

checkbox.addEventListener('change', function() {
  inputNombreInstitucion.disabled = !this.checked;

  inputMasculino.disabled = !this.checked;
  inputFemenino.disabled = !this.checked;
  inputOtro.disabled = !this.checked;
  inputRangoEdad.disabled = !this.checked;
});

// Seleccionar la hora
function selectHour(hour) {
  const hourBoxes = document.querySelectorAll('.hour-box');
  hourBoxes.forEach(box => {
    box.classList.remove('selected-hour');
  });

  const selectedHourBox = document.querySelector(`.hour-box[data-hour="${hour}"]`);
  if (selectedHourBox) {
    selectedHourBox.classList.add('selected-hour');
  }

  document.getElementById('hora').value = hour;
}



// Escuchar el evento click en los elementos con la clase 'hour-box'
const hourBoxes = document.querySelectorAll('.hour-box');
hourBoxes.forEach(box => {
  box.addEventListener('click', function() {
    const selectedHour = this.getAttribute('data-hour');
    selectHour(selectedHour);

    // Realizar solicitud AJAX para verificar disponibilidad de la hora
    const formData = new FormData();
    formData.append('date', '...');
    formData.append('hora', selectedHour);

    fetch('ruta_del_archivo.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        document.getElementById('mensaje-contenido').textContent = data.error;
        document.getElementById('mensaje').style.display = 'block';
      } else {
        document.getElementById('mensaje').style.display = 'none';
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});

document.getElementById("cerrar-mensaje").addEventListener("click", function() {
  document.getElementById("mensaje").style.display = "none";
});
});

//Subir imagen
function subirImagen() {
const inputImagen = document.getElementById('imagen');
const formData = new FormData();
formData.append('imagen', inputImagen.files[0]);

const xhr = new XMLHttpRequest();
xhr.open('POST', 'ruta_al_script_php.php', true);
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    
    const response = JSON.parse(xhr.responseText);
    
  }
};
xhr.send(formData);
}
</script>
</body>
</html>