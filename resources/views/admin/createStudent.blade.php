@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-4">
            @if(session('message'))
            <div class="alert alert-success"> {{session('message')}} </div>
            @endif
            <form action="{{route('store.student')}}" method="post">
                @csrf
                @method('POST')
                <label for="name" class="form-label h5 text-secondary" >Prénom <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value={{old('name')}}>

                <label for="surname" class="form-label h5 text-secondary">Nom <span class="text-danger">*</span></label>
                <input type="text" name="surname" class="form-control"  value={{old('surname')}}>

                <label for="email" class="form-label h5 text-secondary" >Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value={{old('email')}}>

                <label for="department" class="form-label h5 text-secondary" >Département <span class="text-danger">*</span></label>
                <input type="text" name="department" class="form-control" value={{old('department')}}>

                <label for="telephone" class="form-label h5 text-secondary">Téléphone <span class="text-danger">*</span></label>
                <input type="number" name="telephone" class="form-control" value={{old('telephone')}}>

                <label for="payments" class="form-label">Nombre de tranches</label>
                <select name="payments" id="" class="form-select">
                    <option disabled selected>--Choisir le nombre de tranches--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>

                </select>
                <div>
                    @error('name') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('surname') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('email') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('department') <p class="text-danger"> {{$message}} </p> @enderror
                    @error('telephone') <p class="text-danger"> {{$message}} </p> @enderror
                </div>
                
                <button type="submit" class="btn btn-outline-dark my-2">Valider</button>
                <p class="fs-6 text-secondary"><span class="text-danger">*</span> Ces champs sont obligatoires</p>
            </form>
        </div>
    </div>
    
@endsection