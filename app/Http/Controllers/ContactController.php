<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthUnit;
use Mail;
use Response;
use Log;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function __construct(HealthUnit $model)
    {
        $this->model = $model;
    }

    public function mail(Request $request, $id)
    {
        try {

            $health = $this->model->find($id);


            //Enviando e-mail
            Mail::send(new ContactMail((object)[
                'name' => $health->name,
                'email' => $health->email,
            ]));



        return redirect('/');
        } catch(\Exception $e) {
            Log::error("Erro ao enviar e-mail => ".json_encode($e));
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro ao enviar sua mensagem. Tente mais tarde!',
            ], 500);
        }
    }
}
