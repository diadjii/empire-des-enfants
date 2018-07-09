@extends('back.layoutAdmin')
@section("content")
  <br>
  <div class="content-wrapper ">
    <section class="content">
          @if($errors->any())
            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{$errors->first()}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           @endif
      <div class="container  ">
        <div class="row align-items-center">
          <!-- left column -->
          <div class="col align-self-center">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title "> Dossier <strong>{{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</strong> </h3>
              </div>
              <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  {{-- Nom et Prenom --}}

                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Nom</label>
                      <input type="text" class="form-control"  name="nom" value={{$enfant->getNomEnfant()}} disabled>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Prenom</label>
                      <input type="text" class="form-control" name="prenom" value={{$enfant->getPrenomEnfant()}} disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Profil</label>
                      <input type="text" class="form-control"  name="nom" value={{$enfant->getProfil()}} disabled>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea  class="form-control" name="description"  disabled>{{$enfant->getDescription()}}</textarea>
                    </div>
                  </div>
                  {{--Login et Mot de Passe  --}}
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Date Naissance</label>
                      <input type="date" class="form-control" name="dateNaissance" value={{$enfant->getDateNaissanceEnfant()}} disabled>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Lieu de dateNaissance</label>
                      <input type="text" class="form-control" name="lieuNaissance" value={{$enfant->getLieuNaissance()}} disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Origine</label>
                      <input type="text" class="form-control"  name="origine" value={{$enfant->getOrigineEnfant()}} disabled>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Adresse Enfant</label>
                      <input type="text" class="form-control" name="adresse"value="{{$enfant->getAdresse()}}" disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Prenom Mere</label>
                      <input type="text" class="form-control"  name="prenomMere" value="{{$parent->getPrenomMere()}}" disabled>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Nom Mere</label>
                      <input type="text" class="form-control" name="nomMere" value="{{$parent->getNomMere()}}" disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Prenom Pere</label>
                      <input type="text" class="form-control"  name="prenomPere" value="{{$parent->getPrenomPere()}}" disabled>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Numero Telephone</label>
                      <input type="text" class="form-control" name="adresse" value="{{$parent->getNumTel()}}" disabled>
                    </div>
                  </div>
                </div>
              </form>
            </div>
                <div class="card-footer " style="background-color: #fff;"> 
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title "> Autres Informations</strong> </h3>
                      </div>
                    </div>
                  <div class="row card-body">

                    <div class="col-4">
                      <form action="/administration/DossierEnfant/addDossierTribunal" method="post" enctype="multipart/form-data">
                        {{-- <label for="exampleInputFile">Ajouter Dossier Tribunal</label> --}}
                        <div class="input-group">
                          <input type="text" name="nom" value={{$enfant->getIdDossierEnfant()}} hidden>
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <input type="file"  id="exampleInputFile" name="doc" required>
                          <label class="custom-file-label" for="exampleInputFile">Ajouter un Dossier</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Ajouter Dossier Juridique</button>
                      </form>
                      
                    </div>
                    <div class="col-4">
                      <form action="/administration/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/DossierJuridique" method="get">
                        <button type="submit" class="btn btn-warning">T&eacutel&eacutecharger Dossier Juridique</button>
                      </form>
                    </div>
                    <div class="col-4">
                      <form action="/administration/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/download-dossier-tribunal" method="get">
                        <button type="submit" class="btn btn-dark">T&eacutel&eacutecharger Dossier Tribunal</button>
                      </form>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection