<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();


        /**
         * +-------------------------------------------------------------------
         * | Limpar a tabela de lotes de email
         * | processamento diario
         * +-------------------------------------------------------------------
         */
        $schedule->call(function(){
            try {
                \DB::table('modulo_pr_tmp_email_lote')->truncate();
                print "Hora : " . date('d/m/Y G:i:s');
            } catch (\Exception $e){
                print $e->getTraceAsString();
            }

        })->dailyAt('2:10');
        //-----------------------------------------------------------------------


        /**
         * +--------------------------------------------------------------------
         * | lista de prestadores sem espelhos emitidos
         * | processamento todo dia 28 de cada mes
         * +--------------------------------------------------------------------
         */
        $schedule->call(function() {
            $prestadores = \App\Prestador::all();
            $hoje = date('d/m/Y');
            $d = explode('/', $hoje);
            $mes = $d[1];

            $dados = array();
            foreach ($prestadores as $prestador) {
                $achou = \DB::table('modulo_pr_espelho')
                    ->where('prestador_id', '=', $prestador->id)
                    ->whereMonth('data_emissao', $mes)->get();
                // não achou os dados, entao adiciona na lista
                if (sizeof($achou) == 0) {
                    $par = array();
                    $par['id'] = $prestador->id;
                    $par['razao_social'] = $prestador->razao_social;
                    array_push($dados, $par);
                }
            }
            // obtem os emails para aviso e envia
            $responsaveis = \App\ServicoResponsavel::all();
            $arr_email = array();
            foreach ($responsaveis as $responsavel) {
                array_push($arr_email,$responsavel->email);
            }

            Mail::send('emails.listaprestadores', ['dados' => $dados], function ($message) use ($dados, $arr_email) {
                $message->to($arr_email);
                $message->from('trabalhoemdia@trabalhoemdia.com', 'TrabalhoEmDia.com');
                $message->subject('[Prevenção de Riscos] Lista de Prestadores Sem Espelhos Emitidos no mês');
            });


            Mail::send('emails.listaprestadores',['dados' => $dados],function ($message) use ($dados){
                $message->to('marcelo@mgsistemas.com.br', 'Marcelo Gomes');
                $message->from('trabalhoemdia@trabalhoemdia.com','TrabalhoEmDia.com');
                $message->subject('[Prevenção de Riscos] Lista de Prestadores Sem Espelhos Emitidos no mês');
            });

            Mail::send('emails.listaprestadores',['dados' => $dados],function ($message) use ($dados){
                $message->to('odirlei.silva@portoseguro.com.br', 'Odirlei Silva');
                $message->from('trabalhoemdia@trabalhoemdia.com','TrabalhoEmDia.com');
                $message->subject('[Prevenção de Riscos] Lista de Prestadores Sem Espelhos Emitidos no mês');
            });

            Mail::send('emails.listaprestadores',['dados' => $dados],function ($message) use ($dados){
                $message->to('marcio.guarnieri@portoseguro.com.br', 'Marcio Guarnieri');
                $message->from('trabalhoemdia@trabalhoemdia.com','TrabalhoEmDia.com');
                $message->subject('[Prevenção de Riscos] Lista de Prestadores Sem Espelhos Emitidos no mês');
            });

            /*
            Mail::send('emails.listaprestadores',['prestadores'=> $prestadores],function ($message) use ($prestadores){
                $message->to('marcelo@mgsistemas.com.br', 'Marcelo Gomes');
                $message->from('admin@marcelogomes.eti.br','Marcelo');
                $message->subject('[Teste] Lista de Prestadores');
            });
            */
        })->monthlyOn(28, '7:00');;
        //-------------------------------------------------------------------------------------------------------------

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
