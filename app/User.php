<?php

namespace App;

use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use SoapClient;
use Session;

class User extends Authenticatable
{
    use Notifiable;
    use \App\Core\RoleUserBase;

    // protected $guard = "user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'phone', 'is_active', 'last_login', 'dp', 'notify_via_sms', 'admin_id','state','pwd'
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



    #mutator dp_url
    public function getDpUrlAttribute()
    {
        // $this->attributes['dp']
        return route('default.dp.admin', ['Admin' => $this->id]);
    }

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

    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function AllPaymentReceipts()
    {
        return $this->hasMany(PaymentsReceipt::class);
    }

    public function PaymentReceipts()
    {
        return $this->AllPaymentReceipts()->where('is_archived', false)->where('receipts_state', Session::get('state_id'))->orderBy('id', 'DESC');
    }

    public function AllStatePaymentReceipts()
    {
        return $this->AllPaymentReceipts()->where('is_archived', false)->orderBy('id', 'DESC');
    }

    public function LastReceipt()
    {
        return $this->PaymentReceipts()->first();
    }
    public function getTotalTaxAmountAttribute()
    {
        return $this->AllPaymentReceipts()->where('is_archived', false)->where('receipts_state', Session::get('state_id'))->sum('total_tax_amount');
    }
    public function getServiceAmountAttribute()
    {

        return $this->AllPaymentReceipts()->where('is_archived', false)->where('receipts_state', Session::get('state_id'))->sum('service_amount');
    }
    public function getCivikAmountAttribute()
    {

        return $this->AllPaymentReceipts()->where('is_archived', false)->where('receipts_state', Session::get('state_id'))->sum('civik_amount');
    }
    public function getReturnAmontAttribute()
    {

        return $this->AllPaymentReceipts()->where('is_archived', false)->where('receipts_state', Session::get('state_id'))->sum('return_amont');
    }

    // get total user payemnt
    public function getTotalStateTaxAmountAttribute()
    {
        return $this->AllPaymentReceipts()->where('is_archived', false)->sum('total_tax_amount');
    }
    public function getTotalStateServiceAmountAttribute()
    {

        return $this->AllPaymentReceipts()->where('is_archived', false)->sum('service_amount');
    }
    public function getTotalStateCivikAmountAttribute()
    {

        return $this->AllPaymentReceipts()->where('is_archived', false)->sum('civik_amount');
    }


}
