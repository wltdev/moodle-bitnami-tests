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
 * Strings for component 'url', language 'pt_br', version '4.4'.
 *
 * @package     url
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowvariables'] = 'Permitir variáveis de URL';
$string['allowvariables_desc'] = 'Permitir que variáveis sejam adicionadas às URLs. As variáveis permitem passar informações internas, como o nome do usuário, como parte da URL. Esteja ciente dos riscos potenciais de privacidade ao usar este recurso.';
$string['chooseavariable'] = 'Escolha uma variável ...';
$string['clicktoopen'] = 'Clique em {$a} para abrir o recurso.';
$string['configdisplayoptions'] = 'Selecione todas as opções que devem estar disponíveis, configurações existentes não serão modificadas. Pressione a tecla CTRL para selecionar múltiplos campos.';
$string['configframesize'] = 'Quando uma página web ou um arquivo enviado é exibido dentro de um frame, este valor será a altura (em pixeis) do frame do topo (que contém a navegação)';
$string['configrolesinparams'] = 'Os nomes personalizados dos papéis (nas configurações do curso) devem estar disponíveis como variáveis para parâmetros de URL?';
$string['configsecretphrase'] = 'Esta frase secreta é utilizada para produzir um valor criptografado que pode ser enviado para alguns servidores como parâmetro. O código criptografado é produzido por um valor md5 do endereço IP do usuário atual concatenado com sua frase secreta. Exemplo código = md5(IP.secretphrase) . Por favor note que isto não é confiável por que endereço IP pode mudar e é frequentemente compartilhada por diferentes computadores.';
$string['contentheader'] = 'Conteúdo';
$string['createurl'] = 'Criar uma URL';
$string['displayoptions'] = 'Opções de exibição disponíveis';
$string['displayselect'] = 'Exibir';
$string['displayselect_help'] = 'Esta definição, juntamente com o tipo de arquivo URL, determina como a URL será exibida, caso o navegador permita incorporação. As opções podem incluir:

* Automática - A melhor opção de exibição para a URL é selecionada automaticamente
* Incorporar - A URL é exibida dentro da página, abaixo da barra de navegação em conjunto com a descrição da URL e todos os blocos
* Abrir - Somente a URL é exibida na janela do navegador
* Em pop-up - A URL é exibida em uma nova janela do navegador sem menus nem barra de endereços
* No frame - A URL é exibida em um quadro abaixo da barra de navegação e descrição da URL
* Nova janela - A URL é exibida em uma nova janela do navegador com menus e uma barra de endereços';
$string['displayselectexplain'] = 'Escolha o tipo de exibição, infelizmente nem todos os tipos são adequados para todas as URLs.';
$string['externalurl'] = 'URL externa';
$string['framesize'] = 'Altura do frame';
$string['indicator:cognitivedepth'] = 'Indicador cognitivo da URL';
$string['indicator:cognitivedepth_help'] = 'Este indicador é baseado na profundidade cognitiva alcançada pelo estudante em um recurso URL.';
$string['indicator:cognitivedepthdef'] = 'URL cognitivo';
$string['indicator:cognitivedepthdef_help'] = 'O participante alcançou este percentual de engajamento cognitivo oferecido pelos recursos URL durante este intervalo de análise (Níveis = Sem visualização, Visualização)';
$string['indicator:cognitivedepthdef_link'] = 'Indicadores_de_Análise_de_Aprendizagem#Profundidade_Cognitiva';
$string['indicator:socialbreadth'] = 'Indicador social da URL';
$string['indicator:socialbreadth_help'] = 'Este indicador baseia-se no engajamento social alcançado pelo estudante em um recurso URL.';
$string['indicator:socialbreadthdef'] = 'URL social';
$string['indicator:socialbreadthdef_help'] = 'O participante alcançou este percentual de engajamento social oferecido pelos recursos URL durante este intervalo de análise (Níveis = Sem participação, Participante único)';
$string['indicator:socialbreadthdef_link'] = 'Indicadores_de_Análise_de_Aprendizagem#Engajamento_Social';
$string['invalidstoredurl'] = 'Impossível mostrar este recurso pois a URL é inválida.';
$string['invalidurl'] = 'A URL inserida é inválida';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'O módulo de URL permite que um professor para fornecer um link de web como um recurso do curso.
Qualquer coisa que esteja livremente disponível on-line, como documentos ou imagens, pode ser vinculada; URL não tem que ser a home page de um site. URL de uma página web em particular pode ser copiado e colado ou um professor pode usar o seletor de arquivo e escolher um link de um repositório, como Flickr, YouTube ou Wikipédia (dependendo de qual repositórios estão habilitados para o site).

Há uma série de opções de exibição para URL, como incorporado ou aberto em uma nova janela e opções avançadas para transmitir informações, como o nome de um estudante para URL, se necessário.

Observe que URLs também podem ser adicionados a qualquer outro tipo de recurso ou atividade através do editor de texto.';
$string['modulename_link'] = 'mod/url/view';
$string['modulenameplural'] = 'URLs';
$string['name'] = 'Nome';
$string['name_help'] = 'Isso servirá como texto do link para o URL.

Insira um texto significativo que descreva concisamente a finalidade do URL.

Evite usar a palavra "link". Isso ajudará os usuários de leitores de tela, pois os leitores de tela anunciam links (por exemplo, "Moodle.org, link"), portanto, não há necessidade de incluir a palavra "link" no campo do nome.';
$string['page-mod-url-x'] = 'Qualquer URl do módulo página';
$string['parameterinfo'] = '&amp;parâmetro=variável';
$string['parametersheader'] = 'Variáveis de URL';
$string['parametersheader_help'] = 'Esta seção permite que você passe informações internas como parte da URL. Isso é útil se a URL for uma página da Web interativa que recebe parâmetros e você deseja passar algo como o nome do usuário atual, por exemplo. Insira o nome do parâmetro do URL na caixa de texto e selecione a variável de site correspondente.';
$string['pluginadministration'] = 'Módulo de administração de URL';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'Altura da janela pop-up (em pixels)';
$string['popupheightexplain'] = 'Especifica a altura padrão de janelas pop-up.';
$string['popupwidth'] = 'Largura da janela pop-up (em pixels)';
$string['popupwidthexplain'] = 'Especifica a largura padrão de janelas pop-up.';
$string['printintro'] = 'Exibir descrição da URL';
$string['printintroexplain'] = 'Exibir a descrição da URL abaixo de conteúdo? Alguns tipos de exibição podem não exibir a descrição, mesmo se estiverem habilitados.';
$string['privacy:metadata'] = 'O recurso URL não armazena nenhum dado pessoal.';
$string['rolesinparams'] = 'Nomes de papéis como variáveis de URL';
$string['search:activity'] = 'URL';
$string['serverurl'] = 'URL do servidor';
$string['url:addinstance'] = 'Adicionar novo recurso URL';
$string['url:view'] = 'Ver URL';