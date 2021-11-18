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

/* fields/image.twig */
class __TwigTemplate_0410ffb83d020eb5b3f24ef94e1308107f4844a4a0bbcd95ba33790e01c0f0f0 extends Template
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
        echo "<img id=\"";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "_preview\" src=\"";
        echo twig_escape_filter($this->env, ($context["src"] ?? null), "html", null, true);
        echo "\"/>
<br>

<input
  type=\"button\"
  class=\"js-dits-image-upload button\"
  id=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "_button\"
  data-uploader_title=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["text"] ?? null), "uploader_title", [], "any", false, false, false, 8), "html", null, true);
        echo "\"
  data-uploader_button_text=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["text"] ?? null), "uploader_button", [], "any", false, false, false, 9), "html", null, true);
        echo "\"
  value=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["text"] ?? null), "select", [], "any", false, false, false, 10), "html", null, true);
        echo "\"
/>

<input
  type=\"button\"
  class=\"js-dits-image-remove button\"
  id=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "_delete\"
  value=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["text"] ?? null), "clear", [], "any", false, false, false, 17), "html", null, true);
        echo "\"
/>

<input
  type=\"hidden\"
  class=\"js-dits-image-data\"
  id=\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"
  name=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"
  value=\"";
        // line 25
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\"
/>
";
    }

    public function getTemplateName()
    {
        return "fields/image.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 25,  87 => 24,  83 => 23,  74 => 17,  70 => 16,  61 => 10,  57 => 9,  53 => 8,  49 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "fields/image.twig", "/Users/themkvz/Local Sites/plugins/app/public/wp-content/plugins/dits-plugin/templates/fields/image.twig");
    }
}
