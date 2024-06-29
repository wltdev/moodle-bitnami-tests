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
 * Strings for component 'factor_email', language 'pt_br', version '4.4'.
 *
 * @package     factor_email
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['email:accident'] = 'Se você não solicitou o e-mail, clique em continuar para invalidar a tentativa de login. Se você clicou no link por acidente, clique em cancelar e nenhuma ação será tomada.';
$string['email:browseragent'] = 'Os detalhes do navegador para esta solicitação são: \'{$a}\'';
$string['email:geoinfo'] = 'Esta solicitação parece ter se originado aproximadamente de:';
$string['email:greeting'] = 'Olá {$a} 👋';
$string['email:ipinfo'] = 'Detalhes da solicitação de login:';
$string['email:link'] = 'Link de verificação';
$string['email:loginlink'] = 'Ou, se você estiver no mesmo dispositivo, use este {$a}.';
$string['email:message'] = 'Aqui está o seu código de verificação para {$a->sitename} ({$a->siteurl}).';
$string['email:originatingip'] = 'Esta solicitação de login foi feita de "{$a}"';
$string['email:revokelink'] = 'Se isso não foi você, você pode {$a}.';
$string['email:revokesuccess'] = 'Este código foi revogado com sucesso. Todas as sessões para {$a} foram finalizadas.
    O e-mail não será utilizado como fator até que a segurança da conta seja verificada.';
$string['email:stoploginlink'] = 'interromper esta tentativa de login';
$string['email:subject'] = 'Aqui está seu código de verificação';
$string['email:uadescription'] = 'Identidade do navegador para esta solicitação:';
$string['email:validity'] = 'O código só pode ser usado uma vez e é válido para {$a}.';
$string['error:badcode'] = 'O código não foi encontrado. Este pode ser um link antigo, um novo código pode ter sido enviado por e-mail ou a tentativa de login com este código foi bem-sucedida.';
$string['error:parameters'] = 'Parametros incorretos de página.';
$string['error:wrongverification'] = 'Código errado. Tente novamente.';
$string['event:unauthemail'] = 'E-mail não autorizado recebido';
$string['info'] = 'Você está usando o e-mail {$a} para autenticação. Isso foi configurado pelo administrador do site.';
$string['logindesc'] = 'Acabamos de enviar um código de 6 dígitos para seu e-mail: {$a}';
$string['loginoption'] = 'Receba um código por e-mail';
$string['loginskip'] = 'Não recebi um código';
$string['loginsubmit'] = 'Continuar';
$string['logintitle'] = 'Confirme que é você por e-mail';
$string['managefactor'] = 'Gerenciar e-mail';
$string['manageinfo'] = '\'{$a}\' está sendo usado para autenticação. Isso foi configurado pelo seu administrador.';
$string['pluginname'] = 'E-mail';
$string['privacy:metadata'] = 'O plugin de fator Email não armazena nenhum dado pessoal';
$string['settings:duration'] = 'Duração da validade';
$string['settings:duration_help'] = 'O período de tempo em que o código é válido.';
$string['settings:suspend'] = 'Suspender contas não autorizadas';
$string['settings:suspend_help'] = 'Marque isto para suspender contas de usuários se uma verificação de e-mail não autorizada for recebida.';
$string['setupfactor'] = 'Configuração do fator de E-mail';
$string['summarycondition'] = 'tem configuração de e-mail válida';
$string['unauthemail'] = 'E-mail não autorizado';
$string['unauthloginattempt'] = 'O usuário com ID {$a->userid} fez uma tentativa de login não autorizada usando a verificação de e-mail de
IP {$a->ip} com agente do navegador {$a->useragent}.';
$string['verificationcode'] = 'Digite o código de verificação para confirmação';
$string['verificationcode_help'] = 'Um código de verificação foi enviado para seu e-mail';
