<?php

namespace WireElements\WireExtender\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Livewire\Mechanisms\FrontendAssets\FrontendAssets;
use Livewire\Mechanisms\HandleRequests\EndpointResolver;

class InjectController implements HasMiddleware
{
    public function __invoke(Request $request)
    {
        return [
            'script' => url(app(FrontendAssets::class)->javaScriptRoute->uri),
            'update' => url(app('livewire')->getUpdateUri()),
        ];
    }

    public static function middleware()
    {
        return config('wire-extender.middlewares', []);
    }
}