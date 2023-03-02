<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\MailWelcomeJob;

class MailController extends Controller
{
    public function sendMails()
    {
        User::all()->each(fn ($user) => MailWelcomeJob::dispatch($user));

        return redirect()->route('welcome')->with('create', 'Los emails se han sido añadidos a la cola');
    }
}
