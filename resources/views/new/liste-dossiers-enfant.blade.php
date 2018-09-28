@extends("new.layout-infirmier")
@section("content")
         
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Dossier Enfant</h4>
                  <form class="navbar-form">
                      <div class="input-group ">
                        <input type="text" id="chercherEnfant" value="" class="form-control" placeholder="Rechechet un enfant......">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                          <i class="material-icons">search</i>
                          <div class="ripple-container"></div>
                        </button>
                      </div>
                    </form>
                </div>
                <div class="card-body">
                 
                  <div class="toolbar">
                    <ul class="nav justify-content-end">
                      <a  href="/create-dossier-enfant"class="btn btn-primary">
                        Nouveau Dossier
                      </a>
                    </ul>
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
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
                            <td>{{$dossier->getPrenomEnfant()}} </td>
                            <td><a href="/dossier-enfant/{{$dossier->getIdDossierEnfant()}}/details" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                            </td>
                            <td> <a href="/dossier-enfant/{{$dossier->getIdDossierEnfant()}}/dossier-medical" ><i class="material-icons btn-success">local_hospital</i></a></td>
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
  
  @endsection
 @section("script")
 <script>
    $(function() {
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