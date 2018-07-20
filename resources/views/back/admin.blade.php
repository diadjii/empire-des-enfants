@extends('back.layoutAdmin')
@section("header")
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="adminlte/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="adminlte/plugins/fullcalendar/fullcalendar.print.css" media="print">
@endsection
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Liste des Activites </h4>
              </div>
              <div class="card-body">
                <!-- the events -->
                <div id="external-events">
                  <div class="checkbox">
                   
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" onclick="showAllActiviteToDelete()"> Supprimer une Activite</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /. box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Creer une Activite</h3>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <label for="couleur">Choisir une Couleur :</label><hr>
                  <input type="color" name="couleur" id="couleur" value="#ffffff" style="width: 40%;">
                </div>
                <br>
                <div class="input-group">
                  <input id="new-activite" type="text" class="form-control" placeholder="Nom Activite">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <div class="input-group-append">
                    <button id="add-new-activite" type="button" class="btn btn-primary btn-flat">Ajouter</button>
                  </div>
                  <!-- /btn-group -->
                </div>
                <!-- /input-group -->
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade" id="deleteListeActiviteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression Activite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="testDelete" class="modal-body">
                <ul id="listActivites" class="list-group">
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <button type="button" id="conf" class="btn btn-success">Confirmer</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="deleteActiviteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Suppression Activite</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <strong>Voulez-vous supprimer l'activite ?</strong>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                  <button type="button" id="confirmDeleteActivite" class="btn btn-success">Confirmer</button>
                </div>
              </div>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
  @endsection
  @section('script')
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="adminlte/plugins/fastclick/fastclick.js"></script>
    <script src="adminlte/js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="adminlte/js/activiteScript.js" charset="utf-8"></script>
    <script>

    </script>
  @endsection
