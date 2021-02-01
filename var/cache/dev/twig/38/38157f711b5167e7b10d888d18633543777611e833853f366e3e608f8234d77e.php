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

/* admin/categories/categories.html.twig */
class __TwigTemplate_485a32e123d87e946c921a79fcb8b84476b5550a63e65d67cf130b278b8c7904 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/categories.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/categories/categories.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/categories/categories.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Admin - Incyte";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
        // line 6
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("admin");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        echo "
    ";
        // line 10
        $this->loadTemplate("/admin/_navbar.html.twig", "admin/categories/categories.html.twig", 10)->display($context);
        // line 11
        echo "    <div class=\"container\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", [0 => "sucess"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 13
            echo "            <div class=\"alert alert-success\">
                ";
            // line 14
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "        <div class=\"row\">
            <div class=\"col-6\">
                <a href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_create_catUser");
        echo "\"><button class=\"btn btn-primary mb-4 float-right\">Ajouter une catégorie contact</button></a>
                <h3>Catégories contact</h3>
                <table class=\"table bg-white shadow-lg rounded-lg\">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["catUsers"]) || array_key_exists("catUsers", $context) ? $context["catUsers"] : (function () { throw new RuntimeError('Variable "catUsers" does not exist.', 29, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["catUser"]) {
            // line 30
            echo "                        <tr>
                            <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catUser"], "name", [], "any", false, false, false, 31), "html", null, true);
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
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_catUser_reason", ["id" => twig_get_attribute($this->env, $this->source, $context["catUser"], "id", [], "any", false, false, false, 39)]), "html", null, true);
            echo "\"
                                        >Editer
                                        </a>
                                        ";
            // line 42
            echo twig_include($this->env, $context, "admin/categories/_delete_formCatUser.html.twig");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['catUser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "                    </tbody>
                </table>
            </div>
            <div class=\"col-6\">
                <a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_create_catDoc");
        echo "\"><button class=\"btn btn-primary mb-4 float-right\">Ajouter une catégorie document</button></a>
                <h3>Catégorie document</h3>
                <table class=\"table bg-white shadow-lg rounded-lg\">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["catDocs"]) || array_key_exists("catDocs", $context) ? $context["catDocs"] : (function () { throw new RuntimeError('Variable "catDocs" does not exist.', 62, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["catDoc"]) {
            // line 63
            echo "                        <tr>
                            <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["catDoc"], "name", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                            <td>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\"
                                           href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_catDoc_reason", ["id" => twig_get_attribute($this->env, $this->source, $context["catDoc"], "id", [], "any", false, false, false, 72)]), "html", null, true);
            echo "\"
                                        >Editer
                                        </a>
                                    ";
            // line 75
            echo twig_include($this->env, $context, "admin/categories/_delete_formCatDoc.html.twig");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['catDoc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "                    </tbody>
                </table>
            </div>
        </div>
        <div class=\"row pt-5\">
            <div class=\"col-12\">
                <a href=\"";
        // line 87
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_create_reason");
        echo "\"><button class=\"btn btn-primary mb-4 float-right\">Ajouter un motif</button></a>
                <h3>Motif de rendez-vous</h3>
                <table class=\"table bg-white shadow-lg rounded-lg\">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reasons"]) || array_key_exists("reasons", $context) ? $context["reasons"] : (function () { throw new RuntimeError('Variable "reasons" does not exist.', 97, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
            // line 98
            echo "                        <tr>
                            <td>";
            // line 99
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "name", [], "any", false, false, false, 99), "html", null, true);
            echo "</td>
                            <td>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\"
                                           href=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_edit_reason", ["id" => twig_get_attribute($this->env, $this->source, $context["reason"], "id", [], "any", false, false, false, 107)]), "html", null, true);
            echo "\"
                                        >Editer
                                        </a>
                                        ";
            // line 110
            echo twig_include($this->env, $context, "admin/categories/_delete_formReason.html.twig");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "admin/categories/categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  368 => 116,  348 => 110,  342 => 107,  331 => 99,  328 => 98,  311 => 97,  298 => 87,  290 => 81,  270 => 75,  264 => 72,  253 => 64,  250 => 63,  233 => 62,  220 => 52,  214 => 48,  194 => 42,  188 => 39,  177 => 31,  174 => 30,  157 => 29,  144 => 19,  140 => 17,  131 => 14,  128 => 13,  124 => 12,  121 => 11,  119 => 10,  116 => 9,  106 => 8,  94 => 6,  89 => 5,  79 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - Incyte{% endblock %}
{% block stylesheets %}
    {{ parent() }}
    {{ encore_entry_link_tags('admin') }}
{% endblock %}
{% block body %}

    {% include '/admin/_navbar.html.twig' %}
    <div class=\"container\">
        {% for message in app.flashes('sucess') %}
            <div class=\"alert alert-success\">
                {{ message }}
            </div>
        {% endfor %}
        <div class=\"row\">
            <div class=\"col-6\">
                <a href=\"{{ path('admin_create_catUser') }}\"><button class=\"btn btn-primary mb-4 float-right\">Ajouter une catégorie contact</button></a>
                <h3>Catégories contact</h3>
                <table class=\"table bg-white shadow-lg rounded-lg\">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    {% for catUser in catUsers %}
                        <tr>
                            <td>{{ catUser.name }}</td>
                            <td>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\"
                                           href=\"{{ path('admin_catUser_reason', {id: catUser.id}) }}\"
                                        >Editer
                                        </a>
                                        {{ include('admin/categories/_delete_formCatUser.html.twig') }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
            <div class=\"col-6\">
                <a href=\"{{ path('admin_create_catDoc') }}\"><button class=\"btn btn-primary mb-4 float-right\">Ajouter une catégorie document</button></a>
                <h3>Catégorie document</h3>
                <table class=\"table bg-white shadow-lg rounded-lg\">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for catDoc in catDocs %}
                        <tr>
                            <td>{{ catDoc.name }}</td>
                            <td>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\"
                                           href=\"{{ path('admin_catDoc_reason', {id: catDoc.id}) }}\"
                                        >Editer
                                        </a>
                                    {{ include('admin/categories/_delete_formCatDoc.html.twig') }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
        <div class=\"row pt-5\">
            <div class=\"col-12\">
                <a href=\"{{ path('admin_create_reason') }}\"><button class=\"btn btn-primary mb-4 float-right\">Ajouter un motif</button></a>
                <h3>Motif de rendez-vous</h3>
                <table class=\"table bg-white shadow-lg rounded-lg\">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for reason in reasons %}
                        <tr>
                            <td>{{ reason.name }}</td>
                            <td>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\"
                                           href=\"{{ path('admin_edit_reason', {id: reason.id}) }}\"
                                        >Editer
                                        </a>
                                        {{ include('admin/categories/_delete_formReason.html.twig') }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

{% endblock %}

", "admin/categories/categories.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/categories/categories.html.twig");
    }
}
