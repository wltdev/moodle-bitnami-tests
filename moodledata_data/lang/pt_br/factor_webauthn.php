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
 * Strings for component 'factor_webauthn', language 'pt_br', version '4.4'.
 *
 * @package     factor_webauthn
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action:manage'] = 'Gerenciar chave de segurança';
$string['action:revoke'] = 'Remover chave de segurança';
$string['authenticator:ble'] = 'BLE';
$string['authenticator:hybrid'] = 'Híbrido';
$string['authenticator:internal'] = 'Interno';
$string['authenticator:nfc'] = 'NFC';
$string['authenticator:usb'] = 'USB';
$string['authenticatorname'] = 'Nome da chave de segurança';
$string['error'] = 'Falha na autenticação';
$string['error:alreadyregistered'] = 'Esta chave de segurança já foi registrada.';
$string['info'] = 'Use uma chave de segurança física ou scanner de impressão digital.';
$string['logindesc'] = 'Clique em continuar para usar sua chave de segurança.';
$string['loginoption'] = 'Usar chave de segurança';
$string['loginskip'] = 'Não tenho minha chave de segurança';
$string['loginsubmit'] = 'Continuar';
$string['logintitle'] = 'Verifique se é você pela chave de segurança';
$string['managefactor'] = 'Gerenciar chave de segurança';
$string['managefactorbutton'] = 'Gerenciar';
$string['manageinfo'] = 'Você está usando "{$a}" para autenticação.';
$string['pluginname'] = 'Chave de segurança';
$string['privacy:metadata'] = 'O plugin de fator Chave de segurança não armazena nenhum dado pessoal.';
$string['register'] = 'Registrar chave de segurança';
$string['replacefactor'] = 'Substituir chave de segurança';
$string['replacefactorconfirmation'] = 'Substituir chave de segurança "{$a}"?';
$string['revokefactorconfirmation'] = 'Remover chave de segurança "{$a}"?';
$string['settings:authenticatortypes'] = 'Tipos de Autenticadores';
$string['settings:authenticatortypes_help'] = 'Alternar certos tipos de autenticadores';
$string['settings:userverification'] = 'Verificação de usuário';
$string['settings:userverification_help'] = 'Serve para garantir que a pessoa que está se autenticando é realmente quem diz ser. A verificação do usuário pode assumir diversas formas, como senha, PIN, impressão digital, etc.';
$string['setupfactor'] = 'Configurar chave de segurança';
$string['setupfactor:instructionsregistersecuritykey'] = '2. Registrar uma chave de segurança.';
$string['setupfactor:instructionssecuritykeyname'] = '1. Dê um nome à sua chave.';
$string['setupfactor:intro'] = 'Uma chave de segurança é um dispositivo físico que você pode usar para se autenticar. As chaves de segurança podem ser tokens USB, dispositivos Bluetooth ou até mesmo scanners de impressão digital embutidos em seu telefone ou computador.';
$string['setupfactor:securitykeyinfo'] = 'Isso ajuda você a identificar qual chave de segurança está usando.';
$string['setupfactorbutton'] = 'Configurar';
$string['summarycondition'] = 'usando um autenticador suportado pelo WebAuthn';
$string['userverification:discouraged'] = 'A verificação do usuário não deve ser empregada, por exemplo, para minimizar a interação do usuário';
$string['userverification:preferred'] = 'A verificação do usuário é preferida, a autenticação não falhará se a verificação do usuário estiver ausente';
$string['userverification:required'] = 'É necessária a verificação do usuário (por exemplo, por PIN). A autenticação falha se a chave não tiver a verificação do usuário.';
