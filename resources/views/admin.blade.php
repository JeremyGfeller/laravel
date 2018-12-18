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
                            {{$item->name}}
                            {{$item->nbBricks}}
                            @foreach($item->color as $color)
                                {{$color->name}}
                            @endforeach
                            <button name="delid" value="{{$item->id}}">Supprimer</button>
                        </p>
                    @endforeach
                </form>
                <form method="post" action="/admin/add">
                    @csrf
                    Nom : <input type="text" name="nom"/><br>
                    Nombre de briques : <input type="text" name="nbBricks"/><br>
                    <select name="selectColor[]" multiple>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
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