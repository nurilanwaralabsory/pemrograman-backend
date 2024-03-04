<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    //  fungsi ini untuk mengelola request user kalau ada rolenyan yang diinginkan
    // kalau user itu ada rolenya yang cocok maka dibolehkan ke halaman yang diinginkan
    // kalau tidak ada rolenya yang cocok maka akan diarahkan ke halaman yang diinginkan

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // logika kalau user itu ada role yang sesuai  
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }
        // ini kondisi dimana user tidak boleh melewati jalur itu
        return abort(403);
    }
}
