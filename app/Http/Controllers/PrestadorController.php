<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PrestadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = \App\Prestador::paginate(20);
        return view('prestadores.index', compact('prestadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //dd(['prestadores'=>$prestadores]);
        try {

            //dd($prest);
            $prestadores = \App\Prestador::all();




            Mail::send('emails.listaprestadores',['prestadores'=> $prestadores],function ($message) use ($prestadores){
                $message->to('marcelo@mgsistemas.com.br', 'Marcelo Gomes');
                $message->from('admi@marcelogomes.eti.br','Marcelo');
                $message->subject('[Teste] Lista de Prestadores');
            });

            return 'E-mail enviado';
            /*
            $from = 'mrc-gomes@uol.com.br';
            $fromName = 'Marcelo Gomes';

            $dados = [
                'nome' => 'Marcelo',
                'email' => 'marcelo@mgsistemas.com.br',
                'mensagem' => 'Testes',
            ];


            Mail::send('emails.contato', $dados, function($message) use ($fromName, $from){
                $message->to('marcelo@mgsistemas.com.br');
                $message->from($from, $fromName);
                $message->subject('Teste');
            });
            */

        } catch (\Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
