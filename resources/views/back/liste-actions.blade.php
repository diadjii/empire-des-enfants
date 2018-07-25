@extends('back.layoutAdmin')
@section("content")
  <div class="content-wrapper ">
    <section class="content">
      <div class="container  ">
        <h1>Consultatios des Actions</h1>
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
  
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
  
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
  
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
  
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        <div class="row align-items-center">
          <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title center">Supervision</h3>

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
