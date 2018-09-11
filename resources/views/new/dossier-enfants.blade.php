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
      <div class="toolbar">
      @if(session("typeCurrentUser") == "admin" || session("typeCurrentUser") == "encadreur")
        <ul class="nav justify-content-end">
          <a href="/create-dossier-enfant" class="btn btn-primary">
                          Nouveau Dossier
                        </a>
        </ul>
        <!--        Here you can write extra buttons/actions for the toolbar              -->
        @endif
        <div class="col-md-4">

          <form class="navbar-form">
            <div class="input-group">
              <input type="text" id="chercherEnfant" value="" class="form-control" placeholder="Rechercher un enfant..... ">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>
        </div>
      </div>
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
          <tbody class="liste">
            @foreach ($liste as $dossier)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$dossier->getNomEnfant()}} </td>
              <td  class="id">{{$dossier->getPrenomEnfant()}} </td>
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


@endsection
 
@section("script")
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/particles.min.js"></script>
<script>
  $(document).ready(function() {
         // Initialise the wizard
         demo.initMaterialWizard();
         setTimeout(function() {
           $('.card.card-wizard').addClass('active');
         }, 600);

    $('.liste tr').each(function(){
      $(this).attr('data-search-term', $(this).text().toLowerCase());
    });

    $('#chercherEnfant').on('keyup', function(){

    var searchTerm = $(this).val().toLowerCase();

        $('.liste tr').each(function(){
          if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
              $(this).show();
          } else {
            $(this).hide();
          }

        });
    });

  });
</script>
@endsection