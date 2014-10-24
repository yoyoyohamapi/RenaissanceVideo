<?php

/* VideoWebBundle:Layout:layout.html.twig */
class __TwigTemplate_fd8416911407adb6cfe31b87729d68f94ce661216fc4ff6462884866388a91a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t";
        // line 5
        $this->env->loadTemplate("VideoWebBundle:Layout:stylesheets.html.twig")->display($context);
        // line 6
        echo "\t\t";
        $this->env->loadTemplate("VideoWebBundle:Layout:scripts.html.twig")->display($context);
        // line 7
        echo "\t\t";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "\t</head>
\t<body>
\t\t";
        // line 11
        if (array_key_exists("no_top", $context)) {
            // line 12
            echo "\t\t";
        } else {
            // line 13
            echo "\t\t";
            $this->env->loadTemplate("VideoWebBundle:Layout:top.html.twig")->display($context);
            // line 14
            echo "\t\t";
        }
        // line 15
        echo "\t\t";
        if (array_key_exists("no_filebar", $context)) {
            // line 16
            echo "\t\t";
        } else {
            // line 17
            echo "\t\t";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("VideoWebBundle:File:upload"));
            echo "
\t\t";
        }
        // line 19
        echo "\t\t";
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "\t</body>
\t";
        // line 22
        $this->displayBlock('scripts', $context, $blocks);
        // line 24
        echo "</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "\t\t";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        echo "\t\t    
\t\t";
    }

    // line 22
    public function block_scripts($context, array $blocks = array())
    {
        // line 23
        echo "\t";
    }

    public function getTemplateName()
    {
        return "VideoWebBundle:Layout:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 23,  98 => 22,  91 => 19,  87 => 8,  84 => 7,  79 => 4,  75 => 24,  73 => 22,  70 => 21,  67 => 19,  61 => 17,  58 => 16,  55 => 15,  52 => 14,  49 => 13,  46 => 12,  44 => 11,  40 => 9,  37 => 7,  34 => 6,  32 => 5,  28 => 4,  23 => 1,  38 => 6,  35 => 5,  29 => 3,);
    }
}
