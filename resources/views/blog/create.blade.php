@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-left ">
    <div class="py-15 border-b border-gray-200" >
        <h1 class="text-6xl ">
             Crea un Blog 
        </h1>
    </div>
</div>

@if($errors->any)

    <div class="w-4/5 m-auto ">
       <ul>
           @foreach($errors->all() as $error )
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{$error}}
                </li>

           @endforeach
       </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-1 ">
    
    {{-- enctype usa para mandar archivos --}}
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="block pt-4">
            <span class="text-gray-700 pb-1">Titulo</span>
            <input class="form-input mt-1 block w-90 " placeholder="Jane Doe" name="title">
          </label>

          <label class="block pt-4">
            <span class="text-gray-700 pb-1">Descripcion</span>
            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Ingrese el  content." name="description"></textarea>
          </label>
        
          

          <div class="bg-grey-lighter pt-4">
            <label
                class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-400 hover:text-white text-blue-600 ease-linear transition-all duration-150">
                <i class="fas fa-cloud-upload-alt fa-3x"></i>
                <span class="mt-2 text-base leading-normal">Select a file</span>
                <input type='file' name="image_path" class="hidden" />
          </label>
          </div>

          <div class="md:w-5/3 pt-4 ">
            <button class="shadow bg-blue-500 hover:bg-blue-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              Crear
            </button>
          </div>

    </form>
</div >




@endsection