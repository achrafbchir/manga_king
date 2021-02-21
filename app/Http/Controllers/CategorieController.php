<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreCategorieRequest, UpdateCategorieRequest};
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        
        /*if(Guard::default() == "api")
        //{
            return response()->json(["categories" => $categories], http_response_code(200));
        //}*/
        return view("admin.categorie.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categorie.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());

        return redirect()->route("admin.categorie.index");

        //return response()->json(['message' => __('messages.categorie.store'), 'categorie' => $categorie]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::find($id);

        return $categorie ?? response()->json(['error' => 'categorie not found'], http_response_code(404));

        //return view("admin.categorie.show", compact("categorie"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);

        return view("admin.categorie.edit", compact("categorie"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieRequest $request, $id)
    {
        $categorie = Categorie::find($id)->update($request->all());

        return view("admin.categorie.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::find($id)->destroy();

        return back();
    }
}
