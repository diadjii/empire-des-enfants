@extends("new.layout-infirmier")
@section("titreSection")
<h2>D&eacutetail Dossier Medical</h2>
@endsection
@section("content")

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-success card-header-icon">
      <div class="card-icon">
        <i class="material-icons">local_hospital</i>
      </div>
      <h4 class="card-title">Dossier Médical de {{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</h4>
    </div>
    @if($dossier == null)
    <br>
      <div class="alert alert-primary" style="width:60%" role="alert">
       Cet enfant ne possede pas de dossier medical
      </div>
      <br>
      <span class="btn btn-success test-white" data-toggle="modal"  style="width:20%" data-target="#modalCreateDossierMedical">
          Creer Dossier Medical
        </span>
    @else

    <div class="toolbar">
      <ul class="nav justify-content-end">
        <span class="btn btn-success test-white" data-toggle="modal"  data-target="#modalAddConsultation">
          Nouvelle Consultation
        </span>
      </ul>
      <!--        Here you can write extra buttons/actions for the toolbar              -->
    </div>
    <div class="material-datatables">
      <br>
        @if($infosConsultationEnfant == null)
        <div class="alert alert-info text-black" style="width:60%" role="alert">
          Le dossier medical de l'enfant ne contient pas encore de consultation
         </div>
         @else
      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
            <th>Consultation</th>
            <th>Date Consultation</th>
            <th>Voir Details</th>
            
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Consultation</th>
            <th>Date Consultation</th>
            <th>Voir Details</th>
          </tr>
        </tfoot>
        <tbody>
          
          @foreach ( $infosConsultationEnfant as $c )
          <tr>
            <td>{{$c['consultation']}}</td>
            <td>{{$c['dateConsultation']}}</td>
            <td>
              <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#consultation{{$c['id']}}" value="Details"/>
            </td>
          </tr>
          <div class="modal fade" id="consultation{{$c['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12">
                    <div class="card-header card-header-rose card-header-text">
                      <div class="card-text">
                        <h4 class="card-title">Details Consultation</h4>
                      </div>
                    </div>
                    <form method="post" action="/UpdateConsultationMedicale" class="form-horizontal">
                      <div class="card-body ">
                        <div class="row">
                          <label class="col-sm-4 col-form-label">Type de Consultation</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="consultation" value="{{$c['consultation']}}">
                              <input type="hidden" name="idConsultation" value="{{$c['id']}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-4 col-form-label">Type de Prescription</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="prescription" value="{{$c['prescription']}}">
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-5 col-form-label">Analyse compléméntaire</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="analyseComplementaire" value="{{$c['analyse']}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-4 col-form-label">Diagnostic</label>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea name="diagnostique" class="form-control" id="" cols="40" rows="10">{{$c['diagnostique']}}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info" >Modifier</button>&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal -->
          @endforeach
        </tbody>
      </table>
      @endif  

    </div>
    <div class="modal fade" id="modalAddConsultation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
              <div class="card-header card-header-info card-header-text">
                <div class="card-text">
                  <h4 class="card-title">Ajouter une nouvelle consultation</h4>
                </div>
              </div>
              <form method="post" action="/CreateConsultationMedicale" class="form-horizontal">
                <div class="card-body ">
                  <div class="row">
                    <label class="col-sm-4 col-form-label">Type de Consultation</label>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="consultation" class="form-control">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-4 col-form-label">Type de Prescription</label>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="prescription" class="form-control">
                        <input type="hidden" name="idDossierMedicale" value="{{$idDossierMedical}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-5 col-form-label">Analyse compléméntaire</label>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="analyseComplementaire" class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-4 col-form-label">Diagnostic</label>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <textarea name="diagnostique" class="form-control" id="" cols="40" rows="10"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    @endif
    <div class="modal fade" id="modalCreateDossierMedical" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="card-header card-header-info card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Creation Dossier Medical</h4>
                  </div>
                </div>
                <form method="post" action="/CreateDossierMedicale" class="form-horizontal">
                  <div class="card-body ">
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Groupe Sanguin</label>
                      <div class="col-sm-12">
                          <div class="form-group">
                            <input type="hidden" name="idEnfant" value="{{$enfant->getIdDossierEnfant()}}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                              <select class="form-control selectpicker" name="groupeSanguin" data-style="btn btn-link" id="exampleFormControlSelect1">
                                <option value="A">Groupe A</option>
                                <option value="B">Groupe B</option>
                                <option value="O">Groupe O</option>
                              </select>
                            </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Creer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- end content-->
</div>
<!--  end card  -->
</div>
<!-- end col-md-12 -->
@endsection
</div>
</div>
<div class="fixed-plugin">
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
            </div>
          </label>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="header-title">Images</li>
      <li class="active">
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="assets/img/sidebar-1.jpg" alt="">
        </a>
      </li>
      <li>
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="assets/img/sidebar-2.jpg" alt="">
        </a>
      </li>
      <li>
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="assets/img/sidebar-3.jpg" alt="">
        </a>
      </li>
      <li>
        <a class="img-holder switch-trigger" href="javascript:void(0)">
          <img src="assets/img/sidebar-4.jpg" alt="">
        </a>
      </li>
      <li class="button-container">
        <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block btn-fill">Buy Now</a>
        <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
          Documentation
        </a>
        <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">
          Get Free Demo!
        </a>
      </li>
      <li class="button-container github-star">
        <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
      </li>
      <li class="header-title">Thank you for 95 shares!</li>
      <li class="button-container text-center">
        <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
        <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
        <br>
        <br>
      </li>
    </ul>
  </div>
</div>
