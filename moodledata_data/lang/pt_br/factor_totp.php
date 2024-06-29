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
 * Strings for component 'factor_totp', language 'pt_br', version '4.4'.
 *
 * @package     factor_totp
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action:manage'] = 'Gerenciar autenticador de senha única baseada em tempo (TOTP)';
$string['action:revoke'] = 'Remover autenticador de senha única baseada em tempo (TOTP)';
$string['devicename'] = 'Rótulo do dispositivo';
$string['devicename_help'] = 'Este é o dispositivo em que você tem um aplicativo autenticador instalado. Você pode configurar vários dispositivos para que este rótulo ajude a rastrear quais estão sendo usados. Você deve configurar cada dispositivo com seu próprio código exclusivo para que possam ser revogados separadamente.';
$string['devicenameexample'] = 'por exemplo, "iPhone 11 do trabalho"';
$string['error:alreadyregistered'] = 'Este segredo de senha única baseada em tempo (TOTP) já foi registrado.';
$string['error:codealreadyused'] = 'Este código já foi usado para autenticação. Aguarde a geração de um novo código e tente novamente.';
$string['error:futurecode'] = 'Este código é inválido. Verifique se a hora no seu dispositivo autenticador está correta e tente novamente.
    A hora atual do sistema é {$a}.';
$string['error:oldcode'] = 'Este código está muito antigo. Verifique se a hora no seu dispositivo autenticador está correta e tente novamente.
    A hora atual do sistema é {$a}.';
$string['error:wrongverification'] = 'Código de verificação incorreto.';
$string['factorsetup'] = 'Configuração do aplicativo';
$string['info'] = 'Gerar um código de verificação usando um aplicativo autenticador.';
$string['logindesc'] = 'Use o aplicativo autenticador em seu dispositivo móvel para gerar um código.';
$string['loginoption'] = 'Usar aplicativo autenticador';
$string['loginskip'] = 'Eu não tenho meu dispositivo';
$string['loginsubmit'] = 'Continuar';
$string['logintitle'] = 'Verificar se é você pelo aplicativo móvel';
$string['managefactor'] = 'Gerenciar aplicativo autenticador';
$string['managefactorbutton'] = 'Gerenciar';
$string['manageinfo'] = 'Você está usando "{$a}" para autenticar.';
$string['pluginname'] = 'Aplicativo autenticador';
$string['privacy:metadata'] = 'O plugin de fator do aplicativo Authenticator não armazena dados pessoais.';
$string['replacefactor'] = 'Substituir aplicativo autenticador';
$string['replacefactorconfirmation'] = 'Substituir aplicativo autenticador "{$a}"?';
$string['revokefactorconfirmation'] = 'Remover aplicativo autenticador "{$a}"?';
$string['settings:totplink'] = 'Mostrar link de configuração do aplicativo móvel';
$string['settings:totplink_help'] = 'Se habilitado, o usuário verá uma terceira opção de configuração com um link direto otpauth://';
$string['settings:window'] = 'Janela de verificação TOTP';
$string['settings:window_help'] = 'Por quanto tempo cada código é válido. Você pode definir isso para um valor mais alto como solução alternativa, se os relógios dos dispositivos dos seus usuários frequentemente estiverem ligeiramente errados.
Arredondado para baixo para o mais próximo de 30 segundos, que é o tempo entre a geração de novos códigos.';
$string['setupfactor'] = 'Configurar aplicativo autenticador';
$string['setupfactor:account'] = 'Conta:';
$string['setupfactor:devicename'] = 'Nome do dispositivo';
$string['setupfactor:devicenameinfo'] = 'Isso ajuda você a identificar qual dispositivo recebe o código de verificação.';
$string['setupfactor:enter'] = 'Digite os detalhes manualmente';
$string['setupfactor:instructionsdevicename'] = '1. Dê um nome ao seu dispositivo.';
$string['setupfactor:instructionsscan'] = '2. Escaneie o código QR com seu aplicativo autenticador.';
$string['setupfactor:instructionsverification'] = '3. Digite o código de verificação.';
$string['setupfactor:intro'] = 'Para configurar este método, você precisa ter um dispositivo com um aplicativo autenticador. Se você não tiver um aplicativo, você pode baixar um. Por exemplo, <a href="https://2fas.com/" target="_blank">2FAS Auth</a>, <a href="https://freeotp.github.io/" target="_blank">FreeOTP</a>, Google Authenticator, Microsoft Authenticator ou Twilio Authy.';
$string['setupfactor:key'] = 'Chave secreta:';
$string['setupfactor:link'] = 'Ou digite os detalhes manualmente.';
$string['setupfactor:link_help'] = 'Se você estiver em um dispositivo móvel e já tiver um aplicativo autenticador instalado, este link pode funcionar. Observe que usar o TOTP no mesmo dispositivo em que você faz login pode enfraquecer os benefícios do MFA.';
$string['setupfactor:linklabel'] = 'Abrir aplicativo já instalado neste dispositivo';
$string['setupfactor:mode'] = 'Modo:';
$string['setupfactor:mode:timebased'] = 'Baseado no tempo';
$string['setupfactor:scan'] = 'Escaneie o código QR';
$string['setupfactor:scanfail'] = 'Não consegue escanear?';
$string['setupfactor:scanwithapp'] = 'Escanear código QR com seu aplicativo autenticador escolhido.';
$string['setupfactor:verificationcode'] = 'Código de verificação';
$string['setupfactorbutton'] = 'Configurar';
$string['summarycondition'] = 'usando um aplicativo TOTP';
$string['systimeformat'] = '%l:%M:%S %P %Z';
$string['verificationcode'] = 'Digite seu código de verificação de 6 dígitos';
$string['verificationcode_help'] = 'Abra seu aplicativo autenticador, como o Google Authenticator, e procure o código de 6 dígitos que corresponde a este site e nome de usuário';
