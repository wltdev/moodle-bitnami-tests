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
 * Strings for component 'factor_grace', language 'pt_br', version '4.4'.
 *
 * @package     factor_grace
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['info'] = 'Permite o login sem outro fator por um período de tempo definido.';
$string['pluginname'] = 'Período de carência';
$string['preferences'] = 'Preferencias do usuário';
$string['privacy:metadata'] = 'O plugin de fator Período de carência não armazena nenhum dado pessoal';
$string['redirectsetup'] = 'Você deve completar a configuração para a autenticação multi-fator antes de prosseguir.';
$string['revokeexpiredfactors'] = 'Revogar fatores de período de carência expirados';
$string['settings:customwarning'] = 'Conteúdo do banner de aviso';
$string['settings:customwarning_help'] = 'Adicione conteúdo aqui para substituir a notificação de aviso de carência por conteúdos HTML personalizados. Adicionar {timeremaining} no texto substituirá pelo tempo atual de carência para o usuário, e {setuplink} será substituído pelo URL da página de configuração para o usuário.';
$string['settings:forcesetup'] = 'Forçar configuração do fator';
$string['settings:forcesetup_help'] = 'Força um usuário para a página de preferências para configurar a autenticação multi-fator quando o período de carência expira. Se não marcado, os usuários não poderão autenticar quando o período de carência expirar.';
$string['settings:graceperiod'] = 'Período de carência';
$string['settings:graceperiod_help'] = 'Período de tempo em que os usuários podem acessar o site sem fatores configurados e ativados.';
$string['settings:ignorelist'] = 'Fatores ignorados';
$string['settings:ignorelist_help'] = 'O período de carência não dará pontos se houver outros fatores que os usuários possam usar para autenticar com autenticação multifator. Quaisquer fatores aqui não serão contados pelo período de carência ao decidir se dar pontos. Isso pode permitir que o período de carência permita a autenticação se outro fator, como o e-mail, tiver problemas de configuração ou sistema.';
$string['setupfactors'] = 'Você está atualmente no período de carência e pode não ter fatores suficientes configurados para fazer login assim que o período de carência expirar. Vá para {$a->url} para verificar seu status de autenticação e configurar mais fatores de autenticação. Seu período de carência expira em {$a->time}.';
$string['summarycondition'] = 'está dentro do período de carência';
