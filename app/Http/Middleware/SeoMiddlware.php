<?php

namespace App\Http\Middleware;

use App\Models\Seo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SeoMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seo = Cache::rememberForever('seo_' . str($request->getPathInfo())->slug('_'), function () use($request) {
            return Seo::query()->where('url', $request->getPathInfo())->first() ?? false;
        });

        if($seo) {
            view()->share([
                'seo_title' => $seo->metatitle,
                'seo_description' => $seo->description,
                'seo_keywords' => $seo->keywords,
            ]);
        }

        return $next($request);
    }
}
