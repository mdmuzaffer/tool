<?php

use App\Admin;
use App\Employee;
use App\FrontDesk;
use App\Manager;
use App\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (!function_exists('getIndianCurrencyInWord')) {

    function getIndianCurrencyInWord(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
        );
        $digits = array('', 'hundred', 'thousand', 'lac', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' paise' : '';
        $wordInRupee = ($Rupees ? $Rupees . 'rupees ' : '') . $paise;
        $wordInRupee = str_replace("  ", " ", $wordInRupee);
        return $wordInRupee;
    }
}

if (!function_exists('getEloquentSqlWithBindings')) {
    function getEloquentSqlWithBindings($query)
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }
}

if (!function_exists('number_to_ordinal')) {
    function number_to_ordinal(int $number)
    {
        $locale = 'en_US';
        $nf = new NumberFormatter($locale, NumberFormatter::ORDINAL);
        return $nf->format($number);
    }
}

if (!function_exists('number_to_spell_words')) {
    function number_to_spell_words($number)
    {
        if (is_numeric($number)) {
            $locale = 'en_US';
            $nf = new NumberFormatter($locale, NumberFormatter::SPELLOUT);
            return $nf->format($number);
        } else {
            return false;
        }
    }
}


if (!function_exists('f123')) {
    function f123(int $pid)
    {
        file_put_contents(__DIR__ . '/queue.pid', $pid);
    }
}

if (!function_exists('array_value')) {
    function array_value(array $array, string $key, $defaultValue = null)
    {
        if (is_array($array) && array_key_exists($key, $array)) {
            return $array[$key];
        }
        return $defaultValue;
    }
}



if (!function_exists('is_slug')) {
    function is_slug(string $slug)
    {
        return 1 == preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug);
        // return Str::slug($slug) === $slug;
    }
}




if (!function_exists('string_boolify')) {
    function string_boolify($val)
    {
        $val = (string) $val;
        if (is_null($val) || empty($val)) return false;
        elseif (in_array(strtolower($val), ["no", "not", "nil", "na", "n/a", "never", "nix", "false", "off", "", "0", "null", "undefined", "nan", "wrong", "error", "inactive", "deactive", "disabled"])) return false;
        return true;
    }
}


if (!function_exists('print_json_html')) {
    function print_json_html($object)
    {
        $str = json_encode($object, JSON_PRETTY_PRINT);
        print("" .
            "\n<!-- 'print_json_html' helper function -->\n" .
            "<pre>\n" .
            "{$str}\n" .
            "</pre>\n" .
            "<!-- 'print_json_html' helper function ends-->\n" .
            "");
    }
}


if (!function_exists('array_assign')) {
    function array_assign(&$array, $secondArray, $thirdArray = [])
    {
        $arr2 = call_user_func_array("array_merge", func_get_args());
        foreach ($arr2 as $key => $value) {
            $array[$key] = $value;
        }
        return $arr2;
    }
}


if (!function_exists('number_format_money')) {
    function number_format_money($num)
    {
        $number = is_numeric($num) ? $num : 0;
        return "₹" . (number_format($number, 2, '.', '')) . "/-";
    }
}


if (!function_exists('get_user_class_by_name')) {
    function get_user_class_by_name($name)
    {
        $arr = Role::$userTypes;
        if (array_key_exists($name, $arr)) {
            return $arr[$name];
        } else {
            return false;
        }
    }
}


if (!function_exists('get_user_by_id_name')) {
    function get_user_by_id_name($id, $name)
    {
        $isClass  = get_user_class_by_name($name);
        if ($isClass) {
            return app($isClass)->where("id", $id)->first();
        } else {
            return false;
        }
    }
}

if (!function_exists('getAllUsersList')) {
    function getAllUsersList()
    {
        $Admins = Admin::query()->where('is_active', "<>", "0")->get()->mapWithKeys(function ($d) {
            return ['A:' . $d->id => $d];
        });
        $Managers = Manager::query()->where('is_active', "<>", "0")->get()->mapWithKeys(function ($d) {
            return ['M:' . $d->id => $d];
        });
        $FrontDesks = FrontDesk::query()->where('is_active', "<>", "0")->get()->mapWithKeys(function ($d) {
            return ['F:' . $d->id => $d];
        });
        $Associates = Employee::query()->where('is_active', "<>", "0")->get()->mapWithKeys(function ($d) {
            return ['E:' . $d->id => $d];
        });

        $allUsers = [];
        // $Admins->each(function ($d) use($allUsers)
        // {
        //     $allUsers['']
        // })
        $allUsers = collect(compact('Admins', 'Managers', 'FrontDesks', 'Associates'));
        return $allUsers;
    }
}



if (!function_exists('print_copiable_text')) {
    function print_copiable_text($text, $title = "")
    {
        $strSpecial =  htmlspecialchars($text);
        $strEntity =  htmlentities($text);
        $titleEntity =  htmlentities($title);
        return "
        <span>
            <a class=\"SelfCopyAttr\" href=\"javascript:void(0);\" title=\"{$titleEntity}\" data-clipboard-text=\"{$strSpecial}\"><i class=\"fa fa-copy\"></i>&nbsp;</a>
            <pre nostyle=\"nostyle\" class=\"d-inline\">{$strEntity}</pre>
        </span
      ";
    }
}



if (!function_exists('getIndianCurrencyInWordV2')) {

    function getIndianCurrencyInWordV2(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
        );
        $digits = array('', 'hundred', 'thousand', 'lac', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' paise' : '';
        // $wordInRupee = ($Rupees ? $Rupees . 'rupees ' : '') . $paise;
        // $wordInRupee = str_replace("  ", " ", $wordInRupee);
        $wordInRupee = str_replace(" and ", " ", $Rupees);
        return $wordInRupee;
    }
}


if (!function_exists('getHostUrl')) {

    function getHostUrl()
    {
        return parse_url(config('app.url'), PHP_URL_HOST);
    }
}


if (!function_exists('getSubdomainHost')) {
    function getSubdomainHost(string $subd)
    {
        return $subd . "." . getHostUrl();
    }
}



if (!function_exists('is_cli_mode')) {
    function is_cli_mode()
    {
        return strpos(php_sapi_name(), 'cli') !== false;
    }
}
