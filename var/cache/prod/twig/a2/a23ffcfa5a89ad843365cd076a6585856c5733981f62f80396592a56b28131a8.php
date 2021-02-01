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

/* admin/home.html.twig */
class __TwigTemplate_a267d9f7d662ac04610cfd23e430953358376a5bab1ed4dea6e9acbc1d11c273 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "admin/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Admin - Incyte";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
        // line 6
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("admin");
        echo "
";
    }

    // line 8
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "
    ";
        // line 10
        $this->loadTemplate("/admin/_navbar.html.twig", "admin/home.html.twig", 10)->display($context);
        // line 11
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <a href=\"";
        // line 14
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_create_congres");
        echo "\"><button class=\"btn btn-primary mb-5 text-right float-right\">Créer un congrès</button></a>
                <h3>Vos congrès</h3>
                <br>
                <table class=\"table bg-white shadow rounded-lg\">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["congres"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["congre"]) {
            // line 28
            echo "                        <tr>
                            <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["congre"], "name", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                            <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, twig_get_attribute($this->env, $this->source, $context["congre"], "startDate", [], "any", false, false, false, 30), "medium", "", null, "gregorian", "fr"), "html", null, true);
            echo "</td>
                            <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, twig_get_attribute($this->env, $this->source, $context["congre"], "endDate", [], "any", false, false, false, 31), "medium", "", null, "gregorian", "fr"), "html", null, true);
            echo "</td>
                            <td>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\"
                                           href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_user", ["id" => twig_get_attribute($this->env, $this->source, $context["congre"], "id", [], "any", false, false, false, 39)]), "html", null, true);
            echo "\">Contacts
                                        </a>
                                        <a class=\"dropdown-item\"
                                           href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_documents", ["id" => twig_get_attribute($this->env, $this->source, $context["congre"], "id", [], "any", false, false, false, 42)]), "html", null, true);
            echo "\">Documents
                                        </a>
                                        <a class=\"dropdown-item\"
                                           href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["congre"], "id", [], "any", false, false, false, 45)]), "html", null, true);
            echo "\">Configuration
                                        </a>
                                        ";
            // line 47
            echo twig_include($this->env, $context, "admin/congres/_delete_form.html.twig");
            echo "
                                    </div>
                                </div>
                            </td>
                        </tr>
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['congre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "admin/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 53,  156 => 47,  151 => 45,  145 => 42,  139 => 39,  128 => 31,  124 => 30,  120 => 29,  117 => 28,  100 => 27,  84 => 14,  79 => 11,  77 => 10,  74 => 9,  70 => 8,  64 => 6,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/home.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/home.html.twig");
    }
}
