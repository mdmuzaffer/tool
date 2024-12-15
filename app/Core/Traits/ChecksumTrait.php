<?php

namespace App\Core\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

trait ChecksumTrait 
{
    
    #mutator
    private function getChksmVal()
    {
        return "{$this->id}%cx:{$this->id}-i0";
    }
    #mutator
    public function getChksmAttribute()
    {
        return Hash::make($this->getChksmVal());
    }
    #mutator
    public function CheckChksm($chksm)
    {
        return Hash::check($this->getChksmVal(), $chksm);
    }
}
