@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="m-r-5 font-18 mdi mdi-account"></i> Comptes
                    </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <th scope="row"> {{$user->id}} </th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->surname}}</td>
                                        <td> {{$user->email}} </td>
                                        <td>{{$user->role}}</td>
                                        <td> <a class="btn btn-danger" href="{{route('user.delete', $user)}}">Supprimer</a> </td>
                                        <td> <a class="btn btn-info" href="{{route('user.edit', $user)}}">Mettre à jour</a> </td>
                                    </tr>
                                    @empty
                                        <p class="fw-bold text-secondary">Aucun utilisateur créé</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection