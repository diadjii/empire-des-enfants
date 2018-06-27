@extends('back.layoutSuperAdmin')
@section("content")
  <div class="content-wrapper ">
    <section class="content">
      <div class="container  ">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <h1>Gestion des Utilisateurs</h1>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title center">Liste des Utilisateurs</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" onload="test()">
              <table ud="listeUser" class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Role</th>
                  <th>Desactiver/Activer</th>
                  <th>Supprimer</th>
                </tr>
                {{-- Affichage de la liste des utilisateurs  --}}
                @foreach ($users as $user)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->getNom()}} </td>
                    <td>{{$user->getPrenom()}} </td>
                    <td><span class="tag tag-success">{{$user->getRole()}}</span></td>
                    @if ($user->getStatus()==='on')
                      <td><button type="button" class="btn btn-primary" onClick="desactiveUser({{$user->getId()}})">Desactiver</button></td>
                    @else
                      <td><button type="button" class="btn btn-success"  onclick="activeUser({{$user->getId()}})">Activer</button></td>
                    @endif
                    {{-- <td><span class="btn btn-sm btn-success" onclick="editUser({{$user->getId()}})">Modifier</span></td> --}}
                    <td><span class="btn btn-sm btn-danger u" id="{{$user->getId()}}" onclick="deleteUser({{$user->getId()}})" >Supprimer</span></td>
                  </tr>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div><!-- /.row -->
      </div>
    </section>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation  Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" id="btnConfirmDeleteUser">Confirmer</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section("script")
  <script src="/js/empire.js" charset="utf-8"></script>
@endsection
