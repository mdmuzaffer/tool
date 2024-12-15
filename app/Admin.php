<?php

namespace App;

use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use SoapClient;

class Admin extends Authenticatable
{
    use Notifiable;
    use \App\Core\RoleUserBase;

    // protected $guard = "admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'phone', 'is_active', 'last_login', 'dp', 'notify_via_sms'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_auto_renewal_on' => 'bool',
        'su' => 'bool',
    ];

    private static $serviceStates = [
        ['id' => 1, 'code' => 'UP', 'subdomain_prefix' => 'up', 'receipt_prefix' => 'UPT', 'name' => 'Uttar Pradesh',],
        ['id' => 2, 'code' => 'UK', 'subdomain_prefix' => 'uk', 'receipt_prefix' => 'UKT', 'name' => 'Uttarakhand',],
        ['id' => 3, 'code' => 'PB', 'subdomain_prefix' => 'pb', 'receipt_prefix' => 'PBT', 'name' => 'Punjab',],
        ['id' => 4, 'code' => 'HR', 'subdomain_prefix' => 'hr', 'receipt_prefix' => 'HRT', 'name' => 'Haryana',],
        ['id' => 5, 'code' => 'BR', 'subdomain_prefix' => 'br', 'receipt_prefix' => 'BRT', 'name' => 'Bihar',],
        ['id' => 6, 'code' => 'GJ', 'subdomain_prefix' => 'gj', 'receipt_prefix' => 'GJT', 'name' => 'Gujarat',],
        ['id' => 7, 'code' => 'MH', 'subdomain_prefix' => 'mh', 'receipt_prefix' => 'MHT', 'name' => 'Maharashtra',],
        ['id' => 8, 'code' => 'jh', 'subdomain_prefix' => 'jh', 'receipt_prefix' => 'JHT', 'name' => 'JHARKHAND',],
		['id' => 9, 'code' => 'hp', 'subdomain_prefix' => 'hp', 'receipt_prefix' => 'HPT', 'name' => 'Himachal Pradesh',],
		['id' => 10, 'code' => 'ka', 'subdomain_prefix' => 'ka', 'receipt_prefix' => 'KAT', 'name' => 'Karnatka',],
		['id' => 11, 'code' => 'raj', 'subdomain_prefix' => 'raj', 'receipt_prefix' => 'RJT', 'name' => 'Rajsthan',],
        ['id' => 12, 'code' => 'MP', 'subdomain_prefix' => 'mp', 'receipt_prefix' => 'MPT', 'name' => 'Madhya Pradesh',],
        ['id' => 13, 'code' => 'TM', 'subdomain_prefix' => 'tm', 'receipt_prefix' => 'TMT', 'name' => 'Tamil Nadu'],
        ['id' => 14, 'code' => 'AP', 'subdomain_prefix' => 'ap', 'receipt_prefix' => 'APT', 'name' => 'Andhra Pradesh']
    ];
    public static function getServiceStates($objectify = true)
    {
        if ($objectify) {
            $arr = [];
            foreach (static::$serviceStates as $key => $value) {
                array_push($arr, (object)$value);
            }
        } else {
            $arr = static::$serviceStates;
        }
        return collect($arr);
    }
    public static function getServiceStateById(string $id)
    {
        return static::getServiceStates()->where('id', $id)->first();
    }
    public static function getServiceStateByCode(string $code)
    {
        return static::getServiceStates()->where('code', $code)->first();
    }
    public static function getServiceStateBySubdomainPrefix(string $subPrefix)
    {
        return static::getServiceStates()->where('subdomain_prefix', $subPrefix)->first();
    }
    #mutator full_name
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function updateLoginTime()
    {
        $this->update(['last_login' => now()]);
        return $this->refresh();
    }

    public function getServiceStatesAttribute()
    {
        return static::getServiceStates();
    }

    // #mutator dp_url
    // public function getDpUrlAttribute()
    // {
    //     // $this->attributes['dp']
    //     return route('default.dp.admin', ['Admin' => $this->id]);
    // }

    #mutator dp
    public function getDpAttribute()
    {
        $dp = $this->attributes['dp'];

        $defaultPath =  config('app.resources.dp');
        if (!empty($dp) && file_exists(public_path('storage/' . $dp))) {
            // $defaultPath =  storage_path($dp);
            return 'storage/' . $dp;
        } else {
            return $defaultPath;
        }
    }

    #mutator signature
    public function getSignatureAttribute()
    {
        $signature = $this->attributes['signature'];

        $defaultPath =  config('app.resources.dp');
        if (!empty($signature) && file_exists(public_path('storage/' . $signature))) {
            // $defaultPath =  storage_path($dp);
            return 'storage/' . $signature;
        } else {
            return $defaultPath;
        }
    }

    public function getDashboardContents()
    {
        $dData = [];
    }

    public static function SuperUsers()
    {
        return self::query()->where('su', 1)->get();
    }

    #mutator is_superuser
    public function getIsSuperuserAttribute()
    {
        return $this->su;
    }

    #relation Users
    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
