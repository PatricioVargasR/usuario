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