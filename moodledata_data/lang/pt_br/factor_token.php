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
 * Strings for component 'factor_token', language 'pt_br', version '4.4'.
 *
 * @package     factor_token
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['event:token_created'] = 'Token MFA criado';
$string['form:trust'] = 'Confie neste dispositivo para {$a}.';
$string['pluginname'] = 'Confiar neste dispositivo';
$string['privacy:metadata'] = 'O plugin de fator de confiança neste dispositivo não armazena nenhum dado pessoal.';
$string['settings:expireovernight'] = 'Expirar confiança durante a noite';
$string['settings:expireovernight_help'] = 'Isso força a expiração dos tokens durante a noite, evitando interrupções ao meio-dia para os usuários. Em vez disso, eles serão solicitados a autenticar com vários fatores no início do dia após o vencimento.';
$string['settings:expiry'] = 'Duração da confiança';
$string['settings:expiry_help'] = 'A duração que um dispositivo é confiável antes de exigir uma nova autenticação multi-fator.';
$string['summarycondition'] = 'o usuário já confiou neste dispositivo anteriormente';
$string['tokenstoredindevice'] = 'O usuário com ID {$a->userid} possui um token de autenticação multi-fator armazenado em seu dispositivo. <br> Informação: {$a->string}.';
