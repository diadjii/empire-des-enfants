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
                  {{-- <div class="external-event bg-success">Lunch</div>
                  <div class="external-event bg-warning">Go home</div>
                  <div class="external-event bg-info">Do homework</div>
                  <div class="external-event bg-primary">Work on UI design</div>
                  <div class="external-event bg-danger">Sleep tight</div> --}}
                  <div class="checkbox">
                    <label for="drop-remove">
                      <input type="checkbox" id="drop-remove">
                      remove after drop
                    </label>
                  </div>
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
                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                  <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                  <ul class="fc-color-picker" id="color-chooser">
                    <li><a class="text-primary" href="#"><i class="fa fa-square"></i></a></li>
                    <li><a class="text-warning" href="#"><i class="fa fa-square"></i></a></li>
                    <li><a class="text-success" href="#"><i class="fa fa-square"></i></a></li>
                    <li><a class="text-danger" href="#"><i class="fa fa-square"></i></a></li>
                    <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  </ul>
                </div>
                <!-- /btn-group -->
                <div class="input-group">
                  <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                  <div class="input-group-append">
                    <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
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
