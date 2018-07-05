@extends("back.layoutInfirmier")
@section("content")
    <div class="content-wrapper ">
                        <section class="content">
                           <div class="container  ">
                              <div class="row align-items-center">
                                 <div class="col align-self-center">
                                    <div class="card card-success">
                                       <div class="card-header">
                                           <h3 class="card-title "> Liste Dossier Medical</h3>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="card-body table-responsive p-0" onload="test()">
                                    <table ud="listeUser" class="table table-hover">
                                       <tr>
                                          <th>ID</th>
                                          <th>Nom</th>
                                          <th>Prenom</th>
                                           <th>Voir Dossier Medical</th>
                                       </tr>
                                       {{-- Affichage de la liste des utilisateurs  --}}
                                       @foreach ($liste as $dossier)
                                       <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$dossier->getNomEnfant()}} </td>
                                          <td>{{$dossier->getPrenomEnfant()}} </td>
                                           <td>
                                               <form action="/Infirmier/DossierMedicale/{{$dossier->getIdDossierEnfant()}}/Consultation">
                                                   <button type="submit" class="btn btn-primary">Voir Dossier</button>
                                               </form>
                                           </td>
                                           {{-- <div class="accordion" id="accordionExample">
                                              <div class="card">
                                                 <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$dossier->getIdDossierEnfant()}}" aria-expanded="true" aria-controls="collapseOne">
                                                          Dossier Medicale
                                                       </button>
                                                    </h5>
                                                 </div>
                                                 <div id="{{$dossier->getIdDossierEnfant()}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                       <form role="form" action="/Infirmier/CreateDossierMedicale" method="post">
                                                          <div class="card-body">

                                                             <div class="row">
                                                                <div class="col-6">
                                                                   <label for="exampleInputEmail1">Consultation</label>
                                                                   <input type="text" class="form-control"  name="consultation" value= >
                                                                   <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                                </div>
                                                                <div class="col-6">
                                                                   <label for="exampleInputEmail1">Prescription</label>
                                                                   <input type="text" class="form-control"  name="prescription" value= >
                                                                   <input type="text" hidden value={{$dossier->getIdDossierEnfant()}} name="idEnfant">
                                                                </div>
                                                             </div>

                                                             <div class="row">
                                                                <div class="col-6">
                                                                   <label for="exampleInputEmail1">Analyse Complementaire</label>
                                                                   <input type="text" class="form-control"  name="analyseComplementaire" value= >

                                                                </div>
                                                                <div class="col-6">
                                                                   <label for="exampleInputEmail1">Groupe Sanguin</label>
                                                                   <input type="text" class="form-control" name="groupeSanguin" >
                                                                </div>
                                                             </div>
                                                             <div class="row">
                                                                <div class="col-6">
                                                                   <label for="exampleInputEmail1">Diagnostique</label>
                                                                   <input type="text" class="form-control"  name="diagnostique" value= >

                                                                </div>
                                                                <div class="col-6">
                                                                   <label for="exampleInputEmail1">Date Derniere Visite</label>
                                                                   <input type="text" class="form-control" name="derniereVisite" >
                                                                </div>
                                                             </div>
                                                             <br>
                                                             <button type="submit" class="btn btn-primary">Creer Dossier</button>
                                                          </div>
                                                       </form>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div> --}}
                                          {{-- <td><span class="tag tag-success">{{$dossier->getRole()}}</span></td>
                                          @if ($dossier->getStatus()==='on')
                                          <td><button type="button" class="btn btn-primary" onClick="desactiveUser({{$dossier->getId()}})">Desactiver</button></td>
                                          @else
                                          <td><button type="button" class="btn btn-success"  onclick="activeUser({{$dossier->getId()}})">Activer</button></td>
                                          @endif --}}
                                          
                                       </tr>
                                       @endforeach
                                    </table>
                                 </div>
                                 {{-- @foreach ($liste as $dossier)
                                    <div class="accordion" id="accordionExample">
                                       <div class="card">
                                          <div class="card-header" id="headingOne">
                                             <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$dossier->getIdDossierEnfant()}}" aria-expanded="true" aria-controls="collapseOne">
                                                   {{$dossier->getNomEnfant()}}
                                                </button>
                                             </h5>
                                          </div>
                                          <div id="{{$dossier->getIdDossierEnfant()}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                             <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach --}}
                                 </div>
                              </div>
                           </section>
                        </div>

@endsection
@section('script')
                     <script>
                        $('.collapse').collapse(function(){
                           toggle:false
                        })

                        function dossierMedicale(idDossierEnfant) {
                            $.get("/Infirmier/DossierMedicale/" + idDossierEnfant + "/Consultation").then(function (response) {
                                console.log(response)
                            }).fail(function (r) {
                                console.log(r);
                            })
                        }
                     </script>
@endsection
