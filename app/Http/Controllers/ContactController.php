<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // public function __invoke(ContactRequest $request)
    // {
    //     try {
    //         Mail::to('laraveller2021@gmail.com')
    //             ->send(new ContactMail($request->name, $request->email, $request->body));

    //         return redirect()->back();
    //     } catch (\Throwable $th) {

    //         Log::error($th->getFile());
    //         Log::error($th->getLine());
    //         Log::error($th->getMessage());

    //         return redirect()->back();
    //     }
    // }

    public function contact(Request $request){
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'body' => ['required']
        ]);
        try {
            Mail::to('shakil.shible@gmail.com')
                ->send(new ContactMail($request->name, $request->email, $request->body));

            return redirect()->back();
        } catch (\Throwable $th) {

            Log::error($th->getFile());
            Log::error($th->getLine());
            Log::error($th->getMessage());

            return redirect()->back();
        }
    }
}
