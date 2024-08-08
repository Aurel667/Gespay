@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"><span class="text-muted">Étudiant :</span> <strong>{{$student->name}} {{$student->surname}}</strong> </h6>
                    <small class="text-muted">Email </small>
                    <h6> {{$student->email}} </h6>
                    <small class="text-muted">Départment </small>
                    <h6> {{$student->department}} </h6>
                    <small class="text-muted">Téléphone </small>
                    <h6> {{$student->telephone}} </h6>
                    <small class="text-muted">Nombre de tranches </small>
                    <h6> {{$student->payments}} </h6>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tranches</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Montant</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Date</th>
                                <th></th>
                            </tr>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>{{$payment->amount}}</td>
                                        <td>
                                            @if($payment->status == true) 
                                                <div class="btn btn-success">Payé</div> 
                                                @else 
                                                    <div class="btn btn-danger">Impayé</div> 
                                            @endif 
                                        </td>
                                        <td>
                                            @if($payment->date != null)
                                                {{$payment->date}}
                                                @else
                                                <p>Pas de date</p>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <p class="fw-bold text-secondary">Aucune tranche</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection