@extends("new.layout-admin") 
@section("titreSection")
<h2>Création Dossier Enfant</h2>
@endsection
@section("content")
<div class="col-md-8 col-12 mr-auto ml-auto">
        @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{session("error")}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card card-wizard" data-color="rose" id="wizardProfile">
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
            <form action="/add-dossier-enfant" method="post" enctype="multipart/form-data">
                <div class="card-header text-center">
                    <h3 class="card-title">
                        Nouveau Dossier Enfant
                    </h3>
                    <h5 class="card-description"><strong>NB : Si les informations des parents ne sont pas connues ,mettez inconnu.</strong></h5>
                </div>
                <div class="wizard-navigation">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                            Infos Enfant
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                            Profil
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                            Infos Parents
                        </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="about">

                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                            <input type="file" id="wizard-picture" name="photoEnfant" value="{{old("photoEnfant")}}" required>
                                        </div>
                                        <h6 class="description">Choisir une photo</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Nom</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="nom" value="{{old("nom")}}" required>
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
                                            <input type="text" class="form-control" id="exampleInput11" name="prenom" value="{{old("prenom")}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-3">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Age Estimé</label>
                                            <input type="number" min=2 class="form-control datetimepicker" name="age" value="{{old("age")}}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-3">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">language</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Lieu de naissance</label>
                                            <input type="text" class="form-control" id="exampleInput11" name="lieuNaissance" value="{{old("lieuNaissance")}}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-3">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">streetview</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Adresse</label>
                                            <input type="text" class="form-control" id="exampleInput11" name="adresse" value="{{old("adresse")}}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-3">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">language</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control">Origine</label>
                                            <input type="text" class="form-control" id="exampleInput11" name="origine" value="{{old("origine")}}" required/>
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        </div>
                                    </div>
                                        <div class="form-group-lg">
                                            <label for="exampleInput1" class="label-control">Code </label>
                                            <input type="text" class="form-control" name="idEnfant"  value="{{old("idEnfant")}}" required>
                                        </div>
                                        <div class="form-group-lg">
                                            <label for="exampleInput1" class="label-control">Date Entree </label>
                                            <input type="date" class="form-control" name="dateEntree"  value="{{old("dateEntree")}}" required>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="account">
                            <h5 class="info-text"> Condition de retrouvaille </h5>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="profilEnfant" value="evt">
                                                <div class="icon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <h6>Victime de traite</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="profilEnfant" value="erf">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Rupture familial</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio">
                                                <input type="radio" name="profilEnfant" value="ep">
                                                <div class="icon">
                                                    <i class="fa fa-laptop"></i>
                                                </div>
                                                <h6>Perdu</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="exampleInput11">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="40" placeholder="Description sur l'enfant" rows="10">{{old("description")}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="address">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <h5 class="info-text"> Informations des parents </h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Prénom Pére</label>
                                        <input type="text" class="form-control" name="prenomPere" value="{{old("prenomPere")}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Prénom Mére</label>
                                        <input type="text" class="form-control" name="prenomMere" value="{{old("prenomMere")}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nom Mére</label>
                                        <input type="text" class="form-control" name="nomMere" value="{{old("nomMere")}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="tel" class="form-control" name="numTel" value="{{old("numTel")}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mr-auto">
                        <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Precedent">
                    </div>
                    <div class="ml-auto">
                        <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Suivant">
                        <input type="submit" class="btn  btn-finish btn-rose " name="finish" value="Enregistrer">
                    </div>

                </div>
            </form>
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