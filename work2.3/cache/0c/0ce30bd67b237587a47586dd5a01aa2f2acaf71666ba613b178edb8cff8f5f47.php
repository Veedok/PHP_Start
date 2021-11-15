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

/* work2.html.twig */
class __TwigTemplate_a59e195812bf2ab7e3fdb03546da0f5c7f2235201b738706f1f9914ae45cbfd8 extends Template
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
        echo "<h1>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "imgName", [], "any", false, false, false, 1), "html", null, true);
        echo "</h1>
                <div class='item'>
                    <img class='product_img' src=";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "imgPath", [], "any", false, false, false, 3), "html", null, true);
        echo " alt='img'>
                    <p>";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "id", [], "any", false, false, false, 4), "html", null, true);
        echo "</p>
                </div>
            </a>
";
    }

    public function getTemplateName()
    {
        return "work2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "work2.html.twig", "C:\\OpenServer\\domains\\php\\PHP_Start\\work2.3\\templates\\work2.html.twig");
    }
}
