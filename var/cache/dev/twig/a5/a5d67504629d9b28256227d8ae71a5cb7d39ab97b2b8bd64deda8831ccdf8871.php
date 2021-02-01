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
class __TwigTemplate_aa0eb2cd9a49ed5cddf4bacbd1193ff6e7c411a107059785fc97df74724b288f extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/congres/planningUser.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/congres/planningUser.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/congres/planningUser.html.twig", 1);
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 34
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 35
        echo "
    ";
        // line 36
        $this->loadTemplate("/admin/congres/_navbar.html.twig", "admin/congres/planningUser.html.twig", 36)->display($context);
        // line 37
        echo "    <div class=\"container\">
        <h3 class=\"pb-4\"><a class=\"pr-3\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_congres_user", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 38, $this->source); })()), "id", [], "any", false, false, false, 38)]), "html", null, true);
        echo "\" >&#8249;</a>Agenda de ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 38, $this->source); })()), "firstname", [], "any", false, false, false, 38), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 38, $this->source); })()), "name", [], "any", false, false, false, 38), "html", null, true);
        echo "</h3>
        <div class=\"row bg-white shadow-lg p-3\">
            <div class=\"col-12\">
                <br>
                <form method=\"post\" action=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_planning_user", ["idCongres" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 42, $this->source); })()), "id", [], "any", false, false, false, 42), "idUser" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "id", [], "any", false, false, false, 42)]), "html", null, true);
        echo "\">
                    ";
        // line 43
        $context["difference"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 43, $this->source); })()), "endDate", [], "any", false, false, false, 43)), "diff", [0 => twig_date_converter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 43, $this->source); })()))], "method", false, false, false, 43);
        // line 44
        echo "                    ";
        $context["leftDays"] = (twig_get_attribute($this->env, $this->source, (isset($context["difference"]) || array_key_exists("difference", $context) ? $context["difference"] : (function () { throw new RuntimeError('Variable "difference" does not exist.', 44, $this->source); })()), "days", [], "any", false, false, false, 44) + 1);
        // line 45
        echo "                    ";
        $context["date"] = (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 45, $this->source); })());
        // line 46
        echo "                    ";
        $context["firstDay"] = twig_date_format_filter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 46, $this->source); })()), "d");
        // line 47
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["leftDays"]) || array_key_exists("leftDays", $context) ? $context["leftDays"] : (function () { throw new RuntimeError('Variable "leftDays" does not exist.', 47, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 48
            echo "                        <div class=\"text-capitalize pb-2 pt-5 font-weight-bolder\">
                            ";
            // line 49
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 49, $this->source); })()), "full", "", null, "gregorian", "fr"), "html", null, true);
            echo "
                        </div>
                        ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["meetings"]) || array_key_exists("meetings", $context) ? $context["meetings"] : (function () { throw new RuntimeError('Variable "meetings" does not exist.', 51, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                // line 52
                echo "                            ";
                if ((0 === twig_compare(twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 52), "d"), twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 52, $this->source); })()), "d")))) {
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
            $context["date"] = twig_date_modify_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 74, $this->source); })()), "+1 day");
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 85
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

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
        return array (  332 => 101,  313 => 86,  303 => 85,  285 => 76,  279 => 75,  276 => 74,  270 => 73,  267 => 72,  261 => 69,  257 => 68,  251 => 67,  244 => 66,  242 => 65,  237 => 63,  233 => 62,  227 => 61,  222 => 60,  220 => 59,  215 => 57,  211 => 56,  205 => 55,  200 => 54,  197 => 53,  194 => 52,  190 => 51,  185 => 49,  182 => 48,  177 => 47,  174 => 46,  171 => 45,  168 => 44,  166 => 43,  162 => 42,  151 => 38,  148 => 37,  146 => 36,  143 => 35,  133 => 34,  95 => 6,  90 => 5,  80 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - Incyte{% endblock %}
{% block stylesheets %}
    {{ parent() }}
    {{ encore_entry_link_tags('admin') }}
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
{% endblock %}
{% block body %}

    {% include '/admin/congres/_navbar.html.twig' %}
    <div class=\"container\">
        <h3 class=\"pb-4\"><a class=\"pr-3\" href=\"{{ path('admin_congres_user', {id: congres.id}) }}\" >&#8249;</a>Agenda de {{ user.firstname }} - {{ congres.name }}</h3>
        <div class=\"row bg-white shadow-lg p-3\">
            <div class=\"col-12\">
                <br>
                <form method=\"post\" action=\"{{ path('admin_planning_user', {idCongres: congres.id, idUser: user.id}) }}\">
                    {% set difference = date(congres.endDate).diff(date(startDate)) %}
                    {% set leftDays = difference.days + 1 %}
                    {% set date = startDate %}
                    {% set firstDay = startDate|date('d') %}
                    {% for i in 1..leftDays %}
                        <div class=\"text-capitalize pb-2 pt-5 font-weight-bolder\">
                            {{ date|format_date('full', locale='fr') }}
                        </div>
                        {% for meeting in meetings %}
                            {% if meeting.startDate|date('d') == date|date('d') %}
                                {% if meeting.isOpen == true and meeting.isReserved == false %}
                                    <label class=\"btn mb-3 meeting\" for=\"{{ meeting.id }}\">
                                        <input type=\"checkbox\" id=\"{{ meeting.id }}\" name=\"{{ meeting.id }}\"
                                               value=\"{{ meeting.id }}\">
                                        {{ meeting.startDate|date('H:i') }}
                                    </label>
                                {% elseif meeting.isOpen == false and meeting.isReserved == true %}
                                    <label class=\"btn mb-3 meeting checked\" style=\"background-color: indianred; border-color: indianred\" for=\"{{ meeting.id }}\">
                                        <input type=\"checkbox\" id=\"{{ meeting.id }}\" name=\"{{ meeting.id }}\"
                                               value=\"{{ meeting.id }}\" disabled>
                                        {{ meeting.startDate|date('H:i') }}
                                    </label>
                                {% elseif meeting.isOpen == false and meeting.isReserved == false %}
                                    <label class=\"btn mb-3 meeting checked\" for=\"{{ meeting.id }}\" onclick=\"openMeeting({{ meeting.id }})\">
                                        <input type=\"checkbox\" id=\"{{ meeting.id }}\" name=\"{{ meeting.id }}\"
                                               value=\"{{ meeting.id }}\">
                                        {{ meeting.startDate|date('H:i') }}
                                    </label>
                                {% endif %}
                            {% endif %}
                        {% endfor %}
                        {% set date = date|date_modify(\"+1 day\") %}
                    {% endfor %}
                    <br><br>
                    <input value=\"\" name=\"no\" type=\"hidden\">
                    <input type=\"submit\" class=\"btn btn-primary mb-5\" value=\"Enregistrer\">
                </form>
            </div>
        </div>
    </div>

{% endblock %}
{% block javascripts %}
    {{ parent() }}
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
                url: '{{ path('open_meeting') }}?meeting='+id,
                data: id,
                dataType: 'json'
            })
        }
    </script>
{% endblock %}

", "admin/congres/planningUser.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/congres/planningUser.html.twig");
    }
}
