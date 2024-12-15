<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KVSetting extends Model
{

    protected $fillable = ['key', 'value'];

    public const  KEY_BANK_REF_PREFIX = "bankref.prefix";
    public const  KEY_RECEIPT_PREFIX = "receipt.prefix";

    public const  KEY_BANK_REF_COUNT = "bankref.count";
    public const  KEY_RECEIPT_COUNT = "receipt.count";



    public static function Get(string $key)
    {
        $ob = self::query()->where('key', $key)->first();
        return $ob ?? null;
    }

    public static function Set(string $key, string $value)
    {
        $ob = self::query()->where('key', $key)->first();
        if ($ob) {
            return $ob->update([
                'value' => $value
            ]);
        } else {
            return self::create(['key' => $key, 'value' => $value]) ? true : false;
        }
        return false;
    }

    public static function getBankRefPrefix()
    {
        $g = self::Get(self::KEY_BANK_REF_PREFIX);
        return $g ? $g->value : null;
    }
    public static function setBankRefPrefix(string $value)
    {
        return self::Set(self::KEY_BANK_REF_PREFIX, $value);
    }


    public static function getReceiptPrefix()
    {
        $g = self::Get(self::KEY_RECEIPT_PREFIX);
        return $g ? $g->value : null;
    }

    public static function setReceiptPrefix(string $value)
    {
        return self::Set(self::KEY_RECEIPT_PREFIX, $value);
    }

    //
    public static function getBankRefCount()
    {
        $g = self::Get(self::KEY_BANK_REF_COUNT);
        return $g ? (int)$g->value : null;
    }
    public static function setBankRefCount(int $value)
    {
        return self::Set(self::KEY_BANK_REF_COUNT, $value);
    }


    public static function getReceiptCount()
    {
        $g = self::Get(self::KEY_RECEIPT_COUNT);
        return $g ? (int)$g->value : null;
    }

    public static function setReceiptCount(int $value)
    {
        return self::Set(self::KEY_RECEIPT_COUNT, $value);
    }

    public static function KVSettingSeeder()
    {
        //bank_ref_prefix
        if (!self::getBankRefPrefix()) {
            self::setBankRefPrefix("IK");
        }
        //receipt_prefix
        if (!self::getReceiptPrefix()) {
            self::setReceiptPrefix("UPT");
        }
        //bank_ref_count
        if (!self::getBankRefCount()) {
            self::setBankRefCount(SlNoDir::BANK_REF_STARTS_FROM);
        }
        //receipt_count
        if (!self::getReceiptCount()) {
            self::setReceiptCount(SlNoDir::RECEIPT_STARTS_FROM);
        }
    }
}
