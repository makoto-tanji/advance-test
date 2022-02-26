<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building',
        'opinion'
    ];

    // 管理システムで渡された、「性別:1」や「性別:2」を「男性」「女性」に変換
    public function showGender()
    {
        if($this->gender === 1){
            return "男性";
        }else if($this->gender == 2){
            return "女性";
        }else{
            return "";
        }
    }

    //管理システムの性別の検索条件処理。コントローラから呼ばれる
    public static function getGender($gender)
    {
        if($gender === "1"){
            $match = [1];
        }else if($gender === "2"){
            $match = [2];
        }else{
            $match = [1, 2];
        };
        return $match;
    }

    //管理システムの日にち条件処理。コントローラから呼ばれる
    //
    public static function getDate($from, $by)
    {
        if($from != null && $by != null){
            // from, by共に入力された場合
            $date = [$from, $by];
        } else if($from != null && $by == null) {
            //fromのみ入力された場合
            $date = [$from, date("Y-m-d")];
        } else if($from == null && $by != null) {
            //byのみ入力された場合
            $date = [Contact::first()->created_at, $by];
        } else {
            //from、by共に未入力の場合
            $date = [Contact::first()->created_at, date("Y-m-d")];
        }

        return $date;
    }
}
