<?php

/* VideoWebBundle:Layout:file_bar.html.twig */
class __TwigTemplate_d19fa59e9cb7f30b89f503a1f2e17f7527b7206051cc19ee76b505ace6f9b79f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), 'form_start');
        echo "
<div style=\"color:blue\">";
        // line 2
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), "video"), 'label');
        echo "</div>
";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), "video"), 'widget');
        echo "
<div style=\"color:blue\">";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), "cover"), 'label');
        echo "</div>
";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), "cover"), 'widget');
        echo "
";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), "上传"), 'widget');
        echo "
";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), 'form_end');
    }

    public function getTemplateName()
    {
        return "VideoWebBundle:Layout:file_bar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  39 => 6,  35 => 5,  31 => 4,  27 => 3,  23 => 2,  19 => 1,);
    }
}
