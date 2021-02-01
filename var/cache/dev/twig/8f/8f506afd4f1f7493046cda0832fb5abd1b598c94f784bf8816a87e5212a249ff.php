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

/* admin/congres/document.html.twig */
class __TwigTemplate_f93235cebd21b52fea3e13bb63e1cc59b141afa2be159dc4444686b2c44a676b extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/congres/document.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/congres/document.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/congres/document.html.twig", 1);
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
        $this->loadTemplate("/admin/congres/_navbar.html.twig", "admin/congres/document.html.twig", 10)->display($context);
        // line 11
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_create_document_in_congres", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 14, $this->source); })()), "id", [], "any", false, false, false, 14)]), "html", null, true);
        echo "\"><button class=\"btn btn-primary mb-5 float-right\">Ajouter un document</button></a>
                <h3>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 15, $this->source); })()), "name", [], "any", false, false, false, 15), "html", null, true);
        echo " - Documents</h3>
                <br>
                <table class=\"table bg-white shadow rounded-lg\">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom du document</th>
                            <th>Descriptif</th>
                            <th>Catégorie</th>
                            <th>Stats</th>
                            <th style=\"text-align:center\">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["documents"]) || array_key_exists("documents", $context) ? $context["documents"] : (function () { throw new RuntimeError('Variable "documents" does not exist.', 29, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 30
            echo "                        <tr>
                            <td><img src=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/document/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "img", [], "any", false, false, false, 31), "html", null, true);
            echo "\" class=\"img-circle\" width=\"100px\"></td>
                            <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                            <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "about", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                            <td>
                                ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["doc"], "categoryDocuments", [], "any", false, false, false, 35));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 36
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "name", [], "any", false, false, false, 36), "html", null, true);
                echo "
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "                            </td>
                            <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "numberDownload", [], "any", false, false, false, 39), "html", null, true);
            echo "</td>
                            <td align=\"center\">
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_edit_document", ["idCongres" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 46, $this->source); })()), "id", [], "any", false, false, false, 46), "id" => twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 46)]), "html", null, true);
            echo "\"
                                        >Editer
                                        </a>
                                        ";
            // line 49
            echo twig_include($this->env, $context, "admin/document/_delete_form.html.twig");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
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
        return "admin/congres/document.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  233 => 55,  213 => 49,  207 => 46,  197 => 39,  194 => 38,  185 => 36,  181 => 35,  176 => 33,  172 => 32,  167 => 31,  164 => 30,  147 => 29,  130 => 15,  126 => 14,  121 => 11,  119 => 10,  116 => 9,  106 => 8,  94 => 6,  89 => 5,  79 => 4,  60 => 3,  37 => 1,);
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

    {% include '/admin/congres/_navbar.html.twig' %}
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <a href=\"{{ path(\"admin_create_document_in_congres\", {id: congres.id}) }}\"><button class=\"btn btn-primary mb-5 float-right\">Ajouter un document</button></a>
                <h3>{{ congres.name }} - Documents</h3>
                <br>
                <table class=\"table bg-white shadow rounded-lg\">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom du document</th>
                            <th>Descriptif</th>
                            <th>Catégorie</th>
                            <th>Stats</th>
                            <th style=\"text-align:center\">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    {% for doc in documents %}
                        <tr>
                            <td><img src=\"{{ asset( 'uploads/img/document/' ) }}{{ doc.img }}\" class=\"img-circle\" width=\"100px\"></td>
                            <td>{{ doc.name }}</td>
                            <td>{{ doc.about }}</td>
                            <td>
                                {% for cat in doc.categoryDocuments %}
                                    {{ cat.name }}
                                {% endfor %}
                            </td>
                            <td>{{ doc.numberDownload }}</td>
                            <td align=\"center\">
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-sm  rounded-circle border\"  data-toggle=\"dropdown\">
                                        <i class=\"fas fa-ellipsis-h point\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\">
                                        <a class=\"dropdown-item\" href=\"{{ path('admin_edit_document',{idCongres: congres.id, id: doc.id}) }}\"
                                        >Editer
                                        </a>
                                        {{ include('admin/document/_delete_form.html.twig') }}
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

", "admin/congres/document.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/congres/document.html.twig");
    }
}
