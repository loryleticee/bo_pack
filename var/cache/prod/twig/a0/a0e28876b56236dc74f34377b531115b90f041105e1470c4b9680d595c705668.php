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

/* /admin/congres/_navbar.html.twig */
class __TwigTemplate_46da60606e91c66145b074decf95dd619ccda7aaf6feba72ba2ac8018b764a2b extends Template
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
        echo "<nav class=\"navbar navbar-expand-md navbar-dark bg-dark fixed-left text-center\">
    <a href=\"";
        // line 2
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_home");
        echo "\">
        <img class=\"mt-4\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-blanc.png"), "html", null, true);
        echo "\" alt=\"\" width=\"68\">
    </a>
    ";
        // line 5
        $context["route"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 5), "get", [0 => "_route"], "method", false, false, false, 5);
        // line 6
        echo "    <a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_home");
        echo "\" class=\"calendar_icon ";
        echo (((0 === twig_compare(($context["route"] ?? null), "admin_home"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_user", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 7)]), "html", null, true);
        echo "\" class=\"contact ";
        echo (((0 === twig_compare(($context["route"] ?? null), "admin_congres_user"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_documents", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 8)]), "html", null, true);
        echo "\" class=\"documents ";
        echo (((0 === twig_compare(($context["route"] ?? null), "admin_congres_documents"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 9)]), "html", null, true);
        echo "\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/settings.svg"), "html", null, true);
        echo ")\" class=\"config ";
        echo (((0 === twig_compare(($context["route"] ?? null), "admin_congres_edit"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logout");
        echo "\" class=\"logout\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logout.svg"), "html", null, true);
        echo ")\"></a>
</nav>

";
    }

    public function getTemplateName()
    {
        return "/admin/congres/_navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 10,  70 => 9,  64 => 8,  58 => 7,  51 => 6,  49 => 5,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/admin/congres/_navbar.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/congres/_navbar.html.twig");
    }
}
