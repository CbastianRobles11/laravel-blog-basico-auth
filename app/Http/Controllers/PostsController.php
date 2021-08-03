<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    //para que no puedadn entrar a links que no cosrresponde
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        //traer todo
        $post = Post::orderBy('updated_at','DESC')->get();
        //

        return view('blog.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //aki vien lo que venga del formulario create

        // dd($request);

        //validacion del formulario
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image_path'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        ///////////////////////////////////////////
        ///////////////////////////////////////////////////////
        ///// IMAGENES PASO A PASO//////////////////////////////
        $newImageName=uniqid().'-'.$request->title.'.'.$request->image_path->extension();

        //ver el nore de la imagen 
        //dd($newImageName);

        //lo vamos a pasar a un archivo
        $request->image_path->move(public_path('images'),$newImageName);
        // se guardara en  C:\xampp\htdocs\Laravelblog\public\images

        //////////////////////////////////////////////////
        /////////////////////////////////////////////////////
        //////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        ////////////////////PONWE EL TITLE COMO SLUG ///////////////////////////////////////////////////////////////////////////////
        //poner en conso0la:  composer require cviebrock/eloquent-sluggable
        //luego ir al modelo Post
        // y poner use Cviebrock\EloquentSluggable\Sluggable;
        //  use Sluggable;
    //     public function sluggable(): array
    // {
    //     //asi decimos que el slug es lo mismo que title
    //     return [
    //         'slug'=>[
    //             'source'=>'title'
    //         ]
    //     ]
    // }

    //luego aki mismo usamos el:: use Cviebrock\EloquentSluggable\Services\SlugService
        //luego
        $slug=SlugService::createSlug(Post::class, 'slug',$request->title);

        //dd($slug);

        /////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////
        //////////////////////////////////////////////////


        //-------------------------------------------------

        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>$slug,
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id

        ]);

        return redirect('/blog')
        ->with('message','Tu Post ha sido guardado');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //miraremos los post 
        return view('blog.show')
        ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //

        return view('blog.edit')
        ->with('post',Post::where('slug',$slug)->first());


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //validar
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            
        ]);

        Post::where('slug',$slug)
            ->update([
                'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class, 'slug',$request->title),
            //'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id
            ]);

            return redirect('/blog')
            ->with('message','Tu post ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $post=Post::where('slug',$slug);
        $post->delete();

        return redirect('/blog')
            ->with('message','Tu post ha sido eliminado');
    }
}
