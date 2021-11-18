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

/* fields/checkbox.twig */
class __TwigTemplate_cd37f8a7b6cab2117bd2383ad7b7a73453abab88bf2ea5fa4ceb0296c87bd584 extends Template
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
        echo "<fieldset>
  <label for=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" value=\"off\">
    <input type=\"checkbox\" class=\"checkbox\" id=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" value=\"on\" ";
        echo ($context["checked"] ?? null);
        echo ">
    ";
        // line 5
        echo twig_escape_filter($this->env, ($context["desc"] ?? null), "html", null, true);
        echo "
  </label>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "fields/checkbox.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 5,  48 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<fieldset>
  <label for=\"{{ name }}\">
    <input type=\"hidden\" name=\"{{ name }}\" value=\"off\">
    <input type=\"checkbox\" class=\"checkbox\" id=\"{{ name }}\" name=\"{{ name }}\" value=\"on\" {{ checked|raw }}>
    {{ desc }}
  </label>
</fieldset>
", "fields/checkbox.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/fields/checkbox.twig");
    }
}
