<?php
namespace App\Helpers;

use App\Models\items;
use App\Models\purchase;
use App\Models\sales;
use App\Models\User;


class IdTable
{
    public static function purchase()
    {
        $getLastId=purchase::select('code')->latest('code')->first();
        return self::codeMaker($getLastId,'PO');
    }
    public static function sales()
    {
        $getLastId=sales::select('code')->latest('code')->first();
        return self::codeMaker($getLastId,'SO');
    }
    public static function item()
    {
        $getLastId=items::select('code')->latest('code')->first();
        if ($getLastId!=null) {
            $trimId=intval(substr($getLastId->code,5,4));
            $id=$trimId+1;
        }else{
            $id=1;
        }
        return 'ITEM-'.str_pad($id,4,"0",STR_PAD_LEFT);
    }
    public static function user()
    {
        $getLastId=User::select('code')->latest('code')->first();
        if ($getLastId!=null) {
            $getMonth=substr($getLastId->code,2,2);
            if ($getMonth==date_format(date_create(now()),'m')) {
                $trimId=intval(substr($getLastId->code,4,3));
                $id=$trimId+1;
            }else{
                $id=1;
            }
        }else{
            $id=1;
        }
        return date_format(date_create(now()),'ym').str_pad($id,3,"0",STR_PAD_LEFT);
    }
    protected static function codeMaker($getLastId,$prefix)
    {
        if ($getLastId!=null) {
            $getMonth=substr($getLastId->code,6,2);
            if ($getMonth==date_format(date_create(now()),'m')) {
                $trimId=intval(substr($getLastId->code,9,5));
                $id=$trimId+1;
            }else{
                $id=1;
            }
        }else{
            $id=1;
        }
        return $prefix.'-'.date_format(date_create(now()),'y-m')."-".str_pad($id,5,"0",STR_PAD_LEFT);
    }
}
