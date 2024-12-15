<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlNoDir //extends Model
{

    public const RECEIPT_STARTS_FROM = 324264;
    public const BANK_REF_STARTS_FROM = 5234870;

    public static function GetNextReceiptSlNo()
    {
        $v = KVSetting::getReceiptCount();
        if (is_null($v)) {
            KVSetting::setReceiptCount(self::RECEIPT_STARTS_FROM);
            return self::RECEIPT_STARTS_FROM;
        }
        $v = $v + 1;
        KVSetting::setReceiptCount($v);

        return $v;
    }


    public static function GetNextBankRefSlNo()
    {
        $v = KVSetting::getBankRefCount();
        if (is_null($v)) {
            KVSetting::setBankRefCount(self::BANK_REF_STARTS_FROM);
            return self::BANK_REF_STARTS_FROM;
        }
        $v = $v + 1;
        KVSetting::setBankRefCount($v);

        return $v;
    }
}
