<?php

namespace App\Filament;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Http\RedirectResponse;

class MyLogoutResponse implements LogoutResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        // arahkan ke halaman login customer
        return redirect()->route('home'); // atau bisa: return redirect('/login');
    }
}

?>