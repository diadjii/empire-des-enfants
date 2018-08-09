@extends("new.layout-admin")
@section("content")
<div class="col-md-12 thumbnails">
    <div class="card">
        <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Historique des Evenements</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Description Action</th>
                        <th>Action</th>
                        <th>Date </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($liste as $event)
                        
                    <tr>
                        <td class="text-center">{{$event->getUserId()}}</td>
                        <td>
                            @if($event->getDescription() ==null )
                                <strong class="text-danger">Aucune description</strong>
                            @else
                                {{$event->getDescription()}}
                            @endif
                        </td>
                        <td class=""><strong>{{$event->getTypeAction()}}</strong></td>
                        <td><i class="material-icons">date_range</i> {{$event->getDateTime()}}</td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>      
        </div>
    </div>
</div>
@endsection
