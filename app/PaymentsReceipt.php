<?php

namespace App;

use QrCode;
use DateTime;
use GuzzleHttp\Client as GuzzleHttp;
use Illuminate\Database\Eloquent\Model;
use Spatie\Url\Url as SptUrl;
use Illuminate\Support\Facades\Http;

class PaymentsReceipt extends Model
{
    protected $fillable = [
        'id', 'vehicleno', 'chassisno', 'ownername', 'mobile',
        'from_state', 'VehicleType', 'VehicleClass', 'seating_c',
        'txt_sleeper_cap', 'ServiceType', 'TaxMode', 'border_entry',
        'tax_from', 'tax_upto', 'PermitType', 'permit_upto', 'permit_no',
        'total_tax_amount', 'bank_ref_no', 'bank_ref_no_gen', 'receipt_no',
        'receipt_no_gen', 'payment_mode', 'fitness_validity', 'capacity_unit',
        'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at',
        'receipts_state', 'txt_no_of_weeks', 'permit_from', 'fitdate', 'districtname',
        'service_amount', 'civik_amount', 'genby', 'permit_ia', 'makerstatus', 'return_amont',
        'ownertype','txt_floor_area','ins_upto','tax_validity','infra_cess','permit_fee',
        'permit_endoresment_variation','checkpost_name','user_service_charge','cgst','sgst',
        'infra_cess','permit_fee_mp',
        'name_of_goods','route','VehicleCategory'
    ];

    protected $casts = [
        'total_tax_amount' => 'int',
    ];
    //Model Boot
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            // $model->vehicleno = strtoupper($model->getOriginal("vehicleno"));
            // $model->chassisno = strtoupper($model->getOriginal("chassisno"));

            $bank_ref_no = $model->getOriginal("bank_ref_no");
            if (is_null($bank_ref_no)) {
                $model->bank_ref_no = SlNoDir::GetNextBankRefSlNo();
            }

            //
            $receipt_no = $model->getOriginal("receipt_no");
            if (is_null($receipt_no)) {
                $model->receipt_no =  SlNoDir::GetNextReceiptSlNo();
            }
            // dd($model);
        });
        //
        static::saved(function ($model) {
            // $model2 = clone $model;
            $model->refresh();
            $model->sendPrimarySms();
            // dd(compact('model', 'model2'));
        });
    }


    public static function getStateWiseReceiptPrefix($state)
    {
        $state = Admin::getServiceStateById($state);
        $rcptPrefix = $state ? $state->receipt_prefix : "";
        return $rcptPrefix;
    }

    public static function getReceiptPrefix($refresh = false)
    {
        if ($refresh || is_null(static::$RECEIPT_PREFIX)) {
            static::$RECEIPT_PREFIX = KVSetting::getReceiptPrefix();
        }
        return static::$RECEIPT_PREFIX ?? "";
    }
    private static $RECEIPT_PREFIX = null;

    public static function getBankRefPrefix($refresh = false)
    {
        if ($refresh || is_null(static::$BANK_REF_PREFIX)) {
            static::$BANK_REF_PREFIX = KVSetting::getBankRefPrefix();
        }
        return static::$BANK_REF_PREFIX ?? "";
    }
    private static $BANK_REF_PREFIX = null;

    #relation Admin
    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }

    #relation User
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    #mutator receipt_no
    public function setReceiptNoAttribute($receipt_no)
    {
        $this->attributes['receipt_no'] = $receipt_no;
        $this->attributes['receipt_no_gen'] = static::getReceiptNoGen($receipt_no, $this->receipts_state);
    }

    public static function getReceiptNoGen($receipt_no, $receipts_state)
    {
        return self::getStateWiseReceiptPrefix($receipts_state) . now()->format("ymd") . "" . "" . $receipt_no;
    }


    #mutator bank_ref_no
    public function setBankRefNoAttribute($bank_ref_no)
    {
		
        $this->attributes['bank_ref_no'] = $bank_ref_no;
       // $this->attributes['bank_ref_no_gen'] = ($this->receipts_state==10)?static::getBankRefNoGenKa($bank_ref_no):static::getBankRefNoGen($bank_ref_no);
       
       if($this->receipts_state==10){
           $this->attributes['bank_ref_no_gen'] = static::getBankRefNoGenKa($bank_ref_no);
       }elseif($this->receipts_state==11){
           
            $this->attributes['bank_ref_no_gen'] = static::getBankRefNoGenRaj($bank_ref_no);
       }else{
          $this->attributes['bank_ref_no_gen'] = static::getBankRefNoGen($bank_ref_no);  
           
       }
    }
