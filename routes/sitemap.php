<?php

/**
 * Dynamic Sitemap Generator for Home Putra Interior
 * This generates an XML sitemap for better SEO indexing
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Models\Portfolio;
use App\Models\Service;

Route::get('/sitemap.xml', function () {
    $portfolios = Portfolio::where('is_active', true)->orderBy('updated_at', 'desc')->get();
    $services = Service::where('is_active', true)->orderBy('updated_at', 'desc')->get();

    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Homepage
    $content .= '<url>';
    $content .= '<loc>' . url('/') . '</loc>';
    $content .= '<lastmod>' . now()->toW3cString() . '</lastmod>';
    $content .= '<changefreq>weekly</changefreq>';
    $content .= '<priority>1.0</priority>';
    $content .= '</url>';

    // Calculator Page
    $content .= '<url>';
    $content .= '<loc>' . url('/calculator') . '</loc>';
    $content .= '<lastmod>' . now()->toW3cString() . '</lastmod>';
    $content .= '<changefreq>monthly</changefreq>';
    $content .= '<priority>0.9</priority>';
    $content .= '</url>';

    // Services
    foreach ($services as $service) {
        $content .= '<url>';
        $content .= '<loc>' . url('/services/' . $service->slug) . '</loc>';
        $content .= '<lastmod>' . $service->updated_at->toW3cString() . '</lastmod>';
        $content .= '<changefreq>monthly</changefreq>';
        $content .= '<priority>0.8</priority>';
        $content .= '</url>';
    }

    // Portfolios
    foreach ($portfolios as $portfolio) {
        $content .= '<url>';
        $content .= '<loc>' . url('/portfolio/' . $portfolio->slug) . '</loc>';
        $content .= '<lastmod>' . $portfolio->updated_at->toW3cString() . '</lastmod>';
        $content .= '<changefreq>monthly</changefreq>';
        $content .= '<priority>0.7</priority>';
        $content .= '</url>';
    }

    $content .= '</urlset>';

    return Response::make($content, 200, [
        'Content-Type' => 'application/xml'
    ]);
})->name('sitemap');
