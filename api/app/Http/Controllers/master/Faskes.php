<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\Faskes as FaskesModel;

class Faskes extends Controller
{
    protected $title = "Faskes";

    public function fetchAll(){
        $params = request()->query();
        if(count($params) > 0){
            $order = ["id asc"];
            $data = FaskesModel::select(["*"])->where($params)->orderBy("id")->get();
        }else $data = FaskesModel::all();

        return response()->json([
            "success" => count($data) > 0 ? true : false,
            "data" => $data,
            "total" => count($data),
            "detail" => count($data) == 0 ? "Data " .$this->title. "  tidak ditemukan" : "Data " .$this->title. " ditemukan"
        ], 200);
    }

    public function fetch($id){
        $data = FaskesModel::findOrFail($id);
        return response()->json([
            "success" => $data ? true : false,
            "data" => $data,
            "total" => 1,
            "detail" => $data ? "Data " .$this->title. "  tidak ditemukan" : "Data " .$this->title. " ditemukan"
        ], 200);
    }
}