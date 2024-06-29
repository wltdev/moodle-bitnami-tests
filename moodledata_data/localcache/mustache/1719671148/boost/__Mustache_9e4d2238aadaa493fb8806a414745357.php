<?php

class __Mustache_9e4d2238aadaa493fb8806a414745357 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('hasattempts');
        $buffer .= $this->section19d50501360690579aa6c72fba6abb2e($context, $indent, $value);

        return $buffer;
    }

    private function sectionD810dd2dc36c1dd728d249aab862e336(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'summaryofattempts, quiz';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'summaryofattempts, quiz';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF11b8117a92b45a7cc6b24ecc207f681(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{> mod_quiz/attempt_summary_information}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('mod_quiz/attempt_summary_information')) {
                    $buffer .= $partial->renderInternal($context, $indent . '            ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEa0f8301205e0eeb5a79dba627eaba45(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<li class="col pl-0 pr-2 mb-2">
    <div class="card h-100">
        <div class="card-header py-2 border-bottom-0">
            <h4 class="card-title my-0">{{name}}</h4>
        </div>
        {{#summarydata}}
            {{> mod_quiz/attempt_summary_information}}
        {{/summarydata}}
        <div class="card-body py-2">
            <div>{{{reviewlink}}}</div>
        </div>
    </div>
</li>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<li class="col pl-0 pr-2 mb-2">
';
                $buffer .= $indent . '    <div class="card h-100">
';
                $buffer .= $indent . '        <div class="card-header py-2 border-bottom-0">
';
                $buffer .= $indent . '            <h4 class="card-title my-0">';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h4>
';
                $buffer .= $indent . '        </div>
';
                $value = $context->find('summarydata');
                $buffer .= $this->sectionF11b8117a92b45a7cc6b24ecc207f681($context, $indent, $value);
                $buffer .= $indent . '        <div class="card-body py-2">
';
                $buffer .= $indent . '            <div>';
                $value = $this->resolveValue($context->find('reviewlink'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section19d50501360690579aa6c72fba6abb2e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<h3>{{# str}}summaryofattempts, quiz{{/str}}</h3>

<ul class="list-unstyled row row-cols-1 row-cols-md-2 no-gutters">

{{#attempts}}
<li class="col pl-0 pr-2 mb-2">
    <div class="card h-100">
        <div class="card-header py-2 border-bottom-0">
            <h4 class="card-title my-0">{{name}}</h4>
        </div>
        {{#summarydata}}
            {{> mod_quiz/attempt_summary_information}}
        {{/summarydata}}
        <div class="card-body py-2">
            <div>{{{reviewlink}}}</div>
        </div>
    </div>
</li>
{{/attempts}}

</ul>

';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<h3>';
                $value = $context->find('str');
                $buffer .= $this->sectionD810dd2dc36c1dd728d249aab862e336($context, $indent, $value);
                $buffer .= '</h3>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '<ul class="list-unstyled row row-cols-1 row-cols-md-2 no-gutters">
';
                $buffer .= $indent . '
';
                $value = $context->find('attempts');
                $buffer .= $this->sectionEa0f8301205e0eeb5a79dba627eaba45($context, $indent, $value);
                $buffer .= $indent . '
';
                $buffer .= $indent . '</ul>
';
                $buffer .= $indent . '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
