
@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    asfkasl;fkalsk
                </h1>
                <a href="/blog"
                class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase" >
                    Leer Mas...
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/01/08/18/25/desk-593327__340.jpg" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block" >
            <h2 class="text-3xl font-extrabold text-gray-600">
                    asfaksjfaksjfklajskjaslkj
            </h2>
            <p class="py-6 text-gray-500 text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto odit culpa ad et, impedit a hic? Adipisci soluta impedit, mollitia laboriosam iusto in optio tempore et eveniet, non sed nemo?
            </p>
            <p class="font-extrabold text-gray-600 text-sm pb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto odit culpa ad et, impedit a hic? Adipisci soluta impedit, mollitia laboriosam iusto in optio tempore et eveniet, non sed nemo?
            </p>
            <a href="/blog"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl"
            > Encuentra Uno
            </a>
        </div>
    </div>
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
                Experte ....
        </h2>
        <span class="font-extrabold block text-4xl py-1">
                Ux DEdfad
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Proyect
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Estrategia digital
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Backend
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400 ">
                Blog
        </span>
        <h2 class="text-4xl font-bold py-10">
            Recent Posts

        </h2>
        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam inventore, nisi itaque illum nulla culpa est recusandae placeat quo minus voluptatem consequatur molestiae error, corporis rerum esse laudantium, laborum ut.
        </p>
    </div>

    <div  class="sm:grid grid-cols-2 w-4/5 m-auto" >
        <div class="flex bg-yellow-700 text-gray-100 pt-10" >
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block" >
                <span class="uppercase text-xs" >
                    PHP
                </span>
                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur aperiam dolore laudantium sint iure maxime labore porro sit nam fugit, ea debitis dolorum at doloremque fuga facilis molestiae unde omnis?

                </h3>

                <a href=""
                 class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Iut More
                </a>

                
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/01/08/18/25/desk-593327__340.jpg" width="700" alt="">
        </div>
    </div>

@endsection