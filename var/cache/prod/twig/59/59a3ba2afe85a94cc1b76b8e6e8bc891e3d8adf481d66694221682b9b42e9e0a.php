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

/* admin/congres/planningUser.html.twig */
class __TwigTemplate_897732d054eca155be7c0c36cfb4d5e887408af6dab211959c7af0c2923bdc0b extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $this->parent = $this->loadTemplate("base.html.twig", "admin/congres/planningUser.html.twig", 1);
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
    <style type=\"text/css\">
        label{
            width: 120px;
            font-weight: 500!important;
        }
        .meeting {
            background-color: #fff;
            color: rgb(52, 70, 126);
            border-color: rgb(52, 70, 126);
            border-width: 2px;
        }

        .checked {
            background-color: lightgray;
            color: #fff;
            border-color: lightgray;
            border-width: 2px;
        }
        .checked:hover{
            color: white;
        }

        input[type=\"checkbox\"] {
            display: none;
        }
    </style>
";
    }

    // line 34
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "
    ";
        // line 36
        $this->loadTemplate("/admin/congres/_navbar.html.twig", "admin/congres/planningUser.html.twig", 36)->display($context);
        // line 37
        echo "    <div class=\"container\">
        <h3 class=\"pb-4\"><a class=\"pr-3\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_user", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 38)]), "html", null, true);
        echo "\" >&#8249;</a>Agenda de ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "firstname", [], "any", false, false, false, 38), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "name", [], "any", false, false, false, 38), "html", null, true);
        echo "</h3>
        <div class=\"row bg-white shadow-lg p-3\">
            <div class=\"col-12\">
                <br>
                <form method=\"post\" action=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_planning_user", ["idCongres" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 42), "idUser" => twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 42)]), "html", null, true);
        echo "\">
                    ";
        // line 43
        $context["difference"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "endDate", [], "any", false, false, false, 43)), "diff", [0 => twig_date_converter($this->env, ($context["startDate"] ?? null))], "method", false, false, false, 43);
        // line 44
        echo "                    ";
        $context["leftDays"] = (twig_get_attribute($this->env, $this->source, ($context["difference"] ?? null), "days", [], "any", false, false, false, 44) + 1);
        // line 45
        echo "                    ";
        $context["date"] = ($context["startDate"] ?? null);
        // line 46
        echo "                    ";
        $context["firstDay"] = twig_date_format_filter($this->env, ($context["startDate"] ?? null), "d");
        // line 47
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($context["leftDays"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 48
            echo "                        <div class=\"text-capitalize pb-2 pt-5 font-weight-bolder\">
                            ";
            // line 49
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, ($context["date"] ?? null), "full", "", null, "gregorian", "fr"), "html", null, true);
            echo "
                        </div>
                        ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["meetings"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                // line 52
                echo "                            ";
                if ((0 === twig_compare(twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 52), "d"), twig_date_format_filter($this->env, ($context["date"] ?? null), "d")))) {
                    // line 53
                    echo "                                ";
                    if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isOpen", [], "any", false, false, false, 53), true)) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isReserved", [], "any", false, false, false, 53), false)))) {
                        // line 54
                        echo "                                    <label class=\"btn mb-3 meeting\" for=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 54), "html", null, true);
                        echo "\">
                                        <input type=\"checkbox\" id=\"";
                        // line 55
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 55), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 55), "html", null, true);
                        echo "\"
                                               value=\"";
                        // line 56
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 56), "html", null, true);
                        echo "\">
                                        ";
                        // line 57
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 57), "H:i"), "html", null, true);
                        echo "
                                    </label>
                                ";
                    } elseif (((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 59
$context["meeting"], "isOpen", [], "any", false, false, false, 59), false)) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isReserved", [], "any", false, false, false, 59), true)))) {
                        // line 60
                        echo "                                    <label class=\"btn mb-3 meeting checked\" style=\"background-color: indianred; border-color: indianred\" for=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 60), "html", null, true);
                        echo "\">
                                        <input type=\"checkbox\" id=\"";
                        // line 61
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 61), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 61), "html", null, true);
                        echo "\"
                                               value=\"";
                        // line 62
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 62), "html", null, true);
                        echo "\" disabled>
                                        ";
                        // line 63
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 63), "H:i"), "html", null, true);
                        echo "
                                    </label>
                                ";
                    } elseif (((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 65
$context["meeting"], "isOpen", [], "any", false, false, false, 65), false)) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isReserved", [], "any", false, false, false, 65), false)))) {
                        // line 66
                        echo "                                    <label class=\"btn mb-3 meeting checked\" for=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 66), "html", null, true);
                        echo "\" onclick=\"openMeeting(";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 66), "html", null, true);
                        echo ")\">
                                        <input type=\"checkbox\" id=\"";
                        // line 67
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 67), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 67), "html", null, true);
                        echo "\"
                                               value=\"";
                        // line 68
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 68), "html", null, true);
                        echo "\">
                                        ";
                        // line 69
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 69), "H:i"), "html", null, true);
                        echo "
                                    </label>
                                ";
                    }
                    // line 72
                    echo "                            ";
                }
                // line 73
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meeting'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "                        ";
            $context["date"] = twig_date_modify_filter($this->env, ($context["date"] ?? null), "+1 day");
            // line 75
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                    <br><br>
                    <input value=\"\" name=\"no\" type=\"hidden\">
                    <input type=\"submit\" class=\"btn btn-primary mb-5\" value=\"Enregistrer\">
                </form>
            </div>
        </div>
    </div>

";
    }

    // line 85
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 86
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        \$(\"document\").ready(function () {
            \$(\"input\").click(function () {
                if (\$(this).is(':checked')) {
                    \$(this).parent().addClass('checked');
                } else {
                    \$(this).parent().removeClass('checked');
                }

            })

        });
        function openMeeting(id) {
            \$.ajax({
                url: '";
        // line 101
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("open_meeting");
        echo "?meeting='+id,
                data: id,
                dataType: 'json'
            })
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "admin/congres/planningUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 101,  259 => 86,  255 => 85,  243 => 76,  237 => 75,  234 => 74,  228 => 73,  225 => 72,  219 => 69,  215 => 68,  209 => 67,  202 => 66,  200 => 65,  195 => 63,  191 => 62,  185 => 61,  180 => 60,  178 => 59,  173 => 57,  169 => 56,  163 => 55,  158 => 54,  155 => 53,  152 => 52,  148 => 51,  143 => 49,  140 => 48,  135 => 47,  132 => 46,  129 => 45,  126 => 44,  124 => 43,  120 => 42,  109 => 38,  106 => 37,  104 => 36,  101 => 35,  97 => 34,  65 => 6,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/congres/planningUser.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/congres/planningUser.html.twig");
    }
}
