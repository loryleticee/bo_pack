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
class __TwigTemplate_f45c0f38e8046a65b2916124ac4f6dd4da355edda1041834c03332195a20a6af extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "admin/congres/document.html.twig", 1);
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
        $this->loadTemplate("/admin/congres/_navbar.html.twig", "admin/congres/document.html.twig", 10)->display($context);
        // line 11
        echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_create_document_in_congres", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 14)]), "html", null, true);
        echo "\"><button class=\"btn btn-primary mb-5 float-right\">Ajouter un document</button></a>
                <h3>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "name", [], "any", false, false, false, 15), "html", null, true);
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
        $context['_seq'] = twig_ensure_traversable(($context["documents"] ?? null));
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
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_edit_document", ["idCongres" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 46), "id" => twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 46)]), "html", null, true);
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
        return array (  191 => 55,  171 => 49,  165 => 46,  155 => 39,  152 => 38,  143 => 36,  139 => 35,  134 => 33,  130 => 32,  125 => 31,  122 => 30,  105 => 29,  88 => 15,  84 => 14,  79 => 11,  77 => 10,  74 => 9,  70 => 8,  64 => 6,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/congres/document.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/congres/document.html.twig");
    }
}
