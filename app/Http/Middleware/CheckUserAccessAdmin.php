<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;

class CheckUserAccessAdmin
{
    public function handle(Request $request, $next)
    {
        $user = $request->user();

        if ($user && ($user->admin == 1)) {
            // User memiliki akses sebagai admin atau super admin
            return $next($request);
        }

        // User tidak memiliki akses, Anda dapat menangani ini sesuai kebutuhan, misalnya, redirect atau tampilkan pesan kesalahan.
        return redirect()->back()->with('message', 'Anda tidak memiliki akses.');
    }
}
