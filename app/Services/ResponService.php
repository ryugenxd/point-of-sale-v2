<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ResponService {
    public static function save($status):JsonResponse
    {
        if(!$status){
            return response()->json(
                ["message"=>"Gagal di simpan"]
            )->setStatusCode(400);
        }
        return response() -> json([
            "message"=>"Berhasil di simpan."
        ]) -> setStatusCode(200);
    }

    public static function update($status):JsonResponse
    {
        if(!$status){
            return response()->json(
                ["message"=>__("Gagal mengubah data")]
            )->setStatusCode(400);
        }
        return response() -> json([
            "message"=>__("Berhasil mengubah data")
        ]) -> setStatusCode(200);
    }

    public static function delete($status):JsonResponse
    {
        if(!$status){
            return response()->json(
                ["message"=>__("Gagal menghapus data")]
            )->setStatusCode(400);
        }
        return response()->json([
            "message"=>__("Berhasil menghapus data")
        ]) -> setStatusCode(200);
    }
}
