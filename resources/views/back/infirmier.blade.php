        <!DOCTYPE html>
        <!--
         This is a starter template page. Use this page to start your new project from
         scratch. This page gets rid of all links and provides the needed markup only.
      -->
      <html lang="en">
      <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta http-equiv="x-ua-compatible" content="ie=edge">
         
         <title>AdminLTE 3 | Starter</title>
         
         <!-- Font Awesome Icons -->
         <link rel="stylesheet" href="/adminlte/plugins/font-awesome/css/font-awesome.min.css">
         <!-- Theme style -->
         <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
         <!-- Google Font: Source Sans Pro -->
         <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
         @yield("header")
      </head>
      <body class="hold-transition sidebar-mini">
         @if (!isset($login))
         <script>
            window.location.href = "/login"
         </script>
         
         @endif
         <div class="wrapper">
            
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
               <!-- Left navbar links -->
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                     <a href="index3.html" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                     <a href="#" class="nav-link">Contact</a>
                  </li>
               </ul>
               
               <!-- SEARCH FORM -->
               <form class="form-inline ml-3">
                  <div class="input-group input-group-sm">
                     <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                     <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                           <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </div>
               </form>
               
               <!-- Right navbar links -->
               <ul class="navbar-nav ml-auto">
                  <!-- Messages Dropdown Menu -->
                  <li class="nav-item dropdown">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-comments-o"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                           <!-- Message Start -->
                           <div class="media">
                              <img src="/adminlte/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                              <div class="media-body">
                                 <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                                 </h3>
                                 <p class="text-sm">Call me whenever you can...</p>
                                 <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
                              </div>
                           </div>
                           <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           <!-- Message Start -->
                           <div class="media">
                              <img src="/adminlte/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                              <div class="media-body">
                                 <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                                 </h3>
                                 <p class="text-sm">I got your message bro</p>
                                 <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
                              </div>
                           </div>
                           <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           <!-- Message Start -->
                           <div class="media">
                              <img src="/adminlte/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                              <div class="media-body">
                                 <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                                 </h3>
                                 <p class="text-sm">The subject goes here</p>
                                 <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
                              </div>
                           </div>
                           <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                     </div>
                  </li>
                  <!-- Notifications Dropdown Menu -->
                  <li class="nav-item dropdown">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           <i class="fa fa-envelope mr-2"></i> 4 new messages
                           <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           <i class="fa fa-users mr-2"></i> 8 friend requests
                           <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                           <i class="fa fa-file mr-2"></i> 3 new reports
                           <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/logOut">Log Out</a>
                     
                  </li>
               </ul>
            </nav>
            <!-- /.navbar -->
            
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
               <!-- Brand Logo -->
               <a href="index3.html" class="brand-link">
                  <img src="/adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="opacity: .8">
                  <span class="brand-text font-weight-light">Empire des Enfants</span>
               </a>
               
               <!-- Sidebar -->
               <div class="sidebar">
                  <!-- Sidebar user panel (optional) -->
                  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                     <div class="image">
                        <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                     </div>
                     <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                     </div>
                  </div>
                  
                  <!-- Sidebar Menu -->
                  <nav class="mt-2">
                     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                           <li class="nav-item has-treeview menu-open">
                              <a href="#" class="nav-link active">
                                 <i class="nav-icon fa fa-dashboard"></i>
                                 <p>
                                    Starter Pages
                                    <i class="right fa fa-angle-left"></i>
                                 </p>
                              </a>
                              <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                       <i class="fa fa-circle-o nav-icon"></i>
                                       <p>Active Page</p>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="#" class="nav-link">
                                       <i class="fa fa-circle-o nav-icon"></i>
                                       <p>Inactive Page</p>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           <li class="nav-item">
                              <a href="/administration/ListeDossierEnfants" class="nav-link">
                                 <i class="nav-icon fa fa-th"></i>
                                 <p>
                                    Dossiers Medicales Enfants
                                 </p>
                              </a>
                           </li>
                        </ul>
                     </nav>
                     <!-- /.sidebar-menu -->
                  </div>
                  <!-- /.sidebar -->
               </aside>
               
               <div class="content">
                  {{-- @foreach ($liste as $dossier)
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dossier->getNomEnfant()}} </td>
                        <td>{{$dossier->getPrenomEnfant()}} </td>
                        <td><form action="/administration/DossierEnfant/{{$dossier->getIdDossierEnfant()}}/DossierMedical"><button type="submit" class="btn btn-success">Voir Dossier </button></form></td>
                     </tr>
                     @endforeach --}}
                     <div class="content-wrapper ">
                        <section class="content">
                           <div class="container  ">
                              <div class="row align-items-center">
                                 <div class="col align-self-center">
                                    <div class="card card-success">
                                       <div class="card-header">
                                          <h3 class="card-title "> Liste Dossier Medicale</h3>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-body table-responsive p-0" onload="test()">
                                    <table ud="listeUser" class="table table-hover">
                                       <tr>
                                          <th>ID</th>
                                          <th>Nom</th>
                                          <th>Prenom</th>
                                          <th>Voir Dossier Medicale</th>
                                       </tr>
                                       {{-- Affichage de la liste des utilisateurs  --}}
                                       @foreach ($liste as $dossier)
                                       <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$dossier->getNomEnfant()}} </td>
                                          <td>{{$dossier->getPrenomEnfant()}} </td>
                                          <td>
                                             <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                   <div class="card-header" id="headingOne">
                                                      <h5 class="mb-0">
                                                         <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$dossier->getIdDossierEnfant()}}" aria-expanded="true" aria-controls="collapseOne">
                                                            Dossier Medicale
                                                         </button>
                                                      </h5>
                                                   </div>
                                                   <div id="{{$dossier->getIdDossierEnfant()}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                      <div class="card-body">
                                                         <form role="form" action="/Infirmier/CreateDossierMedicale" method="post">
                                                            <div class="card-body">
                                                               
                                                               <div class="row">
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Consultation</label>
                                                                     <input type="text" class="form-control"  name="consultation" value= >
                                                                     <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                                  </div>
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Prescription</label>
                                                                     <input type="text" class="form-control"  name="prescription" value= >
                                                                     <input type="text" hidden value={{$dossier->getIdDossierEnfant()}} name="idEnfant">
                                                                  </div>
                                                               </div> 
                                                               {{-- <div class="row">
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Nom</label>
                                                                     <input type="text" class="form-control"  name="nom" value= >
                                                                     <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                                  </div>
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Prenom</label>
                                                                     <input type="text" class="form-control" name="prenom" >
                                                                  </div>
                                                               </div> --}}
                                                               <div class="row">
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Analyse Complementaire</label>
                                                                     <input type="text" class="form-control"  name="analyseComplementaire" value= >
                                                                     
                                                                  </div>
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Groupe Sanguin</label>
                                                                     <input type="text" class="form-control" name="groupeSanguin" >
                                                                  </div>
                                                               </div>
                                                               <div class="row">
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Diagnostique</label>
                                                                     <input type="text" class="form-control"  name="diagnostique" value= >
                                                                     
                                                                  </div>
                                                                  <div class="col-6">
                                                                     <label for="exampleInputEmail1">Date Derniere Visite</label>
                                                                     <input type="text" class="form-control" name="derniereVisite" >
                                                                  </div>
                                                               </div>
                                                               <br>
                                                               <button type="submit" class="btn btn-primary">Creer Dossier</button>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                          {{-- <td><span class="tag tag-success">{{$dossier->getRole()}}</span></td>
                                          @if ($dossier->getStatus()==='on')
                                          <td><button type="button" class="btn btn-primary" onClick="desactiveUser({{$dossier->getId()}})">Desactiver</button></td>
                                          @else
                                          <td><button type="button" class="btn btn-success"  onclick="activeUser({{$dossier->getId()}})">Activer</button></td>
                                          @endif --}}
                                          
                                       </tr>
                                       @endforeach
                                    </table>
                                 </div>
                                 {{-- @foreach ($liste as $dossier)
                                    <div class="accordion" id="accordionExample">
                                       <div class="card">
                                          <div class="card-header" id="headingOne">
                                             <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$dossier->getIdDossierEnfant()}}" aria-expanded="true" aria-controls="collapseOne">
                                                   {{$dossier->getNomEnfant()}}
                                                </button>
                                             </h5>
                                          </div>
                                          <div id="{{$dossier->getIdDossierEnfant()}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                             <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach --}}
                                 </div>
                              </div>
                           </section>
                        </div>
                        
                        <aside class="control-sidebar control-sidebar-dark">
                           <!-- Control sidebar content goes here -->
                           <div class="p-3">
                              <h5>Title</h5>
                              <p>Sidebar content</p>
                           </div>
                        </aside>
                        <!-- /.control-sidebar -->
                        
                        <!-- Main Footer -->
                        <footer class="main-footer">
                           <!-- To the right -->
                           <div class="float-right d-none d-sm-inline">
                              Anything you want
                           </div>
                           <!-- Default to the left -->
                           <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
                        </footer>
                     </div>
                     <!-- ./wrapper -->
                     
                     <!-- REQUIRED SCRIPTS -->
                     
                     <!-- jQuery -->
                     <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
                     <!-- Bootstrap 4 -->
                     <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                     <!-- AdminLTE App -->
                     <script src="/adminlte/js/adminlte.min.js"></script>
                     <script>
                        $('.collapse').collapse(function(){
                           toggle:false
                        })
                     </script>
                  </body>
                  </html>
