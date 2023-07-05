<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    public function index()
    {
        $items = Modelo::all();
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Modelo::create($request->all())->id;
            return response()->json(['status'=>true,'id'=>$id],200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function show($id)
    {
        try{
            $item = Modelo::find($id);

            if(!$item){
                return response()->json(['Item no existe'],404);
            }
            return response()->json($item,200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function update(Request $request, $id)
    {
        try{
            Modelo::where("id",$id)->update($request->all());
            $item = Modelo::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Modelo::find($id);

            if(!$item){
                return response()->json(['Item no existe'],404);
            }
            $item->delete();
            return response()->json('Item borrado',200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function modelosPorMarca($id)
    {
        try{
            $items = Modelo::where('marca_id',$id)->get();
            return response($items);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
}
