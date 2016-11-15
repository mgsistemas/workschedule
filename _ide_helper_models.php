<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Espelho
 *
 * @property integer $id
 * @property integer $prestador_id
 * @property string $data_emissao
 * @property integer $servico_id
 * @property string $cnpj_faturamento
 * @property string $data_provisionamento
 * @property float $valor_provisionamento
 * @property float $desconto
 * @property string $observacao_desconto
 * @property string $numero_nf
 * @property string $numero_pedido_compra
 * @property string $situacao ENV = Enviado
 * DVA = Devolvido para análise
 * PRV = Provisionado
 * @property string $login
 * @property string $data_atualizacao
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho wherePrestadorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereDataEmissao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereServicoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereCnpjFaturamento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereDataProvisionamento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereValorProvisionamento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereDesconto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereObservacaoDesconto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereNumeroNf($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereNumeroPedidoCompra($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereSituacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Espelho whereDataAtualizacao($value)
 */
	class Espelho extends \Eloquent {}
}

namespace App{
/**
 * App\Lancamento
 *
 * @property integer $id
 * @property integer $prestador_id
 * @property integer $usuario_id
 * @property integer $colaborador_id
 * @property string $data_servico
 * @property string $hora_servico
 * @property string $data_fim
 * @property string $hora_fim
 * @property boolean $daf
 * @property integer $servico_id
 * @property string $cnpj
 * @property integer $marca_id
 * @property string $modelo
 * @property string $placa
 * @property string $chassi
 * @property integer $empresaprestador_id
 * @property float $importancia_segurada
 * @property float $valor
 * @property string $numero_os
 * @property string $cep
 * @property integer $tipolocalizado_id
 * @property integer $tiposervicopreservacao_id
 * @property boolean $localizado
 * @property string $cidade
 * @property string $estado
 * @property string $situacao D = Devolvido, E=Enviado, X-Devolvido, C-Cancelado, A=Aprovado, P=Em Digitação, P=Provisionado.
 * @property integer $local_ocorrencia 1 - Casa Porto
 * 2 - Cliente
 * @property string $observacao
 * @property string $sucursal
 * @property integer $espelho_id
 * @property string $login
 * @property string $data_atualizacao
 * @property-read mixed $data_servico_formatted
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento wherePrestadorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereUsuarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereColaboradorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereDataServico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereHoraServico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereDataFim($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereHoraFim($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereDaf($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereServicoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereCnpj($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereMarcaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereModelo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento wherePlaca($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereChassi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereEmpresaprestadorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereImportanciaSegurada($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereNumeroOs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereCep($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereTipolocalizadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereTiposervicopreservacaoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereLocalizado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereCidade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereEstado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereSituacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereLocalOcorrencia($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereObservacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereSucursal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereEspelhoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lancamento whereDataAtualizacao($value)
 */
	class Lancamento extends \Eloquent {}
}

namespace App{
/**
 * App\Prestador
 *
 * @property integer $id
 * @property string $razao_social
 * @property string $cnpj
 * @property string $logradouro
 * @property integer $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $telefone_fixo
 * @property string $telefone_movel
 * @property string $email
 * @property string $contato
 * @property string $matricula
 * @property string $data_cadastro
 * @property string $data_inicio
 * @property string $situacao
 * @property string $data_fim
 * @property string $codigo_do_parceiro
 * @property string $login
 * @property string $data_atualizacao
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereRazaoSocial($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereCnpj($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereLogradouro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereNumero($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereComplemento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereBairro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereCidade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereEstado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereTelefoneFixo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereTelefoneMovel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereContato($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereMatricula($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereDataCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereDataInicio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereSituacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereDataFim($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereCodigoDoParceiro($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prestador whereDataAtualizacao($value)
 */
	class Prestador extends \Eloquent {}
}

namespace App{
/**
 * App\Servico
 *
 * @property integer $id
 * @property integer $tipo_servico 1 - Localização
 * 2 - Preservação e Eventos
 * 3 - Agile
 * @property string $descricao
 * @property integer $dia_fechamento
 * @property string $periodo
 * @property string $data_limite_nf
 * @property string $discriminacao_servico
 * @property string $codigo_interno
 * @property string $cnpj_faturamento
 * @property string $nome_empresa_faturamento
 * @property boolean $reter_iss
 * @property float $percentual_iss
 * @property string $observacao
 * @property string $situacao
 * @property string $login
 * @property string $data_atualizacao
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereTipoServico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereDescricao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereDiaFechamento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico wherePeriodo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereDataLimiteNf($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereDiscriminacaoServico($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereCodigoInterno($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereCnpjFaturamento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereNomeEmpresaFaturamento($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereReterIss($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico wherePercentualIss($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereObservacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereSituacao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Servico whereDataAtualizacao($value)
 */
	class Servico extends \Eloquent {}
}

namespace App{
/**
 * App\ServicoResponsavel
 *
 * @property integer $id
 * @property integer $servico_id
 * @property string $nome
 * @property string $telefone
 * @property string $email
 * @property string $login
 * @property string $data_atualizacao
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereServicoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereNome($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereTelefone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ServicoResponsavel whereDataAtualizacao($value)
 */
	class ServicoResponsavel extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

