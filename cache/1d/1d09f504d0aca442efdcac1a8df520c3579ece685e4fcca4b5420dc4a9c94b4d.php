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

/* fields/multicheck.twig */
class __TwigTemplate_18ea4e112733dcb5da25f90e924f552c98ec5b56ef0576ffaf0ab6ff0e68fadd extends Template
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
  <input type=\"hidden\" name=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" value=\"\"/>
  ";
        // line 3
        echo twig_var_dump($this->env, $context, ...[0 => ($context["options"] ?? null)]);
        echo "
  ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["option"]) {
            // line 5
            echo "    <p>
      <label for=\"%1\$s[%2\$s][%3\$s]\">
        <input type=\"checkbox\" class=\"checkbox\" id=\"%1\$s[%2\$s][%3\$s]\" name=\"%1\$s[%2\$s][%3\$s]\" value=\"";
            // line 7
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" %4\$s/>
        ";
            // line 8
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "
      </label>
    </p>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "
  <p class=\"description\">";
        // line 13
        echo twig_escape_filter($this->env, ($context["desc"] ?? null), "html", null, true);
        echo "</p>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "fields/multicheck.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  70 => 12,  60 => 8,  56 => 7,  52 => 5,  48 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<fieldset>
  <input type=\"hidden\" name=\"{{ name }}\" value=\"\"/>
  {{ dump(options) }}
  {% for key, option in options %}
    <p>
      <label for=\"%1\$s[%2\$s][%3\$s]\">
        <input type=\"checkbox\" class=\"checkbox\" id=\"%1\$s[%2\$s][%3\$s]\" name=\"%1\$s[%2\$s][%3\$s]\" value=\"{{ key }}\" %4\$s/>
        {{ option }}
      </label>
    </p>
  {% endfor %}

  <p class=\"description\">{{ desc }}</p>
</fieldset>
", "fields/multicheck.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/fields/multicheck.twig");
    }
}
