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

/* planning/planningUser.html.twig */
class __TwigTemplate_4f1e77a0ef128bb516474726296acbd29018f1891ab03be29f2ad8d2df792bb4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "planning/planningUser.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "planning/planningUser.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "planning/planningUser.html.twig", 1);
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
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "<header>
    <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
        <div class=\"wrapper\" style=\"width: 100%;\">
            <div id=\"month\">
                ";
        // line 10
        echo "                ";
        $context["difference"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 10, $this->source); })()), "endDate", [], "any", false, false, false, 10)), "diff", [0 => twig_date_converter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 10, $this->source); })()))], "method", false, false, false, 10);
        // line 11
        echo "                ";
        $context["leftDays"] = (twig_get_attribute($this->env, $this->source, (isset($context["difference"]) || array_key_exists("difference", $context) ? $context["difference"] : (function () { throw new RuntimeError('Variable "difference" does not exist.', 11, $this->source); })()), "days", [], "any", false, false, false, 11) + 1);
        // line 12
        echo "                ";
        $context["date"] = (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 12, $this->source); })());
        // line 13
        echo "                ";
        $context["firstDay"] = twig_date_format_filter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 13, $this->source); })()), "d");
        // line 14
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["leftDays"]) || array_key_exists("leftDays", $context) ? $context["leftDays"] : (function () { throw new RuntimeError('Variable "leftDays" does not exist.', 14, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 15
            echo "                    <span class=\"text-";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\" style=\"color: #FFF; width: 100%;text-align: center;top:20px;\">
\t\t\t\t\t\t\t<div style=\"font-size: 5rem; line-height: 4rem;\">
                                ";
            // line 17
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 17, $this->source); })()), "d"), "html", null, true);
            echo "
                            </div>
\t\t\t\t\t\t\t<div style=\"font-family: OpenSans-Regular;\">
\t\t\t\t\t\t\t\t";
            // line 20
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 20, $this->source); })()), "medium", "", null, "gregorian", "fr"), 2), "html", null, true);
            echo "
\t\t\t\t\t\t\t</div>
                            <section>
                                <div class=\"container\">
                                    <div class=\"row\">
                                        <div class=\"col-12 mb-2 text-left\">
                                            <div class=\"bold-OS text-dark  pt-5\">VOS RENDEZ-VOUS</div>
                                            <p class=\"text-black-50 pb-4\" style=\"font-size: 0.8rem\">Cliquez sur un créneau pour organiser une rendez-vous</p>
                                            ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["meetings"]) || array_key_exists("meetings", $context) ? $context["meetings"] : (function () { throw new RuntimeError('Variable "meetings" does not exist.', 28, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                // line 29
                echo "                                                ";
                if ((0 === twig_compare(twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 29), "d"), twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 29, $this->source); })()), "d")))) {
                    // line 30
                    echo "                                                    ";
                    if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isOpen", [], "any", false, false, false, 30), true)) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isReserved", [], "any", false, false, false, 30), false)))) {
                        // line 31
                        echo "                                                        <div class=\"detail-rdv libre\" onclick=\"modalCarousel('modalForm-'+";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 31), "html", null, true);
                        echo ")\">
                                                        <div class=\"hours\">";
                        // line 32
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 32), "H:i"), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "endDate", [], "any", false, false, false, 32), "H:i"), "html", null, true);
                        echo "</div>
                                                        <div class=\"txt\" style=\"text-transform: none;\">Pas de rendez-vous</div>
                                                    </div>
                                                ";
                    } elseif (((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 35
$context["meeting"], "isOpen", [], "any", false, false, false, 35), false)) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isReserved", [], "any", false, false, false, 35), true)))) {
                        // line 36
                        echo "                                                        <div class=\"detail-rdv occupe\">
                                                        <div class=\"hours\">";
                        // line 37
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 37), "H:i"), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "endDate", [], "any", false, false, false, 37), "H:i"), "html", null, true);
                        echo "</div>
                                                        <div class=\"nom\">
                                                            ";
                        // line 39
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["meeting"], "customer", [], "any", false, false, false, 39), "civility", [], "any", false, false, false, 39), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["meeting"], "customer", [], "any", false, false, false, 39), "lastname", [], "any", false, false, false, 39), "html", null, true);
                        echo " -
                                                            <motif class=\"motif\" style=\"text-transform: none;\"> ";
                        // line 40
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["meeting"], "reason", [], "any", false, false, false, 40), "name", [], "any", false, false, false, 40), "html", null, true);
                        echo "</motif>
                                                        </div>
                                                    </div>
                                                ";
                    } elseif (((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 43
$context["meeting"], "isOpen", [], "any", false, false, false, 43), false)) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isReserved", [], "any", false, false, false, 43), false)))) {
                        // line 44
                        echo "                                                        <div class=\"detail-rdv inactif\">
                                                        <div class=\"hours\">";
                        // line 45
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 45), "H:i"), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "endDate", [], "any", false, false, false, 45), "H:i"), "html", null, true);
                        echo "</div>
                                                        <div class=\"nom\">Créneau non disponible</div>
                                                    </div>
                                                    ";
                    }
                    // line 49
                    echo "                                                ";
                }
                // line 50
                echo "                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meeting'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "                                        </div>
                                    </div>
                                </div>
                            </section>
