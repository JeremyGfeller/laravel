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
                <form method="post" action="admin/delete">
                    @csrf
                    @foreach($data as $item)
                        <p>
                            {{$item->tname}}
                            {{$item->nbBricks}}
                            {{$item->cname}}
                            <button name="id" value="{{$item->tid}}">Supprimer</button>
                        </p>
                    @endforeach
                </form>
                <form method="post" action="/admin/add">
                    @csrf
                    nom : <input type="text" name="nom"/>
                    NbBrique : <input type="text" name="nbBrique"/>
                    <select name="selectColor">
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
                    <button name="ajouter">Ajouter</button>
                </form>
                <br><br><a href="/">Home</a>
            </div>
        </div>
    </div>
@endsection