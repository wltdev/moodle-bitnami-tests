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
 * Strings for component 'factor_capability', language 'pt_br', version '4.4'.
 *
 * @package     factor_capability
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['capability:cannotpassfactor'] = 'IMPEDE que um papel seja aprovado no fator de capacidade do usuário MFA.';
$string['pluginname'] = 'Capacidade do usuário';
$string['privacy:metadata'] = 'O plugin do fator de capacidade do usuário não armazena nenhum dado pessoal.';
$string['settings:adminpasses'] = 'Administradores do site podem passar neste fator';
$string['settings:adminpasses_help'] = 'Por padrão, os administradores são aprovados em todas as verificações de capacidade, incluindo esta que usa \'factor/capability:cannotpassfactor\', o que significa que eles serão reprovados neste fator.
     Se marcado, todos os administradores do site serão aprovados neste fator se não tiverem esse recurso de outro papel.
     Se não for verificado, os administradores do site serão reprovados neste fator.';
$string['summarycondition'] = 'NÃO possui a capacidade factor/capability:cannotpassfactor em nenhum papel, incluindo administrador do site.';
