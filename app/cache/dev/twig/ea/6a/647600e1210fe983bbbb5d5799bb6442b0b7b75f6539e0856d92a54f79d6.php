<?php

/* VideoWebBundle:Layout:stylesheets.html.twig */
class __TwigTemplate_ea6a647600e1210fe983bbbb5d5799bb6442b0b7b75f6539e0856d92a54f79d6 extends Twig_Template
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
        // line 3
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/lib/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\">
";
        // line 5
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/lib/font-awesome-4.1.0/css/font-awesome.min.css"), "html", null, true);
        echo "\">";
    }

    public function getTemplateName()
    {
        return "VideoWebBundle:Layout:stylesheets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 5,  19 => 3,  101 => 23,  98 => 22,  91 => 19,  87 => 8,  84 => 7,  79 => 4,  75 => 24,  73 => 22,  70 => 21,  61 => 17,  58 => 16,  55 => 15,  52 => 14,  46 => 12,  37 => 7,  34 => 6,  32 => 5,  28 => 4,  23 => 1,  67 => 19,  57 => 11,  53 => 10,  49 => 13,  44 => 11,  40 => 9,  38 => 6,  35 => 5,  29 => 3,);
    }
}
