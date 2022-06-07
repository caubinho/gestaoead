<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;

class TenantFilesystems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $uuid = session('tenant')['id'];


        config()->set([
            'filesystems.disks.s3.url' => config('filesystems.disks.s3.url')."/{$uuid}",
        ]);

        //dd(config('filesystems.disks.s3'));

        return $next($request);
    }
}