public static function random_num($size) {

	$alpha_key = '';
	$keys = range('A', 'Z');
	
	for ($i = 0; $i < 1; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}
	
	$length = $size - 1;
	
	$key = '';
	$keys = range(0, 9);
	
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	
	return $alpha_key . $key;
}

public static function random_num1($size) {

	
	
	$length = $size;
	
	$key = '';
	$keys = range(0, 9);
	
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	
	return $key;
}
    public static function getBankRefNoGen($bank_ref_no)
    {
       // return self::getBankRefPrefix() . "" . "" . $bank_ref_no;
        return self::getBankRefPrefix() . "" . "" . self::random_num(4);
        
    }
 public static function getBankRefNoGenKa($bank_ref_no)
    {
       // return self::getBankRefPrefix() . "" . "" . $bank_ref_no;
        return "533627598" . "" . "" . self::random_num1(4);
        
    }
 public static function getBankRefNoGenRaj($bank_ref_no)
    {
       // return self::getBankRefPrefix() . "" . "" . $bank_ref_no;
        return "IKOAZ" . "" . "" . self::random_num1(5);
        
    }

    public static function getByVehicleNo(string $vehicleno, string $stateid)
    {
        $q = self::query()->where('vehicleno', $vehicleno)->where('is_archived', false)->where('receipts_state', $stateid)->orderBy('id', 'DESC')->first();
        return $q ? $q->toArray() : self::getBlankObject();
    }
    public static function getBlankObject()
    {
        $fillable = [
            'id', 'vehicleno', 'chassisno', 'ownername', 'mobile',
            'from_state', 'VehicleType', 'VehicleClass', 'seating_c',
            'txt_sleeper_cap', 'ServiceType', 'TaxMode', 'border_entry',
            'tax_from', 'tax_upto', 'PermitType', 'permit_upto', 'permit_no',
            'total_tax_amount', 'bank_ref_no', 'bank_ref_no_gen', 'receipt_no',
            'receipt_no_gen', 'payment_mode', 'fitness_validity', 'capacity_unit',
            'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at',
            'txt_no_of_weeks', 'permit_from', 'fitdate', 'districtname', 'service_amount',
            'civik_amount', 'genby', 'permit_ia', 'makerstatus', 
            'return_amont', 'ownertype','checkpost_name','VehicleCategory','name_of_goods',
            'route'
        ];
        $arr = [];
        foreach ($fillable as $key) {
            $arr[$key] = "";
        }
        return $arr;
    }





    public static function getByReceiptNoGen(string $receiptNoGen)
    {
        //receipt_no_gen
        return self::query()->where('receipt_no_gen', $receiptNoGen)->where('is_archived', false)->first();
    }

    public static function getByReceiptNo(string $receiptNo)
    {
        //receipt_no
        return self::query()->where('receipt_no', $receiptNo)->where('is_archived', false)->first();
    }
    #mutator universal_link
    public function getUniversalLinkAttribute()
    {
        return route('universal.report', ['v' => base64_encode($this->receipt_no_gen)]);
    }

    #mutator universal_link_qr
    public function getUniversalLinkQrAttribute()
    {
        return QrCode::generate($this->universal_link_state_wise);
    }

    private function sendMessageToOwner()
    {
        $timePaid = strtoupper($this->created_at->format('d-M-Y h:i a'));
        $dateFrom = strtoupper($this->tax_from);
        $dateto   = strtoupper($this->tax_upto);
        /*$msg = "Your tax of Rs. {$this->all_total_for_sms}/- has been paid for Vehicle No. {$this->vehicleno}," .
            "Receipt No:{$this->receipt_no_gen}," .
            ($this->is_seat_cap ? "Seat Cap:{$this->seating_c}" : "RLW:{$this->seating_c}") .
            ",Checkpost name:{$this->border_entry}" .
            " from " . strtoupper($this->tax_from) . "  to " . strtoupper($this->tax_upto)
            . " on {$timePaid}".".-VAAHNA";*/

        /*$myDateFrom = DateTime::createFromFormat('Y-m-d', $this->tax_from);
        $dateFrom = strtoupper($myDateFrom->format('d-M-Y'));
        $myDateTo = DateTime::createFromFormat('Y-m-d', $this->tax_upto);
        $dateto = strtoupper($myDateTo->format('d-M-Y'));*/
        $msg = "Your tax of Rs. {$this->all_total_for_sms}/- has been paid for Vehicle No. {$this->vehicleno},Receipt No:{$this->receipt_no_gen},Seat cap :{$this->is_seat_cap},Checkpost name:{$this->border_entry} from {$dateFrom} to {$dateto} on {$timePaid}.-VVAHAN .MoRTH";
        //echo $msg;die;
         $contacts = $this->mobile;
         $from = 'XVAHAN';
         $username = 'Arun1998';
         $api_key = 'c379f9ab-78bb-4801-b5d3-d3f66d6d9fc2';
         $api_url = "http://sms.hspsms.com/sendSMS?username=$username&message=$msg&sendername=$from&smstype=TRANS&numbers=$contacts&apikey=$api_key";
         $client = new GuzzleHttp();
            $res = $client->request('GET', $api_url);
            echo $res->getStatusCode();
    }
    public function sendPrimarySms($force = false)
    {
        if ((!$this->sms_sent) || $force) {
            $this->sendMessageToOwner();
            $this->sms_sent = true;
            return $this->update();
        }

        return false;
    }
    #mutator is_seat_cap
    public function getIsSeatCapAttribute()
    {
        return strtoupper($this->VehicleType) != "GOODS VEHICLE";
    }

    #mutator vehicleno
    public function getVehiclenoAttribute()
    {
        return strtoupper($this->attributes['vehicleno']);
    }

    #mutator chassisno
    public function getChassisnoAttribute()
    {
        return strtoupper($this->attributes['chassisno']);
    }


    #mutator state_object
    public function getStateObjectAttribute()
    {
        return Admin::getServiceStateById($this->receipts_state);
    }

    #mutator state_name
    public function getStateNameAttribute()
    {
        $state = $this->state_object;
        if ($state) {
            return $state->name;
        }
    }

    #mutator state_code
    public function getStateCodeAttribute()
    {
        $state = $this->state_object;
        if ($state) {
            return $state->code;
        }
    }
    #mutator state_subdomain_prefix
    public function getStateSubdomainPrefixAttribute()
    {
        $state = $this->state_object;
        if ($state) {
            return $state->subdomain_prefix;
        }
    }


    #mutator admin_print_url
    public function getAdminPrintUrlAttribute()
    {
        // $pfx = $this->state_subdomain_prefix;
        // $subdomain = getSubdomainHost($pfx);
        // $url = SptUrl::fromString(url(""));
        // $strUrl =  $url->withHost($subdomain)->withPath("print")->withQueryParameter("rec", $this->receipt_no);

        // return  (string)$strUrl;
        return route('admin.user.applyrecpts.print', ['rec' => $this->receipt_no]);
    }


    #mutator user_print_url
    public function getUserPrintUrlAttribute()
    {
        $pfx = $this->state_subdomain_prefix;
        $subdomain = getSubdomainHost('up');
        $url = SptUrl::fromString(url(""));
        $strUrl = $url->withHost($subdomain)->withPath("print")->withQueryParameter("rec", $this->receipt_no);

        return   (string)$strUrl;
    }

    #mutator universal_link_state_wise
    public function getUniversalLinkStateWiseAttribute()
    {
        $pfx = $this->state_subdomain_prefix;
        $subdomain = getSubdomainHost($pfx);
        $url = SptUrl::fromString($this->universal_link);
        $strUrl = $url->withHost($subdomain);

        return  (string)$strUrl;
    }

    #mutator all_total_for_sms
    public function getAllTotalForSmsAttribute()
    {
        $total_tax_amount = floatval($this->total_tax_amount);
        $service_amount = floatval($this->service_amount);
        $civik_amount = floatval($this->civik_amount);
        $return_amont = floatval($this->return_amont);
        $tot = ($total_tax_amount + $service_amount + $civik_amount + $return_amont);

        return $tot;
    }
}
