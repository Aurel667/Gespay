@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-4">
            @if(session('message'))
            <div class="alert alert-success"> {{session('message')}} </div>
            @endif
            <form action="{{route('store.user')}}" method="post">
                @csrf
                @method('POST')
                <label for="name" class="form-label h5 text-secondary" >Prénom <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value={{old('name')}}>

                <label for="surname" class="form-label h5 text-secondary">Nom <span class="text-danger">*</span></label>
                <input type="text" name="surname" class="form-control"  value={{old('surname')}}>

                <label for="email" class="form-label h5 text-secondary" >Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value={{old('email')}}>

                <label for="password" class="form-label h5 text-secondary" >Mot de passe de l'utilisateur <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" value={{old('password')}}>

                <label for="role" class="form-label h5 text-secondary">Rôle <span class="text-danger">*</span></label>
                <select name="role" class="form-select">
                    <option value="" disabled selected>--Choisir un rôle--</option>
                    <option value="admin">Admin</option>
                    <option value="accountant">Comptable</option>
                    <option value="supervisor">Surveillant</option>
                </select>

                <div>
                    @error('name') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('surname') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('email') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('password') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('role') <p class="text-danger"> {{$message}} </p> @enderror
                </div>
                
                <button type="submit" class="btn btn-outline-dark my-2">Valider</button>
                <p class="fs-6 text-secondary"><span class="text-danger">*</span> Ces champs sont obligatoires</p>
            </form>
        </div>
    </div>
    
@endsection