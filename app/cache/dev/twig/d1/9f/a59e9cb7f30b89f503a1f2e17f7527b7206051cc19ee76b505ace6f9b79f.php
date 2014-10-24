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
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["upload_form"]) ? $context["upload_form"] : $this->getContext($context, "upload_form")), 'form');
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
        return array (  24 => 5,  19 => 1,  101 => 23,  98 => 22,  91 => 19,  87 => 8,  84 => 7,  79 => 4,  75 => 24,  73 => 22,  70 => 21,  67 => 19,  61 => 17,  58 => 16,  55 => 15,  52 => 14,  49 => 13,  46 => 12,  44 => 11,  40 => 9,  37 => 7,  34 => 6,  32 => 5,  28 => 4,  23 => 1,  38 => 6,  35 => 5,  29 => 7,);
    }
}
