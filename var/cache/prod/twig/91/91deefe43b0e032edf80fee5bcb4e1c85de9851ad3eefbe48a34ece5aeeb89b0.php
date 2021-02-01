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
class __TwigTemplate_f51e52e8d9f25a793c1824fd273b554d07eb398f93f73d77daea1fe4d7db880c extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "admin/categories/categories.html.twig", 1);
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
        $this->loadTemplate("/admin/_navbar.html.twig", "admin/categories/categories.html.twig", 10)->display($context);
        // line 11
        echo "    <div class=\"container\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "sucess"], "method", false, false, false, 12));
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
        $context['_seq'] = twig_ensure_traversable(($context["catUsers"] ?? null));
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
        $context['_seq'] = twig_ensure_traversable(($context["catDocs"] ?? null));
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
        $context['_seq'] = twig_ensure_traversable(($context["reasons"] ?? null));
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
        return array (  326 => 116,  306 => 110,  300 => 107,  289 => 99,  286 => 98,  269 => 97,  256 => 87,  248 => 81,  228 => 75,  222 => 72,  211 => 64,  208 => 63,  191 => 62,  178 => 52,  172 => 48,  152 => 42,  146 => 39,  135 => 31,  132 => 30,  115 => 29,  102 => 19,  98 => 17,  89 => 14,  86 => 13,  82 => 12,  79 => 11,  77 => 10,  74 => 9,  70 => 8,  64 => 6,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/categories/categories.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/categories/categories.html.twig");
    }
}
