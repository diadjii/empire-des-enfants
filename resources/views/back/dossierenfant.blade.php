@extends('back.layoutAdmin')
@section('content')
  <div class="content-wrapper ">
    <section class="content">
      <div class="container ">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <h1>Gestion des Enfants</h1>
          </div>
        </div>
        <div class="row align-items-center">
          <!-- left column -->
          <div class="col align-self-center">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title ">Creation Dossier Enfant</h3>
              </div>
              @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/administration/DossierDesEnfants" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  {{-- Nom et Prenom --}}
                  <div class="row">
                    <h3 class="header">Infos de l'Enfant</h3>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Nom</label>
                      <input type="text" class="form-control"  name="nom" placeholder="Nom" required>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Prenom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prenom" required>
                    </div>
                  </div>
                  {{--Login et Mot de Passe  --}}
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Date Naissance</label>
                      <input type="date" class="form-control" name="dateNaissance" placeholder="Date de Naissance" required>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Lieu de dateNaissance</label>
                      <input type="text" class="form-control" name="lieuNaissance" placeholder="Lieu de Naissance" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Origine</label>
                      <input type="text" class="form-control"  name="origine" placeholder="origine" required>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Adresse Enfant</label>
                      <input type="text" class="form-control" name="adresse" placeholder="Adresse Enfant" required>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <h3 class="header">Infos des Parents</h3>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Prenom P&eacutere</label>
                      <input type="text" class="form-control" name="prenomPere" placeholder="Prenom du Pére" required>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Prenom M&eacutere</label>
                      <input type="text" class="form-control" name="prenomMere" placeholder="Prenom du Mére" required>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label for="exampleInputEmail1">Nom M&eacutere</label>
                      <input type="text" class="form-control" name="nomMere" placeholder="Nom du Mére" required>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Numero T&eacutel&eacutephone</label>
                      <input type="text" class="form-control" name="numTel" placeholder="numTel" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <label for="exampleInputFile">Choisir Photo de l'Enfant</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="photoEnfant" onchange="fileUploaded()">
                          <label class="custom-file-label" id="info" for="exampleInputFile">Choisir la photo</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Ajouter</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <h3 class="header">Profil de l'Enfant</h3>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-8">
                      <label>Profil</label>
                      <select class="form-control" name="profilEnfant" required>
                        <option selected>Selectionner le profil de l'enfant</option>
                        <option value="evt">Victime de traite</option>
                        <option value="ep">Perdu</option>
                        <option value="erf">Rupture Familial</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <label>Description : </label>
                      <textarea class="form-control" cols="90" rows="5" name="description" placeholder="Faite une description ..."></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cr&eacuteer Dossier</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script>
     function fileUploaded(){
       $("#info").text("La photo a ete ajoutee");
       $("#info").css({
         color :"green"
       })
     }
    </script>
@endsection
