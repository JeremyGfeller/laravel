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
                            {{$item->getName()}}
                            <button name="id" value="{{$item->getId()}}">Supprimer</button>
                        </p>
                    @endforeach
                </form>
                <form method="post" action="/admin/add">
                    @csrf
                    id : <input type="text" name="id"/>
                    nom : <input type="text" name="nom"/>
                    brique : <input type="text" name="nbBrique"/>
                    couleur : <input type="text" name="couleur"/>
                    <button name="ajouter">Ajouter</button>
                </form>
                <br><br><a href="/">Home</a>
            </div>
        </div>
    </div>
@endsection