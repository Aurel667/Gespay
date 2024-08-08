@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">
                    <i class="m-r-5 font-18 mdi mdi-account"></i> Étudiants
                </h6>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Département</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Nombre de tranches</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                <tr>
                                    <th scope="row"> {{$student->id}} </th>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td> {{$student->email}} </td>
                                    <td>{{$student->department}}</td>
                                    <td>{{$student->telephone}}</td>
                                    <td>{{$student->payments}}</td>
                                    <td><a class="btn btn-outline-info" href="{{route('accountant.show.student', $student->id)}}">Voir l'étudiant</a></td>
                                </tr>
                                @empty
                                    <p class="fw-bold text-secondary">Aucun étudiant</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection