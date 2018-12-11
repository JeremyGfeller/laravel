@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Administration
            </div>
            <div class="links">
                <form method="post" action="/admin/delete">
                    @csrf

                    @foreach($things as $item)
                        <p>
                            {{$item->tname}}
                            {{$item->nbBricks}}
                            {{$item->cname}}
                            <button name="delid" value="{{$item->id}}">Supprimer</button>
                        </p>
                    @endforeach
                </form>
                <form method="post" action="/admin/add">
                    @csrf
                    Nom : <input type="text" name="nom"/>
                    Nombre de briques : <input type="text" name="nbBricks"/>
                    Couleur : <input type="text" name="color"/>
                    <button name="ajouter">Ajouter</button>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </form>
                <br><br><a href="/">Home</a>
            </div>
        </div>
    </div>
@endsection