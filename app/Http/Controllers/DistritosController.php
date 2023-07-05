<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DistritosController extends Controller
{
    public function index()
    {
        $items = Distrito::all();
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Distrito::create($request->all())->id;
            return response()->json(['status'=>true,'id'=>$id],200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function show($id)
    {
        try{
            $item = Distrito::find($id);

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
            Distrito::where("id",$id)->update($request->all());
            $item = Distrito::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Distrito::find($id);

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

}
