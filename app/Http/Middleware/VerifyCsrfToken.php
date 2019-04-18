<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/success',
        '/cancel',
        '/fail',
        '/ipn',
        '/admin/get-sub-Categories',
        '/admin/get-subCat_videos',
        '/admin/get-video_as_tags',
        '/admin/get-related_videos',
        '/admin/get-single_videoInfo',
        '/admin/Search_by_title',
    ];
}
