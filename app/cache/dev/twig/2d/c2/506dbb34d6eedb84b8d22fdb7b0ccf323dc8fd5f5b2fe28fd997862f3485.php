<?php

/* VideoWebBundle:Play:index.html.twig */
class __TwigTemplate_2dc2506dbb34d6eedb84b8d22fdb7b0ccf323dc8fd5f5b2fe28fd997862f3485 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("VideoWebBundle:Layout:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "VideoWebBundle:Layout:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "VideoWebBundle:Play:index";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        if ((twig_length_filter($this->env, (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))) > 0)) {
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")));
            foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                // line 8
                echo "    ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "videoName"), "html", null, true);
                echo "
    ";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "videoUrl"), "html", null, true);
                echo "
    ";
                // line 10
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "videoUptime"), "Y-m-d H:i"), "html", null, true);
                echo "
    <a href=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("choice", array("video_id" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "id"))), "html", null, true);
                echo "\">添加到canvas</a>
    <br>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 15
            echo "暂无视频上传
";
        }
    }

    public function getTemplateName()
    {
        return "VideoWebBundle:Play:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 15,  57 => 11,  53 => 10,  49 => 9,  44 => 8,  40 => 7,  38 => 6,  35 => 5,  29 => 3,);
    }
}
