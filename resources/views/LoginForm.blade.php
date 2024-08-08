<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <div class="container-fluid my-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-4 my-3">
                <h1 class="fw-bold text-center">Connexion</h1>
                @if(session('message'))
                <div class="alert alert-dark"> {{session('message')}} </div>
                @endif
                <form action="{{route('login.handle')}}" id="login" class="mt-5" method="post">
                    @csrf
                    @method('POST')

                    <label for="email" class="form-label h5 text-secondary" >Email</label>
                    <input type="email" name="email" class="form-control" value={{old('email')}}>

                    <label for="password" class="form-label h5 text-secondary" >Mot de passe</label>
                    <input type="password" name="password" class="form-control" value={{old('password')}}>

                    <div>
                        @error('email') <p class="text-danger"> {{$message}} </p> @enderror
                        @error('password') <p class="text-danger"> {{$message}} </p> @enderror
                    </div>
                </form>
                <button form="login" type="submit" class="btn btn-outline-dark my-4 px-5 w-100">Valider</button>
            </div>
        </div>
    </div>
</body>
</html>