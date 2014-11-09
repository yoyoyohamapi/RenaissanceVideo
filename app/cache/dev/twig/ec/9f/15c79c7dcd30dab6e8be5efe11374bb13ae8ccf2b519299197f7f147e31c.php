<?php

/* VideoWebBundle:Layout:scripts.html.twig */
class __TwigTemplate_ec9f15c79c7dcd30dab6e8be5efe11374bb13ae8ccf2b519299197f7f147e31c extends Twig_Template
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
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/js/jquery-1.11.1.min.js"), "html", null, true);
        echo "\"></script>
";
        // line 5
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/lib/bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
";
        // line 7
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/js/base.js"), "html", null, true);
        echo "\"></script>\t\t\t";
    }

    public function getTemplateName()
    {
        return "VideoWebBundle:Layout:scripts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 5,  19 => 3,  101 => 23,  98 => 22,  91 => 19,  87 => 8,  84 => 7,  79 => 4,  75 => 24,  73 => 22,  70 => 21,  61 => 17,  58 => 16,  55 => 15,  52 => 14,  46 => 12,  37 => 7,  34 => 6,  32 => 5,  28 => 4,  23 => 1,  71 => 17,  67 => 19,  57 => 11,  53 => 10,  49 => 13,  44 => 11,  40 => 9,  38 => 6,  35 => 5,  29 => 7,);
    }
}
