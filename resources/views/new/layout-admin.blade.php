<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Gestion des enfants Empire
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
  />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
  />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/css/material-dashboard.css?v=2.0.2" rel="stylesheet" />
  <link href="/css/demo.css" rel="stylesheet" />
  <style>
    .acti:hover {
      cursor: move;
    }
  </style>
</head>

<body class="">
  @if (!isset($login))
  <script>
    window.location.href = "/login"
  </script>

  @endif
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Empire des Enfants
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="/images/{{session("typeCurrentUser")}}.png" />
          </div>
          <div class="user-info">
            <a href="/user/{{session("login")}}/profil" class="username">
              <span>
                {{session("login")}}
              </span>
            </a>

          </div>
        </div>
        <ul class="nav">
          @if(session("typeCurrentUser") =="admin" || session("typeCurrentUser") == "encadreur")
          <li class="nav-item ">
            <a class="nav-link" href="/administration">
                  <i class="material-icons">touch_app</i>
                  <p> Gestion des activités </p>
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/liste-dossier-des-enfants">
                  <i class="material-icons">child_care</i>
                  <p> Gestion dossier enfants </p>
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/liste-des-utilisateurs">
                    <i class="material-icons">how_to_reg</i>
                    <p> Gestion des utilisateurs </p>
                  </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/liste-des-evenements">
                    <i class="material-icons">visibility</i>
                    <p> Gestion des évenements </p>
                  </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/statistiques">
                    <i class="material-icons">timeline</i>
                    <p> Voir les Statistiques</p>
                  </a>
          </li>
          @else
          <li class="nav-item ">
            <a class="nav-link" href="/liste-des-activites">
                  <i class="material-icons">touch_app</i>
                  <p> Gestion des activités </p>
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/liste-dossiers-des-enfants">
                  <i class="material-icons">child_care</i>
                  <p> Gestion dossier enfants </p>
                </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="/liste-dossiers-medicals">
                  <i class="material-icons">local_hospital</i>
                  <p> Dossier Médical </p>
                </a>
          </li>

          {{--
          <li class="nav-item ">
            <a class="nav-link" href="/liste-des-evenements">
                    <i class="material-icons">visibility</i>
                    <p> Gestion des évenements </p>
                  </a>
          </li> --}} @endif

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">@yield("titreSection")</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
            aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            {{--
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> --}}
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link btn btn-rounded btn-primary text-white" href="/logOut">
                 
                  <i class="material-icons">directions_run</i>
                  Se Deconnecter
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @yield("content")
            <!-- end col-md-12 -->
          </div>
          <!-- end row -->
          <footer class="footer">
            <div class="container-fluid">
              <div class="copyright float-right">
                &copy;
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="http://www.connectic.net" target="_blank">Connectic</a> for a better web.
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>

  </div>
  <!--   Core JS Files   -->
  <script src="/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="/js/plugins/jquery.validate.min.js"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!--  Notifications Plugin    -->
  <script src="/js/demo.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
  @yield("script")

</body>

</html>