@extends("new.layout-admin") 
@section("titreSection")
<h2>Gestion Utilisateurs</h2>
@endsection
 
@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">assignment</i>
      </div>
      <h4 class="card-title">Utilisateurs</h4>
    </div>
    <div class="card-body">
      <div class="toolbar">
        <ul class="nav justify-content-end">
          <a class="btn btn-primary" href="/create-utilisateur">Nouveau utilisateur</a> 
        </ul>
        <!--        Here you can write extra buttons/actions for the toolbar              -->
      </div>
      <div class="material-datatables">
        <table id="datatables" class="table  table-hover" cellspacing="0" width="100%" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Role</th>
              <th>Desactiver/Activer</th>
              <th>Reinitialiser Mot de Passe</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$user->getNom()}} </td>
              <td>{{$user->getPrenom()}} </td>
              <td><span class="tag tag-success">{{$user->getRole()}}</span></td>
              @if ($user->getStatus()==='on')
              <td><button type="button" class="btn btn-sm btn-primary" onClick="desactiveUser({{$user->getId()}})">Desactiver</button></td>
              @else
              <td><button type="button" class="btn btn-sm btn-success" onclick="activeUser({{$user->getId()}})">Activer</button></td>
              @endif {{--
              <td><span class="btn btn-sm btn-success" onclick="editUser({{$user->getId()}})">Modifier</span></td> --}}
              <th><span class="btn btn-sm btn-secondary" onclick="resetPassword({{$user->getId()}})">Reinitialiser</span></th>
              @if(session("typeCurrentUser") == "admin")
              <td><span class="btn btn-sm btn-danger u" id="{{$user->getId()}}" onclick="deleteUser({{$user->getId()}})">Supprimer</span></td>
              @else
              <td><span class="btn btn-sm btn-danger u" id="{{$user->getId()}}" disabled>Supprimer</span></td>
              @endif
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    <!-- end content-->
  </div>
  <!--  end card  -->
</div>
<!-- end col-md-12 -->


<!-- modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Suppression Utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer cet utilisateur</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnConfirmDeleteUser">Confirmer</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reinitialisation Mot de Passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInput1" class="bmd-label-floating">Nouveau Mot de Passe</label>
          <input type="text" class="form-control" id="exampleemalil" name="newPassword" required>
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnConfirmResetPassword">Confirmer</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
@endsection
 
@section("script")
<script src="/js/empire.js" charset="utf-8"></script>
@endsection