<?php

namespace App\Hyperverge;

class HypervergeServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->setupConfig();
        $this->app->bind(Hyperverge::class, function () {
            return new Hyperverge(appId: (string) config('hyperverge.api.id'), appKey: (string) config('hyperverge.api.key'));
        });
    }

    public function boot(): void
    {
        $this->setupEnvironment();
        $this->setupRoutes();
    }

    protected function setupConfig(): void
    {
        $this->mergeConfigFrom(base_path('app/Hyperverge/config.php'), 'hyperverge');
    }

    protected function setupRoutes(): void
    {
        with(base_path('app/Hyperverge/routes.php'), function ($path) {
            $this->loadRoutesFrom(($path));
            \Illuminate\Support\Facades\Route::middleware('web')->group($path);
        });
    }

    protected function setupEnvironment(): void
    {
//        Hyperverge::$appId = (string) config('hyperverge.api.id');
//        Hyperverge::$appKey = (string) config('hyperverge.api.key');
        Hyperverge::$workflowId = config('hyperverge.url.workflow');
        Hyperverge::$requestKYCURLEndPoint = config('hyperverge.api.url.kyc');
        Hyperverge::$inputs = array_merge(['app' => config('app.name')], []);
        Hyperverge::$languages = ['en' => 'English'];
        Hyperverge::$defaultLanguage = 'en';
        Hyperverge::$expiry = config('hyperverge.api.expiry');
        Hyperverge::$resultKYCResultEndpoint = config('hyperverge.api.url.result');
    }
}
