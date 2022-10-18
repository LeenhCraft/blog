<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

use function Ramsey\Uuid\v1;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'yellow' => 'Color amarillo',
            'gray' => 'Color gris',
            'purple' => 'Color morado',
            'pink' => 'Color rosa',
            'indigo' => 'Color índigo',
        ];
        $tag = (object) [
            'idtag' => '',
            'tag_name' => '',
            'tag_slug' => '',
            'tag_color' => '',
        ];
        return view('admin.tags.create', compact('colors', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags,tag_slug',
            'color' => 'required',
        ]);

        // $tag = Tag::create($request->all());
        $tag = Tag::create([
            'tag_name' => $request->name,
            'tag_slug' => $request->slug,
            'tag_color' => $request->color,
        ]);
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        // $tag = Tag::where('idtag', $tag)->firstOrFail();
        $colors = [
            'red' => 'Color rojo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'yellow' => 'Color amarillo',
            'gray' => 'Color gris',
            'purple' => 'Color morado',
            'pink' => 'Color rosa',
            'indigo' => 'Color índigo',
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,tag_slug,$tag->idtag,idtag",
            'color' => 'required',
        ]);
        $tag->update([
            'tag_name' => $request->name,
            'tag_slug' => $request->slug,
            'tag_color' => $request->color,
        ]);
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se eliminó con éxito');
    }
}
