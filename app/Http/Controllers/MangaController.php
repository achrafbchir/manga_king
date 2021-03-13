<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Manga;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MangaController extends Controller
{
    protected $data = ['manga_statues' => Manga::STATUES, "manga_types" => Manga::TYPES, "categorie_ages" => Manga::AGE_CATEGORIES];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mangas = Manga::paginate($request->pagination_limit ?? Manga::LIMIT_PAGINATOR);

        return View("admin.manga.index", compact("mangas"));

        // return view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View("admin.manga.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manga = Manga::create($request->all());

        return redirect()->route("admin.manga.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manga = Manga::find($id);

        return view('admin.manga.edit', compact('manga'))->with($this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $manga = Manga::find($id)->update($request->all());

        return redirect()->route("admin.manga.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
