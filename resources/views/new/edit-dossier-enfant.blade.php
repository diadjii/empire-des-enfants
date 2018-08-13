@extends("new.layout-admin")

@section("titreSection")
<h2>D&eacutetails Dossier Enfant</h2>
@endsection
@section("content")
<div class="col-md-10 col-12 mr-auto ml-auto">
    <form id="createDossier" action="/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/EditDossierEnfant" method="post" enctype="multipart/form-data">
        {{-- <div class="col-md-8"> --}}
            <div class="card card-profile">
                <div class="card-avatar">
                    <img class="img" src="{{Storage::url("document/".$enfant->getIdDossierEnfant()."/profil-".$enfant->getIdDossierEnfant())}}" />
                </div>
                <div class="card-body">
                    <h3 class="card-category text-gray">Dossier de <strong>{{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</strong></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Nom</label>
                                    <input type="text" class="form-control" name="nom" = value="{{$enfant->getNomEnfant()}}" />
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Prenom</label>
                                    <input type="text" class="form-control" name="prenom" = value="{{$enfant->getPrenomEnfant()}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Lieu de Naissance</label>
                                    <input type="text" class="form-control" name="lieuNaissance" = value="{{$enfant->getLieuNaissance()}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Date de Naissance</label>
                                    <input type="date" class="form-control" name="dateNaissance" = value="{{$enfant->getDateNaissanceEnfant()}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Origine</label>
                                    <input type="text" class="form-control" name="origine" = value="{{$enfant->getOrigineEnfant()}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" = value="{{$enfant->getAdresse()}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Prenom Mere</label>
                                    <input type="text" class="form-control" name="prenomMere" = value="{{$parent->getPrenomMere()}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Nom Mere</label>
                                    <input type="text" class="form-control" name="nomMere" = value="{{$parent->getnomMere()}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Prenom Pere</label>
                                    <input type="text" class="form-control" name="prenomPere" = value="{{$parent->getPrenomPere()}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-control-lg">
                                <div class="form-group">
                                    <label class="label-control">Numero Telephone</label>
                                    <input type="text" class="form-control" name="numTel" = value="{{$parent->getNumTel()}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="row">
                                 
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-radio">
                                            <input type="radio" name="profilEnfant" value="evt" {{$evt}}>
                                            <div class="icon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <h6>Victime de traite</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-radio">
                                            <input type="radio" name="profilEnfant" value="erf" {{$erf}}>
                                            <div class="icon">
                                                <i class="fa fa-terminal"></i>
                                            </div>
                                            <h6>Rupture familial</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-radio">
                                            <input type="radio" name="profilEnfant" value="ep" {{$ep}}>
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
                                <div class="form-group">
                                    <label for="exampleInput11" >Description</label>
                                    <textarea name="description" class="form-control"id="" cols="40" placeholder="Description sur l'enfant" rows="10">{{$enfant->getDescription()}}</textarea>
                                </div>
                            </div>
                        </div>
                        @if(session("typeCurrentUser") == "admin" || session("typeCurrentUser") == "encadreur")
                        <button type="submit" class="btn btn-lg btn-primary" >Mettre à jour</button>
                    </form>
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-text card-header-success">
                                    <div class="card-text">
                                        <h4 class="card-title">Dossier Médical</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-success" ><a class="text-white" href="/DossierMedicale/{{$enfant->getIdDossierEnfant()}}/Consultation">En savoir plus</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-text card-header-warning">
                                    <div class="card-text">
                                        <h4 class="card-title">Zone de Téléchargements</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-warning"><a class="text-white" href="/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/zoneTelechargement">En savoir plus</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                {{-- </div> --}}
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