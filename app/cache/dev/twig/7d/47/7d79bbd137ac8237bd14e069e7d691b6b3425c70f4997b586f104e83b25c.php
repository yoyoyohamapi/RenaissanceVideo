<?php

/* VideoWebBundle:Play:show.html.twig */
class __TwigTemplate_7d477d79bbd137ac8237bd14e069e7d691b6b3425c70f4997b586f104e83b25c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "VideoWebBundle:Play:show";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo " <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/css/lesson.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></link>
<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/css/jquery.mCustomScrollbar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></link>
<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/css/video-js.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"></link>
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "\t\t<div class=\"row clearfix\">
\t\t\t<!-- 课程播放部分 -->
\t\t\t<div class=\"col-md-11\" >
\t\t\t\t<div class=\"conPanel coursePanel\">
\t\t\t\t\t<video id=\"example_video_1\" class=\"video-js vjs-default-skin vjs-big-play-centered\"
\t\t\t\t\t  controls preload=\"auto\" width=\"100%\" height=\"100%\"
\t\t\t\t\t  poster=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/img/playbkg.png"), "html", null, true);
        echo "\"
\t\t\t\t\t  data-setup='{\"example_option\":true}'>
\t\t\t\t\t <!-- <source src=\"\" type='video/mp4' /> -->
\t\t\t\t\t <source src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/videoweb/video/1.mp4"), "html", null, true);
        echo "\" type='video/mp4' />
\t\t\t\t\t</video>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
";
    }

    // line 25
    public function block_scripts($context, array $blocks = array())
    {
        // line 26
        echo "    
";
    }

    public function getTemplateName()
    {
        return "VideoWebBundle:Play:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 26,  82 => 25,  72 => 19,  66 => 16,  58 => 10,  55 => 9,  49 => 7,  45 => 6,  40 => 5,  37 => 4,  31 => 3,);
    }
}
