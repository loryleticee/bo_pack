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

/* /admin/_navbar.html.twig */
class __TwigTemplate_cee4fb4939c34c7bcc6cce872ee1df4b24deee568ee6455182d318bac9e6c46c extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/admin/_navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/admin/_navbar.html.twig"));

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
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_categorie");
        echo "\" class=\"cat ";
        echo (((0 === twig_compare(($context["route"] ?? null), "admin_categorie"))) ? ("active") : (""));
        echo "\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/cat.svg"), "html", null, true);
        echo ")\"  width=\"40\"></a>
    <a href=\"";
        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logout");
        echo "\" class=\"logout\" style=\"background-image: url(";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logout.svg"), "html", null, true);
        echo ");top: 280px;\"></a>

</nav>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "/admin/_navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 8,  64 => 7,  57 => 6,  55 => 5,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-md navbar-dark bg-dark fixed-left text-center\">
    <a href=\"{{ path('admin_home') }}\">
        <img class=\"mt-4\" src=\"{{ asset('img/logo-blanc.png') }}\" alt=\"\" width=\"68\">
    </a>
    {% set route =  app.request.get('_route') %}
    <a href=\"{{ path('admin_home') }}\" class=\"calendar_icon {{ route == 'admin_home' ? 'active': ''}}\"></a>
    <a href=\"{{ path('admin_categorie') }}\" class=\"cat {{ route == 'admin_categorie' ? 'active': ''}}\" style=\"background-image: url({{ asset('img/cat.svg') }})\"  width=\"40\"></a>
    <a href=\"{{ path('admin_logout') }}\" class=\"logout\" style=\"background-image: url({{ asset('img/logout.svg') }});top: 280px;\"></a>

</nav>

", "/admin/_navbar.html.twig", "C:\\wamp64\\www\\incyte\\httpdocs\\templates\\admin\\_navbar.html.twig");
    }
}
