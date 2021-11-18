<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* fields/color.twig */
class __TwigTemplate_1c39c465ec5951bfbb4843e999ffa8c5f3d91a2530d1edf8218a178fda0c7d38 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<input type=\"text\" class=\"";
        echo twig_escape_filter($this->env, ($context["size"] ?? null), "html", null, true);
        echo "-text js-dits-color-input\" id=\"";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\"
       data-default-color=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["std"] ?? null), "html", null, true);
        echo "\"/>
";
    }

    public function getTemplateName()
    {
        return "fields/color.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fields/color.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/fields/color.twig");
    }
}
