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

/* fields/number.twig */
class __TwigTemplate_4116da674c153a2958dea93c2668b2aef57859942d8efd53dffe15014e0a6dc9 extends Template
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
        echo "<input
  type=\"number\"
  class=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["size"] ?? null), "html", null, true);
        echo "-text\"
  id=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"
  name=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"
  placeholder=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
        echo "\"
  value=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\"
  min=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["min"] ?? null), "html", null, true);
        echo "\"
  max=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["max"] ?? null), "html", null, true);
        echo "\"
  step=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["step"] ?? null), "html", null, true);
        echo "\"
/>

<p class=\"description\">";
        // line 13
        echo twig_escape_filter($this->env, ($context["desc"] ?? null), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "fields/number.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 13,  69 => 10,  65 => 9,  61 => 8,  57 => 7,  53 => 6,  49 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<input
  type=\"number\"
  class=\"{{ size }}-text\"
  id=\"{{ name }}\"
  name=\"{{ name }}\"
  placeholder=\"{{ placeholder }}\"
  value=\"{{ value }}\"
  min=\"{{ min }}\"
  max=\"{{ max }}\"
  step=\"{{ step }}\"
/>

<p class=\"description\">{{ desc }}</p>
", "fields/number.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/fields/number.twig");
    }
}
