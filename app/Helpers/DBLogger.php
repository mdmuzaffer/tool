<?php

use Illuminate\Support\Facades\DB;

class DBLogger 
{
    public function __construct() {
        DB::enableQueryLogs();
    }
}