\t\t\t\t\t\t</span>


                    ";
            // line 58
            $context["date"] = twig_date_modify_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 58, $this->source); })()), "+1 day");
            // line 59
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "            </div>
            <div id=\"nav\" style=\"display: inline-block; float: right; font-size: 1.5rem;\">
                <a href=\"#left\" class=\"left\"
                   style=\"color: #FFF; text-decoration: none; font-size: 3rem;position: absolute; top: 35px;left: 20px;\"><i
                            class=\"fa fa-angle-left\"></i>&nbsp;</a>
                <a href=\"#right\" class=\"right\"
                   style=\"color: #FFF; text-decoration: none; font-size: 3rem;position: absolute; top: 35px;right: 20px;\">&nbsp;<i
                            class=\"fa fa-angle-right\"></i></a>
            </div>
        </div>
    </div>
</header>
";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["meetings"]) || array_key_exists("meetings", $context) ? $context["meetings"] : (function () { throw new RuntimeError('Variable "meetings" does not exist.', 72, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
            // line 73
            echo "<!-- BEGIN POPPIN FORM  -->
<div id=\"modalForm-";
            // line 74
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 74), "html", null, true);
            echo "\" class=\"modal1\">
    <div class=\"modal-content\" style=\"display: block;\" id=\"form-";
            // line 75
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 75), "html", null, true);
            echo "\">
        <div class=\"close\" id=\"close_form\"
             onclick=\"closeModal('modalForm-'+";
            // line 77
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 77), "html", null, true);
            echo ");\"></div>
        <form id=\"form-";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 78), "html", null, true);
            echo "\" action=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planning_user_send");
            echo "\" method=\"post\">
                <div class=\"modal-body\" id=\"form-content";
            // line 79
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 79), "html", null, true);
            echo "\"
                     style=\"margin-top: 60px;\">
                        <div class=\"bold-OS pb-2\">MOTIF DU RENDEZ-VOUS</div>
                        <select class=\"form-control w-100 mb-3\" name=\"reason\">
                            ";
            // line 83
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 83, $this->source); })()), "reasons", [], "any", false, false, false, 83));
            foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
                // line 84
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "id", [], "any", false, false, false, 84), "html", null, true);
                echo "\">
                                    ";
                // line 85
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "name", [], "any", false, false, false, 85), "html", null, true);
                echo "
                                </option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "                        </select>
                        <div class=\"bold-OS pb-2\">INFORMATIONS PERSONNELLES</div>
                        <select class=\"form-control w-100 mb-3\" name=\"civility\">
                            <option>Civilité*</option>
                            <option>Professeur</option>
                            <option>Docteur</option>
                            <option>Monsieur</option>
                            <option>Madame</option>
                        </select>
                        <input type=\"hidden\" name=\"meeting\"
                           class=\"form-control w-100 mb-3\" value=\"";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 98), "html", null, true);
            echo "\" required>
                        <input type=\"text\" placeholder=\"Nom*\" name=\"lastname\"
                               class=\"form-control w-100 mb-3\" required>
                        <input type=\"text\" placeholder=\"Prénom*\" name=\"firstname\"
                               class=\"form-control w-100 mb-3\" required>
                        <input type=\"email\" placeholder=\"Email*\" name=\"mail\"
                               class=\"form-control w-100 mb-3\" required>
                        <input type=\"text\" placeholder=\"Téléphone\" name=\"phone\"
                               class=\"form-control w-100 mb-3\">
                        <input type=\"text\" placeholder=\"Lieu d'exercice\" name=\"localisation\"
                               class=\"form-control w-100 mb-3\">
                        <div class=\"mention\">*champs obligatoires</div>
                    <input class=\"but-popin-alert\" type=\"submit\" value=\"Valider le rendez-vous\" id=\"submit-";
            // line 110
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 110), "html", null, true);
            echo "\">
                </div>
        </form>
    </div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meeting'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 118
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 119
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 120
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("slider");
        echo "
    ";
        // line 121
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("modal");
        echo "
    <script>
        function modalCarousel(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"inline-block\";
        }

        function closeModal(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"none\";
        }
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "planning/planningUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  356 => 121,  352 => 120,  347 => 119,  337 => 118,  326 => 116,  314 => 110,  299 => 98,  287 => 88,  278 => 85,  273 => 84,  269 => 83,  262 => 79,  256 => 78,  252 => 77,  247 => 75,  243 => 74,  240 => 73,  236 => 72,  222 => 60,  216 => 59,  214 => 58,  205 => 51,  199 => 50,  196 => 49,  187 => 45,  184 => 44,  182 => 43,  176 => 40,  170 => 39,  163 => 37,  160 => 36,  158 => 35,  150 => 32,  145 => 31,  142 => 30,  139 => 29,  135 => 28,  124 => 20,  118 => 17,  112 => 15,  107 => 14,  104 => 13,  101 => 12,  98 => 11,  95 => 10,  89 => 5,  79 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - Incyte{% endblock %}
{% block body %}
<header>
    <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
        <div class=\"wrapper\" style=\"width: 100%;\">
            <div id=\"month\">
                {# List days #}
                {% set difference = date(congres.endDate).diff(date(startDate)) %}
                {% set leftDays = difference.days + 1 %}
                {% set date = startDate %}
                {% set firstDay = startDate|date('d') %}
                {% for i in 1..leftDays %}
                    <span class=\"text-{{ i }}\" style=\"color: #FFF; width: 100%;text-align: center;top:20px;\">
\t\t\t\t\t\t\t<div style=\"font-size: 5rem; line-height: 4rem;\">
                                {{ date|date('d') }}
                            </div>
\t\t\t\t\t\t\t<div style=\"font-family: OpenSans-Regular;\">
\t\t\t\t\t\t\t\t{{ date|format_date('medium', locale='fr')|slice(2) }}
\t\t\t\t\t\t\t</div>
                            <section>
                                <div class=\"container\">
                                    <div class=\"row\">
                                        <div class=\"col-12 mb-2 text-left\">
                                            <div class=\"bold-OS text-dark  pt-5\">VOS RENDEZ-VOUS</div>
                                            <p class=\"text-black-50 pb-4\" style=\"font-size: 0.8rem\">Cliquez sur un créneau pour organiser une rendez-vous</p>
                                            {% for meeting in meetings %}
                                                {% if meeting.startDate|date('d') == date|date('d') %}
                                                    {% if meeting.isOpen == true and meeting.isReserved == false %}
                                                        <div class=\"detail-rdv libre\" onclick=\"modalCarousel('modalForm-'+{{ meeting.id }})\">
                                                        <div class=\"hours\">{{ meeting.startDate|date('H:i') }} - {{ meeting.endDate|date('H:i') }}</div>
                                                        <div class=\"txt\" style=\"text-transform: none;\">Pas de rendez-vous</div>
                                                    </div>
                                                {% elseif meeting.isOpen == false and meeting.isReserved == true %}
                                                        <div class=\"detail-rdv occupe\">
                                                        <div class=\"hours\">{{ meeting.startDate|date('H:i') }} - {{ meeting.endDate|date('H:i') }}</div>
                                                        <div class=\"nom\">
                                                            {{ meeting.customer.civility }} {{ meeting.customer.lastname }} -
                                                            <motif class=\"motif\" style=\"text-transform: none;\"> {{ meeting.reason.name }}</motif>
                                                        </div>
                                                    </div>
                                                {% elseif meeting.isOpen == false and meeting.isReserved == false %}
                                                        <div class=\"detail-rdv inactif\">
                                                        <div class=\"hours\">{{ meeting.startDate|date('H:i') }} - {{ meeting.endDate|date('H:i') }}</div>
                                                        <div class=\"nom\">Créneau non disponible</div>
                                                    </div>
                                                    {% endif %}
                                                {% endif %}
                                            {% endfor %}
                                        </div>
                                    </div>
                                </div>
                            </section>
\t\t\t\t\t\t</span>


                    {% set date = date|date_modify(\"+1 day\") %}
                {% endfor %}
            </div>
            <div id=\"nav\" style=\"display: inline-block; float: right; font-size: 1.5rem;\">
                <a href=\"#left\" class=\"left\"
                   style=\"color: #FFF; text-decoration: none; font-size: 3rem;position: absolute; top: 35px;left: 20px;\"><i
                            class=\"fa fa-angle-left\"></i>&nbsp;</a>
                <a href=\"#right\" class=\"right\"
                   style=\"color: #FFF; text-decoration: none; font-size: 3rem;position: absolute; top: 35px;right: 20px;\">&nbsp;<i
                            class=\"fa fa-angle-right\"></i></a>
            </div>
        </div>
    </div>
</header>
{% for meeting in meetings %}
<!-- BEGIN POPPIN FORM  -->
<div id=\"modalForm-{{ meeting.id }}\" class=\"modal1\">
    <div class=\"modal-content\" style=\"display: block;\" id=\"form-{{ meeting.id }}\">
        <div class=\"close\" id=\"close_form\"
             onclick=\"closeModal('modalForm-'+{{ meeting.id }});\"></div>
        <form id=\"form-{{ meeting.id }}\" action=\"{{ path('planning_user_send') }}\" method=\"post\">
                <div class=\"modal-body\" id=\"form-content{{ meeting.id }}\"
                     style=\"margin-top: 60px;\">
                        <div class=\"bold-OS pb-2\">MOTIF DU RENDEZ-VOUS</div>
                        <select class=\"form-control w-100 mb-3\" name=\"reason\">
                            {% for reason in user.reasons %}
                                <option value=\"{{ reason.id }}\">
                                    {{ reason.name }}
                                </option>
                            {% endfor %}
                        </select>
                        <div class=\"bold-OS pb-2\">INFORMATIONS PERSONNELLES</div>
                        <select class=\"form-control w-100 mb-3\" name=\"civility\">
                            <option>Civilité*</option>
                            <option>Professeur</option>
                            <option>Docteur</option>
                            <option>Monsieur</option>
                            <option>Madame</option>
                        </select>
                        <input type=\"hidden\" name=\"meeting\"
                           class=\"form-control w-100 mb-3\" value=\"{{ meeting.id }}\" required>
                        <input type=\"text\" placeholder=\"Nom*\" name=\"lastname\"
                               class=\"form-control w-100 mb-3\" required>
                        <input type=\"text\" placeholder=\"Prénom*\" name=\"firstname\"
                               class=\"form-control w-100 mb-3\" required>
                        <input type=\"email\" placeholder=\"Email*\" name=\"mail\"
                               class=\"form-control w-100 mb-3\" required>
                        <input type=\"text\" placeholder=\"Téléphone\" name=\"phone\"
                               class=\"form-control w-100 mb-3\">
                        <input type=\"text\" placeholder=\"Lieu d'exercice\" name=\"localisation\"
                               class=\"form-control w-100 mb-3\">
                        <div class=\"mention\">*champs obligatoires</div>
                    <input class=\"but-popin-alert\" type=\"submit\" value=\"Valider le rendez-vous\" id=\"submit-{{ meeting.id }}\">
                </div>
        </form>
    </div>
</div>
{% endfor %}

{% endblock %}
{% block javascripts %}
    {{ parent() }}
    {{ encore_entry_script_tags('slider') }}
    {{ encore_entry_script_tags('modal') }}
    <script>
        function modalCarousel(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"inline-block\";
        }

        function closeModal(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"none\";
        }
    </script>
{% endblock %}

", "planning/planningUser.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/planning/planningUser.html.twig");
    }
}
