@extends("new.layout-admin")
@section("titreSection")
  <h2>Statistiques Empire des Enfants</h2>
@endsection
@section("content")
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">assignment</i>
      </div>
      <h4 class="card-title">Statistique des Utilisateurs</h4>
    </div>
    <div class="card-body">
<div class="row">
        <div class="col-md-3">
            <div class="card">
              <div class="card-header card-chart card-header-warning">
                    <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                          </div>
                <div class="ct-chart" style="font-size:3em;">{{$nombreAdmin}}</div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Administrateur</h4>
              </div>
              
            </div>
          </div>
          <div class="col-md-3">
          <div class="card">
            <div class="card-header card-chart card-header-success">
                    <div class="card-icon">
                            <i class="material-icons">assignment</i>
                          </div>
              <div class="ct-chart" style="font-size:3em;">{{$nombreInfirmier}}</div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Infirmier</h4>
            </div>

          </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <div class="card-header card-chart card-header-info">
                    <div class="card-icon">
                            <i class="material-icons">style</i>
                          </div>
                <div class="ct-chart" style="font-size:3em;">{{$nombreEncadreur}}</div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Encadreur</h4>
              </div>
            </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                  <div class="card-header card-chart card-header-primary">
                        <div class="card-icon">
                                <i class="material-icons">toll</i>
                              </div>
                    <div class="ct-chart" style="font-size:3em;">{{$nombreAnimateur}}</div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">Animateur</h4>
                  </div>
                </div>
                </div>
            <h3 >Total Utilisateur(s): <span class="badge badge-default" style="font-size:1em;">{{$nombreUtilisateur}}</span></h3>
    </div>
</div>
      <!-- end content-->
    </div>

    <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment</i>
              </div>
              <h4 class="card-title">Statistique des Enfants</h4>
            </div>
            <div class="card-body">
        <div class="row">
        

                  <div class="col-md-4">
                  <div class="card">
                    <div class="card-header card-chart card-header-success">
                            <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                  </div>
                      <div class="ct-chart" style="font-size:3em;">{{$nombreEnfantRupture}}</div>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">Enfant en Rupture</h4>
                    </div>
        
                  </div>
                  </div>
        
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header card-chart card-header-info">
                            <div class="card-icon">
                                    <i class="material-icons">style</i>
                                  </div>
                        <div class="ct-chart" style="font-size:3em;">{{$nombreEnfantTraite}}</div>
                      </div>
                      <div class="card-body">
                        <h4 class="card-title">Encadreur Victime de Traite</h4>
                      </div>
          
                    </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="card">
                          <div class="card-header card-chart card-header-primary">
                                <div class="card-icon">
                                        <i class="material-icons">toll</i>
                                      </div>
                            <div class="ct-chart" style="font-size:3em;">{{$nombreEnfantPerdu}}</div>
                          </div>
                          <div class="card-body">
                            <h4 class="card-title">Enfant Perdu</h4>
                          </div>
              
                        </div>
                        </div>
                        <h3>Total Enfant(s): <span class="badge badge-default" style="font-size:1em;">{{$nombreEnfant}}</span></h3>
            </div>
        </div>
              <!-- end content-->
            </div>
    <!--  end card  -->
  </div>
  <!-- end col-md-12 -->
@endsection