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
              <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h3 class="card-title "> Dossier <strong>{{$enfant->getPrenomEnfant()}} {{$enfant->getNomEnfant()}}</strong> &nbsp;&nbsp;&nbsp;Status : {{$enfant->getStatutEnfant()}} </h3>
              </div>
                <div class="card-body">
                  {{-- Nom et Prenom --}}
                  <div class="row">
                    <div class="card">
                      <div class="card-body">

                        <div class="col-12">
                          
                          <img class="  "src="{{$img}}" alt="" height="270" width="300">
                        <span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
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
                  <br>
                  <div class="row">
                    <div class="col-6">

                      <input type="button" value="Modifier" class="btn btn-primary" data-toggle="modal" data-target="#editDossier">
                    </div>
                  </div>
                </div>
              </form>
            </div>
                <div class="card-footer " style="background-color: #fff;"> 
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title "><strong>Autres Informations</strong></h3>
                      </div>
                    </div>
                  <div class="row card-body">

                  
                      {{-- <form action="/administration/DossierEnfant/addDossierTribunal" method="post" enctype="multipart/form-data">
                      
                        <div class="input-group">
                          <input type="text" name="nom" value={{$enfant->getIdDossierEnfant()}} hidden>
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <input type="file"  id="exampleInputFile" name="doc" required>
                          <label class="custom-file-label" for="exampleInputFile">Ajouter un Dossier</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Ajouter Dossier Juridique</button>
                      </form> --}}
                      
                   
                    {{-- <div class="col-4">
                      <form action="/administration/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/DossierJuridique" method="get">
                        <button type="submit" class="btn btn-warning">T&eacutel&eacutecharger Dossier Juridique</button>
                      </form>
                    </div> --}}
                  
                      <form action="/administration/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/zoneTelechargement" method="get">
                        <button type="submit" class="btn btn-warning">Zone de T&eacutel&eacutechargement</button>
                      </form>
                  
                  </div>
                </div>
          </div>
        </div>
        <div class="modal fade" id="editDossier" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modification du Dossier Enfant</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="/administration/DossierEnfant/{{$enfant->getIdDossierEnfant()}}/EditDossierEnfant" method="post" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="col-4">
                                      @if (!isset($img))
                                        <span class="alert alert-info">Aucune photo</span>
                                        <br>
                                      @else
                                        <img class="profile-user-img img-fluid img-circle" src="{{$img}}" alt="" height="270" width="300">
                                      @endif
                                    </div>
                                  
                                  <div class="col-6">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photoEnfant" onchange="fileUploaded()">
                                        <label class="custom-file-label" id="info" for="exampleInputFile">Choisir la photo</label>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="row">
                             
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Nom</label>
                                        <input type="text" class="form-control"  name="nom" value={{$enfant->getNomEnfant()}} >
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Prenom</label>
                                        <input type="text" class="form-control" name="prenom" value={{$enfant->getPrenomEnfant()}} >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Profil</label>
                                        <input type="text" class="form-control"  name="profilEnfant" value={{$enfant->getProfil()}} >
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea  class="form-control" name="description"  >{{$enfant->getDescription()}}</textarea>
                                      </div>
                                    </div>
                                    {{--Login et Mot de Passe  --}}
                                    <div class="row">
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Date Naissance</label>
                                        <input type="date" class="form-control" name="dateNaissance" value={{$enfant->getDateNaissanceEnfant()}} >
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Lieu de dateNaissance</label>
                                        <input type="text" class="form-control" name="lieuNaissance" value={{$enfant->getLieuNaissance()}} >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Origine</label>
                                        <input type="text" class="form-control"  name="origine" value={{$enfant->getOrigineEnfant()}} >
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Adresse Enfant</label>
                                        <input type="text" class="form-control" name="adresse"value="{{$enfant->getAdresse()}}" >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Prenom Mere</label>
                                        <input type="text" class="form-control"  name="prenomMere" value="{{$parent->getPrenomMere()}}" >
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Nom Mere</label>
                                        <input type="text" class="form-control" name="nomMere" value="{{$parent->getNomMere()}}" >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Prenom Pere</label>
                                        <input type="text" class="form-control"  name="prenomPere" value="{{$parent->getPrenomPere()}}" >
                                      </div>
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Numero Telephone</label>
                                        <input type="text" class="form-control" name="adresse" value="{{$parent->getNumTel()}}" >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-6">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control" name="statu" id="">
                                          <option selected value="{{$enfant->getStatutEnfant()}}">{{$enfant->getStatutEnfant()}}</option>
                                          <option value="0">Enfant Présent</option>
                                          <option value="1">Enfant près à Partir</option>
                                          <option value="2">Enfant Parti</option>
                                        </select>
                                      </div>
                                    </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">Annuler
                                </button>
                                <button type="submit" class="btn btn-success">
                                  Confirmer
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
        </div>
      </div>
    </section>
  </div>
@endsection