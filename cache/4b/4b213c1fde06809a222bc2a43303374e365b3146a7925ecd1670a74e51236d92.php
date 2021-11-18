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

/* fields/text.twig */
class __TwigTemplate_1f99e9b21077065e7a6657a9f1178462966ff737bb7421bda51dbd3bca971f1b extends Template
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
  type=\"text\"
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
/>

<p class=\"description\">";
        // line 10
        echo twig_escape_filter($this->env, ($context["desc"] ?? null), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "fields/text.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 10,  57 => 7,  53 => 6,  49 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<input
  type=\"text\"
  class=\"{{ size }}-text\"
  id=\"{{ name }}\"
  name=\"{{ name }}\"
  placeholder=\"{{ placeholder }}\"
  value=\"{{ value }}\"
/>

<p class=\"description\">{{ desc }}</p>
", "fields/text.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/fields/text.twig");
    }
}
