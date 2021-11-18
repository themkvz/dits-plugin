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

/* admin/forms.twig */
class __TwigTemplate_9ace0a8c5cb17d34c156b17215676196bef5ae4e6f1ccbf6e2cda0ed622bd87d extends Template
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
        echo "<div class=\"metabox-holder\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sections"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 3
            echo "    <div id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["section"], "id", [], "any", false, false, false, 3), "html", null, true);
            echo "\" class=\"js-dits-section\" style=\"display: none;\">

      ";
            // line 5
            if (twig_get_attribute($this->env, $this->source, $context["section"], "callback", [], "any", false, false, false, 5)) {
                // line 6
                echo "        ";
                echo twig_get_attribute($this->env, $this->source, $context["section"], "do_settings_sections", [], "any", false, false, false, 6);
                echo "
      ";
            } else {
                // line 8
                echo "        <form method=\"post\" action=\"options.php\">
          ";
                // line 9
                echo twig_get_attribute($this->env, $this->source, $context["section"], "settings_fields", [], "any", false, false, false, 9);
                echo "
          ";
                // line 10
                echo twig_get_attribute($this->env, $this->source, $context["section"], "do_settings_sections", [], "any", false, false, false, 10);
                echo "
          ";
                // line 11
                echo twig_get_attribute($this->env, $this->source, $context["section"], "submit", [], "any", false, false, false, 11);
                echo "
        </form>
      ";
            }
            // line 14
            echo "
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/forms.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 17,  75 => 14,  69 => 11,  65 => 10,  61 => 9,  58 => 8,  52 => 6,  50 => 5,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/forms.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/admin/forms.twig");
    }
}
