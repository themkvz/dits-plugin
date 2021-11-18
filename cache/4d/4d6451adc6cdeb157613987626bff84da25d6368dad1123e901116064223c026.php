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

/* admin/page.twig */
class __TwigTemplate_b98082ac6e4fd8f9fd259a6b53063372b83c8e8cd4841d6ff0ef09799ce30366 extends Template
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
        echo "<div class=\"wrap\">
  <h1>";
        // line 2
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h1>
  ";
        // line 3
        echo ($context["navigation"] ?? null);
        echo "
  ";
        // line 4
        echo ($context["forms"] ?? null);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/page.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/admin/page.twig");
    }
}
