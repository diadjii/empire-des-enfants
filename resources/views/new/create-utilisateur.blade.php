@extends("new.layout-admin")
@section("titreSection")
<h2>Gestion des Utilisateurs</h2>
@endsection
@section("content")
      <div class="col-md-8 col-12 mr-auto ml-auto">
        <!--      Wizard container        -->
        <div class="wizard-container">
          <div class="card card-wizard" data-color="rose" id="wizardProfile">
            <form action="/save-user" method="post">
              <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
              <div class="card-header text-center">
                <h3 class="card-title">
                  Créer un Utilisateur
                </h3>
                <h5 class="card-description">Les informations concernant l'utilisateurs.</h5>
              </div>
              <div class="wizard-navigation">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                      A propos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                      Type d'utilisateur
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                      Terminer
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="about">
                    <h5 class="info-text"> Vous pouvez insérer les informations à propos de l'utilisateur</h5>
                    <div class="row justify-content-center">
                      <div class="col-sm-6">
                        <div class="input-group form-control-lg">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Nom</label>
                            <input type="text" class="form-control" id="exampleInput1" name="nom" required>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                          </div>
                        </div>
                        <div class="input-group form-control-lg">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">record_voice_over</i>
                            </span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput11" class="bmd-label-floating">Prenom</label>
                            <input type="text" class="form-control" id="exampleInput11" name="prenom" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-10 mt-3">
                        <div class="input-group form-control-lg">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">assignment</i>
                            </span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">login</label>
                            <input type="text" class="form-control" id="exampleemalil" name="login" required>
                          </div>
                          <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">lock_outline</i>
                                </span>
                              </div>
                          <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Mot de Passe</label>
                                <input type="text" class="form-control" id="exampleemalil" name="password" required>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="account">
                    <h5 class="info-text"> Choisir un type d'utilisateur </h5>
                    <div class="row justify-content-center">
                      <div class="col-lg-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="choice" data-toggle="wizard-radio">
                              <input type="radio" name="typeUser" value="admin">
                              <div class="icon">
                                <i class="fa fa-pencil"></i>
                              </div>
                              <h6>Administrateur</h6>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="choice" data-toggle="wizard-radio">
                              <input type="radio" name="typeUser" value="enca">
                              <div class="icon">
                                <i class="fa fa-terminal"></i>
                              </div>
                              <h6>Educateur</h6>
                            </div>
                          </div>
                          <div class="col-sm-3">
                              <div class="choice" data-toggle="wizard-radio">
                                <input type="radio" name="typeUser" value="anim">
                                <div class="icon">
                                  <i class="fa fa-terminal"></i>
                                </div>
                                <h6>Animateur</h6>
                              </div>
                            </div>
                          <div class="col-sm-3">
                            <div class="choice" data-toggle="wizard-radio">
                              <input type="radio" name="typeUser" value="infirm">
                              <div class="icon">
                                <i class="fa fa-laptop"></i>
                              </div>
                              <h6>Infirmier</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="address">
                    <div class="row justify-content-center">
                      <div class="col-sm-12">
                        <h5 class="info-text"> Merci pour la création de cette utilisateur qui va certainement utlisé l'application. </h5>
                        <h5 class="info-text"> Merci de lui indiquer les régles et méthodes d'utlisations. </h5>
                        <h5 class="info-text"> Vous pouvez lui suggérer de lire la page reglementation. </h5>
                      </div>
                   </div>
                  </div>
              <div class="card-footer">
                <div class="mr-auto">
                  <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Precedent">
                </div>
                <div class="ml-auto">
                  <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Suivant">
                  <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Enregistrer" style="display: none;">
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
          </div>
        </div>
        <!-- wizard container -->
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