@extends("new.layout-admin")
@section("titreSection")
<h2>Voir Profil</h2>
@endsection
@section("content")
<div class="col-md-8">
  <div class="card">
    <div class="card-header card-header-icon card-header-rose">
      <div class="card-icon">
        <i class="material-icons">perm_identity</i>
      </div>
      <h4 class="card-title">Profil Utilisateur
       
      </h4>
    </div>
    @if (session('ok'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{session("ok")}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card-body">
      <form method="POST" action="/user/{{$infoUser->getLogin()}}/edit-profil">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <input type="text" class="form-control" name="login" value="{{$infoUser->getLogin()}}" hidden>
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Nom</label>
              <input type="text" name="nom" class="form-control" value="{{$infoUser->getNom()}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Prenom</label>
              <input type="text" class="form-control" name="prenom" value="{{$infoUser->getPrenom()}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" hidden name="passsword" value="{{$infoUser->getPassword()}}">
              <label class="bmd-label-floating">Nouveau Mot de Passe</label>
              <input type="text" class="form-control" name="new-password">
            </div>
          </div>
        </div>

        {{--
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>A propos</label>
              <div class="form-group">
                <label class="bmd-label-floating"> Comment parvenez vous à gérer vos responsabilités au sein de la fondation.</label>
                <textarea class="form-control" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div> --}}
        <button type="submit" class="btn btn-rose pull-right">Mettre à jour Profil</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="card card-profile">
    <div class="card-avatar">
      <a href="#pablo">
          <img src="/images/{{session("typeCurrentUser")}}.png" />
                  </a>
    </div>
    <div class="card-body">
      <h6 class="card-category text-gray">Role {{session("typeCurrentUser")}}</h6>
      <h4 class="card-title">Description</h4>
      <p class="card-description">
        L'association Empire des enfants mène une action humanitaire en faveur des enfants en situation de rue. C'est l'engagement
        sans faille d'une équipe d'hommes et de femmes, qui depuis prés de 15 ans sont déterminées à réduire le nombre d'enfants
        dans les rues de Dakar.
      </p>
    </div>
  </div>
</div>
@endsection