<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Kelas;
use App\Kelas_Categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Categories::select('id','name')->get()->toArray();
        return view('kelas.index')
            ->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request);
        $name = $request['name'];
        $status = $request['status'];
        $categories = $request['categories'];

        $model = new Kelas();
        $model->name = $name;
        $model->status = $status;
        $model->save();

        foreach ($categories as $category){
            $kelas_category = new Kelas_Categories();
            $kelas_category->id_kelas = $model->id;
            $kelas_category->id_category = $category;
            $kelas_category->save();
        }

        return redirect()->route('kelas.index');
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
        //
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
        //
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
