<?php

namespace App\Providers;

use App\EasyServeSms;
use App\FreshSms;
use App\Notice;
use App\XSettingMax;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $d =   app()->singleton(\Bgaze\BootstrapForm\BootstrapFormServiceProvider::class);
        Schema::defaultStringLength(191);
        // #Register Model Specific Macros
        // Notice::registerMacros();
        // $this->registerBladeDirectives();
        // Config::set('app.name', XSettingMax::GetWebsiteName());
        // FreshSms::boot();
        EasyServeSms::boot();
    }


    protected function registerBladeDirectives()
    {
        $functions = [
            'open', 'close', 'vertical', 'inline', 'horizontal',
            'text', 'email', 'url', 'tel', 'number', 'date', 'time', 'textarea', 'password', 'color',
            'file', 'hidden', 'select', 'range',
            'checkbox', 'checkboxes', 'radio', 'radios',
            'label', 'submit', 'reset', 'button', 'link',
        ];

        foreach ($functions as $f) {
            Blade::directive($f, function ($expression) use ($f) {
                return "<?= BF::{$f}({$expression}); ?>";
            });
        }

        //
        Blade::directive('json_e', function ($value) {
            return "<?= e(json_encode($value)); ?>";
        });
    }
}
