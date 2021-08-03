@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center ">
    <div class="py-15 border-b border-gray-200" >
        <h1 class="text-6xl ">
            Blog Post
        </h1>
    </div>
</div>

{{-- {{$post}} haber si pasa el metodo  --}}

{{-- para recibir mensaje de una secion desde el controlador --}}
@if(session()->has('message'))

<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-3/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4" >
        {{session()->get('message')}}
    </p>
</div>

@endif


{{-- //verificamos si el usuario esatta autenticado o no --}}
@if(Auth::check())
    <div class="pt-15 w-4/5 m-auto" >
        <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-4 rounded-3xl ">
                Crear post
        </a>
    </div>
@endif


@foreach ($post as $p)
    

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200" >
    <div>
        <img src="{{ asset('images/'.$p->image_path) }}" width="400" height="300" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-3xl pb-4"> 
          >  {{$p->title}}
        </h2>

        <span class="text-gray-500 ">
            Por <span class="font-bold italic text-gray-800" > {{$p->user->name}} </span>, {{ date('jS M Y',strtotime($p->updated_at)) }}
        </span>

        <p class="text-xl text-gray-700 pt-5 pb-7 leading-11 font-light">
            {{$p->description}}
        </p>

        <a href="/blog/{{$p->slug}}" class="uppercase bg-blue-500 text-gray-100 text-sm font-extrabold py-4 px-8 rounded-3xl ">
            Mantente escribiendonos
        </a>

        {{-- si esta autenticado alguien y ese alguien tiene el mismo id del post que creo puede elditarlo --}}
        @if(isset(Auth::user()->id) && Auth::user()->id == $p->user_id)
            <span class="float-right" >
                <a href="/blog/{{$p->slug}}/edit"
                    class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2 "
                    >
                    Edit
                </a>
                
            </span>

            <span class="float-right" >
               <form action="/blog/{{$p->slug}}" 
                method="post"
                >
                @csrf
                @method('delete')   

                <button
                    class="text-red-500 pr-3"
                    type="submit"
                >
                    Borrar
                </button>

               </form>
                
            </span>

        @endif
        
    </div>
</div>
@endforeach

@endsection