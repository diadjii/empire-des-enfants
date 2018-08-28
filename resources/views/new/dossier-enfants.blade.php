@extends("new.layout-admin") 
@section("titreSection")
<h2>Gestion Dossiers des Enfants</h2>
@endsection
@section("content")

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">assignment</i>
      </div>
      <h4 class="card-title">Dossiers Enfants</h4>
    </div>
    <div class="card-body">
      @if(session("typeCurrentUser") == "admin" || session("typeCurrentUser") == "encadreur")
      <div class="toolbar">
        <ul class="nav justify-content-end">
          <a href="/create-dossier-enfant" class="btn btn-primary">
                          Nouveau Dossier
                        </a>
        </ul>
        <!--        Here you can write extra buttons/actions for the toolbar              -->
      </div>
      @endif
      <div class="material-datatables">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Details</th>
              <th>Dossier Medical</th>
              <th>Notes</th>
              <th class="disabled-sorting">Status</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Details</th>
              <th>Dossier Medical</th>
              <th>Notes</th>
              <th class="disabled-sorting">Status</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($liste as $dossier)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$dossier->getNomEnfant()}} </td>
              <td>{{$dossier->getPrenomEnfant()}} </td>
              <td><a href="/dossier-enfant/{{$dossier->getIdDossierEnfant()}}/details" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
              </td>
              <td> <a href="/dossier-enfant/{{$dossier->getIdDossierEnfant()}}/dossier-medical"><i class="material-icons btn-success">local_hospital</i></a></td>
              <td><a href="/dossier-enfant/{{$dossier->getIdDossierEnfant()}}/liste-des-notes" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">event_note</i></a>
              </td>
              <td>{{$dossier->getStatutEnfant()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- end content-->
  </div>
  <!--  end card  -->
</div>
<!-- end col-md-12 -->

<footer class="footer">
  <div class="container-fluid">
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="http://www.Connectic.net" target="_blank">Connectic</a> for a better web.
    </div>
  </div>
</footer>
</div>
</div>
{{-- <div class="fixed-plugin">
  <div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
    <ul class="dropdown-menu">
      <li class="header-title"> Sidebar Filters</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger active-color">
          <div class="badge-colors ml-auto mr-auto">
            <span class="badge filter badge-purple" data-color="purple"></span>
            <span class="badge filter badge-azure" data-color="azure"></span>
            <span class="badge filter badge-green" data-color="green"></span>
            <span class="badge filter badge-warning" data-color="orange"></span>
            <span class="badge filter badge-danger" data-color="danger"></span>
            <span class="badge filter badge-rose active" data-color="rose"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="header-title">Sidebar Background</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="ml-auto mr-auto">
            <span class="badge filter badge-black active" data-background-color="black"></span>
            <span class="badge filter badge-white" data-background-color="white"></span>
            <span class="badge filter badge-red" data-background-color="red"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger">
          <p>Sidebar Mini</p>
          <label class="ml-auto">
              <div class="togglebutton switch-sidebar-mini">
                <label>
                  <input type="checkbox">
                  <span class="toggle"></span>
                </label>
  </div>
  </label>
  <div class="clearfix"></div>
  </a>
  </li>
  <li class="adjustments-line">
    <a href="javascript:void(0)" class="switch-trigger">
      <p>Sidebar Images</p>
      <label class="switch-mini ml-auto">
              <div class="togglebutton switch-sidebar-image">
                <label>
                  <input type="checkbox" checked="">
                  <span class="toggle"></span>
                </label>
</div> --}}

</div>
</div>
@endsection
 
@section("script")
<script>
  $(document).ready(function() {
         // Initialise the wizard
         demo.initMaterialWizard();
         setTimeout(function() {
           $('.card.card-wizard').addClass('active');
         }, 600);
       });
</script>
@endsection