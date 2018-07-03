@extends('back.layoutAdmin')
@section("content")
<br>  
<div class="content-wrapper ">
  <section class="content">
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
                  <textarea  class="form-control" name="description"  disabled>
                      {{$enfant->getDescription()}}
                  </textarea>  
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
                <input type="text" class="form-control" name="adresse"value={{$enfant->getAdresse()}} disabled>
              </div>
            </div>
            <div class="row">
                <div class="col-6">
                  <label for="exampleInputEmail1">Prenom Mere</label>
                  <input type="text" class="form-control"  name="prenomMere" value={{$parent->getPrenomMere()}} disabled>
                </div>
                <div class="col-6">
                  <label for="exampleInputEmail1">Nom Mere</label>
                  <input type="text" class="form-control" name="nomMere" value={{$parent->getNomMere()}} disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                  <label for="exampleInputEmail1">Prenom Pere</label>
                  <input type="text" class="form-control"  name="prenomPere" value={{$parent->getPrenomPere()}} disabled>
                </div>
                <div class="col-6">
                  <label for="exampleInputEmail1">Numero Telephone</label>
                  <input type="text" class="form-control" name="adresse" value={{$parent->getNumTel()}} disabled>
                </div>
              </div>
          {{-- <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cr&eacuteer Dossier</button>
          </div> --}}
        </div>
      </form>
    </div>
  </div>
</div>
</div>
  </section>
</div>
@endsection