@extends('layouts.app')
@section('content')
<div class="col-lg-6 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Besoins</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Reference
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Marche
                                    </th>
                                    <th class="text-center">
                                        Statut
                                    </th>
                                    <th class="text-center">
                                       Utilisateur
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($besoin as $bes)
                                <tr>
                                    <td>{{ $bes->ref }}</td>
                                    <td>{{ $bes->date ?? 'Non définie' }}</td>
                                    <td>{{ $bes->marche->nomMarche ?? 'Non défini' }}</td>
                                    <td>{{ $bes->statut->description }}</td>
                                    <td>{{ $bes->user->name }}</td>
                                </tr>
                            @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection