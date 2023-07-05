<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;

class MotosController extends Controller
{
    public function index()
    {
        $items = Moto::all();
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Moto::create($request->all())->id;
            return response()->json(['status'=>true,'id'=>$id],200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function show($id)
    {
        try{
            $item = Moto::find($id);

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
            Moto::where("id",$id)->update($request->all());
            $item = Moto::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Moto::find($id);

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
    public function verificarPlaca($placa)
    {
        try{
            $item = Moto::where("placa",$placa)->get();
            if(!$item){
                return response()->json([
                    'msg'=>'Item no existe',
                    'result'=>0
                ]);
            }
            return response()->json([
                'msg'=>'Item existe',
                'result'=>1
            ]);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
}
