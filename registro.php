<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title>Registro - Taller</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
  <script>
    
    function buscar() {
     
      var userId = document.getElementById("cedula").value;

      if(userId) {
          // Realizar una solicitud AJAX pasando el ID como parámetro
          fetch('php/obtener_datos.php?id=' + encodeURIComponent(userId))
              .then(response => response.json()) // Convertir la respuesta en JSON
              .then(data => {
                  
                  if (data.error) {
                      alert("Error:"+ data.error);
                  } else {
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('celular').value = data.celular;
                    document.getElementById('direccion').value = data.direccion;

                  }
              })
              .catch(error => console.error('Error al obtener los datos:', error));
      } else {
          alert("Ingrese cedula");
      }

    }

    $(document).ready(function(){
      $("#insertForm").submit(function(event){
        
        // Evitar que el formulario se envíe normalmente
        event.preventDefault();

        // Obtener los datos del formulario
        var formData = $(this).serialize();

        var nombre = document.getElementById('nombre').value;
        var cedula = document.getElementById('cedula').value;
        var usuario = document.getElementById('usuario').value;
        var contrasena = document.getElementById('contrasena').value;
        var conf_contrasena = document.getElementById('conf_contrasena').value;
                        
        // Mostrar el valor obtenido
        /*alert('El nombre ingresado es: ' + nombre);
        alert('El cedula ingresado es: ' + cedula);
        alert('El usuario ingresado es: ' + usuario);
        alert('La contrasena ingresado es: ' + contrasena);
        alert('La conf_contrasena ingresado es: ' + conf_contrasena);*/

        if(nombre == "" || cedula == "" || usuario == "" || contrasena == "" || conf_contrasena == ""){
          alert('Debe ingresar todos los datos');
        }else{

          if(contrasena != conf_contrasena){
            alert('Las contraseñas no coinciden');
          }else{

            // Enviar la solicitud AJAX
            $.ajax({
              type: 'POST',
              url: 'php/insertar.php', // Archivo PHP donde procesaremos la inserción
              data: formData,
                        
              success: function(response){
                // Manejar la respuesta del servidor si es necesario
                alert('Datos Ingresados Correctamente');
                // Puedes agregar más lógica aquí según la respuesta

                document.getElementById('nombre').value = "";
                document.getElementById('cedula').value = "";
                document.getElementById('usuario').value = "";
                document.getElementById('contrasena').value = "";
                document.getElementById('conf_contrasena').value = "";
              
              },error: function(){
                alert('Error al Ingresar Datos');
              }
            });
          }  
        }
      });
    });

    function regresar() {
      window.location.replace("index.html");
    }
  </script>

</head>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              <img src="images/logo.jpeg" class="logo"/>
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.html">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="service.html">Services <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="why.html">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="team.html">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul> -->
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Crear <span>Usuario</span>
          </h2>         
        </div>

        <br>

        <div class="row" >
          
          <div class="col-md-6 columna">

          <form id="insertForm"> <!-- action="insertar.php" method="post"-->

          <table class="tabla" >

            <tr>
              <td align="center" colspan="2"> <br>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Nombre</span>
                  </div>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>             
              </td>
            </tr>

            <tr>
              <td align="center" width="90%"> <br>             
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Cedula</span>
                  </div>
                  <input type="text" class="form-control" id="cedula" name="cedula">
                </div>  
                
              </td>

              <!-- <td width="10%">
                <span><img src="images/buscar.png" onclick="buscar()" class="img-buscar"></span>
              </td> -->
            </tr>
            
            <tr>
              <td align="center" colspan="2"> <br>             
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Usuario</span>
                  </div>
                  <input type="tel" class="form-control" id="usuario" name="usuario">
                </div>             
              </td>
            </tr>

            <tr>
              <td align="center" colspan="2"> <br>              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Contraseña</span>
                  </div>
                  <input type="password" class="form-control" id="contrasena" name="contrasena">
                </div>             
              </td>
            </tr>

            <tr>
              <td align="center" colspan="2"> <br>              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Confirmar Contraseña</span>
                  </div>
                  <input type="password" class="form-control" id="conf_contrasena" name="conf_contrasena">
                </div>             
              </td>
            </tr>

          </table>

          <div class="btn-box">
            <input type="submit" class="button_slide slide_down" value="Crear">

            <input type="button" class="button_slide slide_down" onclick="regresar()" value="Volver al login">
          </div>

          </form>

          </div>

        </div>
        
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          
          
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      
    </div>
  </section>
  <!-- footer section -->

  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>