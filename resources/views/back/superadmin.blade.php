@extends('back.layoutSuperAdmin')
@section("content")
  <div class="content-wrapper ">
    <section class="content">
      <div class="container ">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <h1>Gestion des Utilisateurs</h1>
          </div>
        </div>
        <div class="row align-items-center">
          <!-- left column -->
          <div class="col align-self-center">
            <!-- general form elements -->
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <p id="message">
                Holy guacamole!You should check in on some of those fields below.
              </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Creation Compte Utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formAddUser">
                <div class="card-body">
                  {{-- Nom et Prenom --}}
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
                      <label for="exampleInputEmail1">Login</label>
                      <input type="text" class="form-control" name="login" placeholder="Login" required>
                    </div>
                    <div class="col-6">
                      <label for="exampleInputEmail1">Mot de Passe</label>
                      <input type="text" class="form-control" name="password" placeholder="Mot de Passe" required>
                      <a id="generatePassword" class="text text-red">Generer un mot de passe</a>
                    </div>
                  </div>
                  {{--Type d'Utilisateur  --}}
                  <div class="row">
                    <label>Type Utilisateur</label>
                    <select class="form-control" name="typeUser" required>
                      <option value=""selected>Selectionner le type d'utilisateur</option>
                      <option value="admin">Administrateur</option>
                      <option value="infirm">Infirmier</option>
                      <option value="enca">Encadreur</option>
                      <option value="anim">Animateur</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cr&eacuteer</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
@section('script')
  <script src="js/empire.js" charset="utf-8"></script>
@endsection
