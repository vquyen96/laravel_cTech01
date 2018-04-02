<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CateHosting;
use App\Models\CateEmail;
use App\Models\CateServer;
use App\Models\CateAds;
use App\Models\CateSoft;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['catehosting'] = CateHosting::all();
        $data['cateemail'] = CateEmail::all();
        $data['cateserver'] = CateServer::all();
        $data['cateads'] = CateAds::all();
        $data['catesoft'] = CateSoft::all();
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
