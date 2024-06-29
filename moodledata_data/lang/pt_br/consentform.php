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
 * Strings for component 'consentform', language 'pt_br', version '4.4'.
 *
 * @package     consentform
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['agree'] = 'Eu concordo';
$string['agreed'] = 'acordado';
$string['agreementlogentry'] = 'Você concordou em {$a}.';
$string['backbuttonlist'] = 'Voltar a lista de módulos';
$string['choice'] = 'Faça sua escolha:';
$string['configurations'] = 'Configuração desta instância do formulário de consentimento';
$string['confirmationtext'] = 'Texto do formulário de consentimento para concordar';
$string['confirmincourseoverview'] = 'Visão geral do contrato no curso';
$string['confirmincourseoverview_help'] = 'A concordância/recusa é fornecida na página de visão geral do curso. Esta opção só pode ser escolhida ao criar este módulo.';
$string['confirmincourseoverviewdesc'] = 'A concordância/recusa é fornecida na página de visão geral do curso.';
$string['consentform'] = 'Formulário de consentimento';
$string['consentform:addinstance'] = 'Adicione um novo módulo de formulário de consentimento';
$string['consentform:submit'] = 'Editar formulário de concentimento';
$string['consentform:view'] = 'Ver formulário de concentimento';
$string['consentformname'] = 'Nome';
$string['consentformname_help'] = 'Dê a está instância um nome';
$string['deletetestaction'] = 'Exclua sua ação de teste';
$string['deletetesterrormessage'] = 'Não foi possível excluir sua ação de teste devido a problemas técnicos.';
$string['deletetestmessage'] = 'Sua ação de teste foi excluída.';
$string['dependencies'] = 'Administração';
$string['dependencies_description'] = 'Marcar na lista todas as atividades ou recursos que ficarão inacessíveis aos estudantes enquanto este termo de consentimento não for confirmado.';
$string['dependent'] = 'Atividades e recursos';
$string['description'] = 'Descrição';
$string['downloadbuttonlabel'] = 'Exportar';
$string['eventagreementagree'] = 'Usuário ACORDADO';
$string['eventagreementagreedesc'] = 'O usuário com id {$a->userid} CONCORDA com a declaração do formulário de consentimento do módulo {$a->contextinstanceid}.';
$string['eventagreementrefuse'] = 'Usuário RECUSADO';
$string['eventagreementrefusedesc'] = 'O usuário com id {$a->userid} RECUSOU a declaração do formulário de consentimento do módulo {$a->contextinstanceid}.';
$string['eventagreementrevoke'] = 'Usuário REVOGADO';
$string['instancelistviewed'] = 'Lista de instâncias visualizadas';
$string['instancelistvieweddesc'] = 'O usuário com id {$a->userid} visualizou a lista de instâncias do módulo {$a->contextinstanceid}.';
$string['linktexttomodulesettings'] = 'Link para as configurações do módulo';
$string['listempty'] = 'Sem entradas encontradas';
$string['listusers'] = 'Acordos';
$string['listusersbutton'] = 'Ver todos os acordos';
$string['modulelistlinktext'] = 'Definir denpendências';
$string['modulename'] = 'Formulário de consentimento';
$string['modulename_help'] = 'Use o módulo formulário de consentimento para descobrir certas atividades, não antes de o participante concordar.';
$string['modulenameplural'] = 'Formulários de consentimento';
$string['modules'] = 'Atividades e Recursos';
$string['moduleviewed'] = 'Página principal do módulo visualizada';
$string['modulevieweddesc'] = 'O usuário com id {$a->userid} visualizou a página principal do módulo {$a->contextinstanceid}.';
$string['msgagreed'] = 'Você CONCORDOU com sucesso com esta declaração de consentimento.';
$string['msgagreedfailure'] = 'Sua escolha não pôde ser salva. Por favor, tente novamente.';
$string['msgrefused'] = 'Você recusou esta declaração de consentimento.';
$string['msgrevoked'] = 'Você REVOGOU com sucesso esta declaração de consentimento.';
$string['noaction'] = 'Sem Ação';
$string['nocompletion'] = 'O Formulário de consentimento precisa que o recurso "rastreamento de conclusão" do moodle esteja ativado, o que momentaneamente não é o caso. Entre em contato com o administrador do Moodle.';
$string['nocompletioncourse'] = 'Este CURSO precisa que o recurso "rastreamento de conclusão" do moodle esteja ativado nas configurações do curso, o que momentaneamente não é o caso.';
$string['nocompletioncourselinktext'] = 'Link para as configurações do curso';
$string['nocompletionlinktext'] = 'Link para mais informações';
$string['nocompletionmodule'] = 'Este MÓDULO precisa que o recurso "rastreamento de conclusão" do moodle esteja ativado nas configurações do módulo, o que momentaneamente não é o caso.';
$string['nocompletionmodulelinktext'] = 'Link para as configurações do módulo';
$string['nocompletiontitle'] = 'Conclusão não ativa';
$string['nocoursemoduleslist'] = 'Nenhuma lista de módulos do curso';
$string['nocoursemoduleslist_help'] = 'Esta instância do formulário de consentimento não mostra nenhuma lista de módulos do curso para configurar dependências de outros módulos do curso para este formulário de consentimento. Você mesmo deve configurar essas dependências ou alterar essa configuração nas configurações do módulo.';
$string['nocoursemoduleslistdesc'] = 'Nenhuma lista de módulos do curso é usada. Se você quiser configurar as dependências sozinho';
$string['optionrefuse'] = 'Recusa';
$string['optionrefuse_help'] = 'Permita que os participantes recusem esta declaração de consentimento.';
$string['optionrefusedesc'] = 'Padrão para opção de recusar.';
$string['optionrevoke'] = 'Opção de revogar';
$string['optionrevoke_help'] = 'Permita que os participantes revoguem seu acordo.';
$string['optionrevokedesc'] = 'Padrão para opção de revogação';
$string['pluginadministration'] = 'Administração do formulário de consentimento';
$string['pluginname'] = 'Formulário de consentimento';
$string['privacy:metadata:consentform_state'] = 'Informações sobre o estado de confirmação dos usuários que participaram desta instância do formulário de consentimento.';
$string['privacy:metadata:state'] = 'Um valor para o estado de confirmação deste usuário: 1 para acordado, 0 para revogado, -1 para recusado.';
$string['privacy:metadata:userid'] = 'O ID de um usuário que participou desta instância do formulário de consentimento.';
$string['refuse'] = 'Eu recuso';
$string['refused'] = 'recusado';
$string['refuselogentry'] = 'Você recusou o acordo em {$a}.';
$string['resetconsentform'] = 'Limpar todos os dados de ação';
$string['resetok'] = 'Todos os dados removidos';
$string['revocation'] = 'Revogar';
$string['revoke'] = 'Eu revogo';
$string['revoked'] = 'revogado';
$string['revokelogentry'] = 'Você revogou seu contrato em {$a}.';
$string['state'] = 'Estado';
$string['textagreementbutton'] = 'Botão de contrato de etiqueta';
$string['textagreementbuttondesc'] = 'Valor padrão para o rótulo do botão do contrato.';
$string['textfields'] = 'Campos de texto';
$string['textrefusalbutton'] = 'Botão de recusa de etiqueta';
$string['textrefusalbuttondesc'] = 'Valor padrão para o rótulo do botão de recusar.';
$string['textrevocationbutton'] = 'Botão de revogação de etiqueta';
$string['textrevocationbuttondesc'] = 'Valor padrão para o rótulo do botão revogar.';
$string['timestamp'] = 'Data';
$string['titleagreed'] = 'Acordos';
$string['titleall'] = 'Todos';
$string['titlenone'] = 'Sem ação';
$string['titlerefused'] = 'Recusas';
$string['titlerevoked'] = 'Revogações';
$string['usegrade'] = 'Usar nota';
$string['usegrade_help'] = 'Quando um usuário concorda, um valor 1 é gravado para esse usuário neste módulo no boletim de notas.';
$string['usegradedesc'] = 'Usar nota para exportação';
$string['warninguserentry'] = 'Alerta: Foi encontrado um registro no formulário de consentimento na disponibilidade deste módulo que não foi realizado por este formulário de consentimento ou foi alterada desde então. Certifique-se de que (ainda) funciona!';
$string['wrongoperator'] = 'Este módulo NÃO possui uma conjunção AND em suas restrições. Este {$a->consentform} possivelmente não tem efeito neste módulo!';
