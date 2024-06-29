<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Strings for component 'factor_sms', language 'pt_br', version '4.4'.
 *
 * @package     factor_sms
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action:manage'] = 'Gerenciar número de celular';
$string['action:revoke'] = 'Remover número de celular';
$string['addnumber'] = 'Número de celular';
$string['clientnotfound'] = 'Cliente de serviço AWS não encontrado. O cliente deve ser um nome de classe totalmente qualificado, por exemplo. \\Aws\\S3\\S3Cliente';
$string['editphonenumber'] = 'Editar número de telefone';
$string['editphonenumberinfo'] = 'Se você não recebeu o código ou digitou o número errado, edite o número e tente novamente.';
$string['error:emptyverification'] = 'Código vazio. Tente novamente.';
$string['error:wrongphonenumber'] = 'O número de telefone fornecido não está em um formato válido.';
$string['error:wrongverification'] = 'Código errado. Tente novamente.';
$string['errorawsconection'] = 'Erro ao conectar ao servidor AWS: {$a}';
$string['errorsmssent'] = 'Erro ao enviar uma mensagem SMS contendo seu código de verificação.';
$string['event:smssent'] = 'Mensagem SMS enviada';
$string['event:smssentdescription'] = 'O usuário com id {$a->userid} recebeu um código de verificação via SMS <br> Informação: {$a->debuginfo}';
$string['info'] = 'Enviar um código de verificação para o número de celular que você escolher.';
$string['logindesc'] = 'Acabamos de enviar um SMS contendo um código de 6 dígitos para o seu número de celular: {$a}';
$string['loginoption'] = 'Envie um código para o seu celular';
$string['loginskip'] = 'Não recebi um código';
$string['loginsubmit'] = 'Continue';
$string['logintitle'] = 'Digite o código de verificação enviado para seu celular';
$string['managefactor'] = 'Gerenciar SMS';
$string['managefactorbutton'] = 'Gerenciar';
$string['manageinfo'] = 'Você está usando \'{$a}\' para autenticar.';
$string['phonehelp'] = 'Digite o número do seu celular (incluindo o código do país) para receber um código de verificação.';
$string['pluginname'] = 'Celular SMS';
$string['privacy:metadata'] = 'O plugin de fator SMS para celular não armazena nenhum dado pessoal';
$string['revokefactorconfirmation'] = 'Remover \'{$a}\' SMS?';
$string['settings:aws'] = 'AWS SNS';
$string['settings:aws:key'] = 'Chave';
$string['settings:aws:key_help'] = 'Credencial de chave de API da Amazon.';
$string['settings:aws:region'] = 'Região';
$string['settings:aws:region_help'] = 'Região de gateway da API da Amazon.';
$string['settings:aws:secret'] = 'Segredo';
$string['settings:aws:secret_help'] = 'Credencial secreta da API da Amazon.';
$string['settings:aws:usecredchain'] = 'Use o conjunto de provedores de credenciais padrão para encontrar credenciais da AWS';
$string['settings:countrycode'] = 'Código numérico do país';
$string['settings:countrycode_help'] = 'O código de chamada sem o + inicial como padrão se os usuários não inserirem um número internacional com um prefixo +.

Veja este link para uma lista de códigos de chamada: {$a}';
$string['settings:duration'] = 'Duração da validade';
$string['settings:duration_help'] = 'O período de tempo em que o código é válido.';
$string['settings:gateway'] = 'SMS Gateway';
$string['settings:gateway_help'] = 'O provedor de SMS pelo qual você deseja enviar mensagens';
$string['setupfactor'] = 'Configurar SMS';
$string['setupfactorbutton'] = 'Configurar';
$string['setupsubmitcode'] = 'Salvar';
$string['setupsubmitphone'] = 'Enviar código';
$string['smsstring'] = '{$a->code} é o seu código de segurança único {$a->fullname}.

@{$a->url} #{$a->código}';
$string['summarycondition'] = 'Usando um código de segurança único por SMS';
