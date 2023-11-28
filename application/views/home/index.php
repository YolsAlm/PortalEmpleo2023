   <?php
    if (isset($_SESSION["perfil"]) && ($_SESSION["baneado"] == 1)) {
      echo '
    <section>
    <div class="container">
      <div class="row">
        <div class="col" data-aos="fade-left">
          <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3">   
          <h3>¡Fallo: Usuario baneado!</h3> 
            <p>
              Su usuario está baneado y no puede acceder a la página.
            </p>
            <p>
              Contacte con un administrador para solucionarlo.
            </p>
            <p>
              Se ha cerrado su sesión.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>
    ';

      $this->session->sess_destroy();
    } elseif (isset($_SESSION["perfil"]) && ($_SESSION["borrado"] == 1)) {
      echo '
    <section>
    <div class="container">
      <div class="row">
        <div class="col" data-aos="fade-left">
          <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3">   
          <h3>¡Fallo: Usuario eliminado!</h3> 
            <p>
              Su usuario ha sido eliminado, por lo que no puede acceder a la página.
            </p>
            <p>
              Contacte con un administrador para solicitar su recuperación.
            </p>
            <p>
              Se ha cerrado su sesión.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>
    ';

      $this->session->sess_destroy();
    } else {
      if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 4)) {
        echo '
      <section>
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Panel de control del administrador</h2>
        </div>
 
        <div class="row">
          <div class="col" data-aos="fade-left">
            <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3">
            <h3>¡Bienvenido Administrador!</h3>    
              <p>
                Página principal del Administrador del sitio. 
              </p>
              <p>
                Puede realizar las gestiones correspondientes a través del menú.
              </p>
            </div>
          </div>
        </div>
 
      </div>
    </section>
      ';
      } elseif (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 3)) {
        if ($validacion_empresa->aprobada == "no") {
          echo '
          <section>
          <div class="container">
            <div class="row">
              <div class="col" data-aos="fade-left">
                <div class="text-center pt-4 pt-lg-0 pl-0 pl-lg-3">   
                  <p>
                    Su empresa no está validada. Espere hasta que un administrado valdie su solicitud.
                  </p>
                  <p>
                    Se ha cerrado su sesión.
                  </p>
                  <p>
                    Contacte con un administrador para solucionarlo.
                  </p>
                </div>
              </div>
            </div>
      
          </div>
        </section>
          ';
          $this->session->sess_destroy();
        } else {
          echo '
      <section>
        <div class="container">
          <div class="row">
            <div class="col text-center" data-aos="fade-up">
              <div class="pt-4 pt-lg-0 pl-0 pl-lg-3">
                <h3>¡Bienvenido!</h3> 
                <p>Ha iniciado sesión como un gerente asociado a nuestro portal de empleo.</p>
                <p>Dispone de una serie de opciones a través del menú para gestionar las ofertas y los empleados de su empresa.</p>
              </div>
            </div>
          </div>
   
        </div>
      </section>
        ';
        }
      } elseif (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 2)) {
        echo '
        <section>
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>¡Bienvenido empleado!</h2>
          </div>
   
          <div class="row">
            <div class="col" data-aos="fade-left">
              <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
                <p>Podrá revisar las ofertas activas de la empresa y rechazas usuarios inscritos en las ofertas</p>
              </div>
            </div>
          </div>
  
        </div>
      </section>
      ';
      } elseif (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 1) || !isset($_SESSION["perfil"])) {
        echo '
    <section>
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Sobre nosotros</h2>
        </div>
 
        <div class="row">
          <div class="col" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
              <p>En nuestra web podrá visualizar diferentes ofertas que las propias empreasas ofertaran.</p>
              <p>Registrese tanto para buscar las ofertas activadas como para publicar sus futuras ofertas de empleo para los usuarios.</p>
              <p>Esta base de datos esta echa para la ayuda de empleo de todo tipo de personas que quieran registrarse en ella.</p>
            </div>
          </div>
        </div>

      </div>
    </section>
      ';
      }
    }

    ?>