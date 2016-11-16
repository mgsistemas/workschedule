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
         * +------------------------------------------------------------------
         * | Limpeza
         * | execucao diaria = 2:00 AM
         * +------------------------------------------------------------------
         */
        //$schedule->command('backup:clean')->daily()->at('2:00');
        /**
         * +------------------------------------------------------------------
         * | Backup da aplicacao e dados
         * | execucao diaria = 3:00 AM
         * +------------------------------------------------------------------
         */
       // $schedule->command('backup:run')->daily()->at('3:00');
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

        /**
         * +----------------------------------------------------------------------------------------------------------
         * | Listta de movimentos diarios
         * | execução a cada trinta minutos
         * +----------------------------------------------------------------------------------------------------------
         */
        $schedule->call(function() {

            $hoje = date('d/m/Y');
            $d = explode('/',$hoje);
            $dia = $d[0];
            $mes = $d[1];
            $ano = $d[2];

            $lancamentos = \DB::table('modulo_pr_lancamento')
                ->whereDate('data_atualizacao',date('Y/m/d'))
                ->orderBy('data_atualizacao')
                ->get();
//            dd($lancamentos);

            $dados = array();
            foreach ($lancamentos as $lancamento) {
                $par = array();
                $par['id'] = $lancamento->id;

                // quebra a data
                $dt = $lancamento->data_atualizacao;

                // separa data da hora
                // $d1[0] = data
                // $d1[1] = hora
                $d1 = explode(" ",$dt);
                //dd($d1);

                // quebra apenas a data
                $d2 = explode('-',$d1[0]);
                //dd($d2);
                $ano = $d2[0];
                $mes = $d2[1];
                $dia = $d2[2];

                // monta a data
                $dt_servico = $dia.'/'.$mes.'/'.$ano.' ' . $d1[1];
                $par['data_servico'] = $dt_servico;

                // obter prestador
                $prestador = \App\Prestador::find($lancamento->prestador_id);
                $par['prestador'] = $prestador->razao_social;
                // obter sercico
                $servico = \App\Servico::find($lancamento->servico_id);
                $par['servico'] = $servico->descricao;
                $par['valor'] = $lancamento->valor;
                $par['situacao'] = \App\Lancamento::getDescricaoSituacao($lancamento->situacao);
                array_push($dados,$par);
            }

            //dd($dados);
            Mail::send('emails.movimento_diario',['dados' => $dados],function ($message) use ($dados){
                $message->to('marcelo@mgsistemas.com.br', 'Marcelo Gomes');
                $message->from('trabalhoemdia@trabalhoemdia.com','TrabalhoEmDia.com');
                $message->subject('[Prevenção de Riscos] Movimento Diário');
            });

        })->everyThirtyMinutes();
        //-------------------------------------------------------------------------------------------------------------


        /**
         * +----------------------------------------------------------------------------------------------------------
         * | Limpeza do inbox
         * | processamento diario, limpando os últimos 30 dias
         * +----------------------------------------------------------------------------------------------------------
         */
        $schedule->call(function() {
            // subtrai 30 dias
            $data = date('d/m/Y', strtotime('-30 days'));

            // desmonta a data
            $d = explode('/',$data);
            $dia = $d[0];
            $mes = $d[1];
            $ano = $d[2];

            // monta a data
            $novaData = $ano.'-'.$mes.'-'.$dia.' 23:59:59';

            // processa o delete
            try {
                $total = \DB::table('inbox')->where('data_envio','<=',$novaData)->delete();
                \Log::info('Limpeza Inbox = Total removidos : ' . count($total));
                $dados = [
                    'total' => $total
                ];
                Mail::send('emails.limpeza_inbox',['dados' => $dados],function ($message) use ($dados){
                    $message->to('marcelo@mgsistemas.com.br', 'Marcelo Gomes');
                    $message->from('trabalhoemdia@trabalhoemdia.com','TrabalhoEmDia.com');
                    $message->subject('[Work] Limpeza Inbox - Data : ' . date('d/m/Y H:i:s') );
                });

            } catch (\Exception $e) {
                \Log::error($e->getTraceAsString());
            }
        })->dailyAt('7:00');
        //+------------------------------------------------------------------------------------------------------------

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
