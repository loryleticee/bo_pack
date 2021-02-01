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

/* admin/congres/_navbar.html.twig */
class __TwigTemplate_1efebb6d9718c217e71b63edc23f4e56adc3d323f2271221622ef6e8012420e6 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/congres/_navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/congres/_navbar.html.twig"));

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
        $context["route"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 5, $this->source); })()), "request", [], "any", false, false, false, 5), "get", [0 => "_route"], "method", false, false, false, 5);
        // line 6
        echo "    <a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_home");
        echo "\" class=\"calendar_icon ";
        echo (((0 === twig_compare((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 6, $this->source); })()), "admin_home"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_user", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7)]), "html", null, true);
        echo "\" class=\"contact ";
        echo (((0 === twig_compare((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 7, $this->source); })()), "admin_congres_user"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_documents", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8)]), "html", null, true);
        echo "\" class=\"documents ";
        echo (((0 === twig_compare((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 8, $this->source); })()), "admin_congres_documents"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 9, $this->source); })()), "id", [], "any", false, false, false, 9)]), "html", null, true);
        echo "\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/settings.svg"), "html", null, true);
        echo ")\" class=\"config ";
        echo (((0 === twig_compare((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 9, $this->source); })()), "admin_congres_edit"))) ? ("active") : (""));
        echo "\"></a>
    <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logout");
        echo "\" class=\"logout\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logout.svg"), "html", null, true);
        echo ")\"></a>
</nav>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/congres/_navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 10,  76 => 9,  70 => 8,  64 => 7,  57 => 6,  55 => 5,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-md navbar-dark bg-dark fixed-left text-center\">
    <a href=\"{{ path('admin_home') }}\">
        <img class=\"mt-4\" src=\"{{ asset('img/logo-blanc.png') }}\" alt=\"\" width=\"68\">
    </a>
    {% set route =  app.request.get('_route') %}
    <a href=\"{{ path('admin_home') }}\" class=\"calendar_icon {{ route == 'admin_home' ? 'active': ''}}\"></a>
    <a href=\"{{ path('admin_congres_user', {id: congres.id}) }}\" class=\"contact {{ route == 'admin_congres_user' ? 'active': ''}}\"></a>
    <a href=\"{{ path('admin_congres_documents', {id: congres.id}) }}\" class=\"documents {{ route == 'admin_congres_documents' ? 'active': ''}}\"></a>
    <a href=\"{{ path('admin_congres_edit', {id: congres.id}) }}\" style=\"background-image: url({{ asset('img/settings.svg') }})\" class=\"config {{ route == 'admin_congres_edit' ? 'active': ''}}\"></a>
    <a href=\"{{ path('admin_logout') }}\" class=\"logout\" style=\"background-image: url({{ asset('img/logout.svg') }})\"></a>
</nav>

", "admin/congres/_navbar.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/congres/_navbar.html.twig");
    }
}
