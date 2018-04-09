<?php

namespace App\Http\Controllers;

use App\BookShop;
use Illuminate\Http\Request;

class BookShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = BookShop::where('titulo', 'like', '%'.$request->buscar.'%')->orWhere('autor','like','%'.$request->buscar.'%')->orWhere('tema','like','%'.$request->buscar.'%')->orderBy('id','desc')->paginate(10);
        return [
            'pagination' => [
                'total'         => $data->total(),
                'current_page'  => $data->currentPage(),
                'per_page'      => $data->perPage(),
                'last_page'     => $data->lastPage(),
                'from'          => $data->firstItem(),
                'to'            => $data->lastItem(),
            ],
            'libreria'  => $data
        ];

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo'=> 'required',
            'autor' => 'required',
            'tema'  => 'required'
        ]);
        BookShop::create($request->all());
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookShop  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titulo'=> 'required',
            'autor' => 'required',
            'tema'  => 'required'
        ]);
        Bookshop::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookShop  $bookShop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookShop::destroy($id);
    }
}
