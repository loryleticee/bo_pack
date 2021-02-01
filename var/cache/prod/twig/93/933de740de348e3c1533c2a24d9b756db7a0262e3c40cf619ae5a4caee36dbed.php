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
class __TwigTemplate_df8432d3dec6d0b1b2ca4fbdda8339bc89b4b339770c914dbd448c27f1a25e7a extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "planning/planningUser.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Admin - Incyte";
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "<header>
    <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
        <div class=\"wrapper\" style=\"width: 100%;\">
            <div id=\"month\">
                ";
        // line 10
        echo "                ";
        $context["difference"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "endDate", [], "any", false, false, false, 10)), "diff", [0 => twig_date_converter($this->env, ($context["startDate"] ?? null))], "method", false, false, false, 10);
        // line 11
        echo "                ";
        $context["leftDays"] = (twig_get_attribute($this->env, $this->source, ($context["difference"] ?? null), "days", [], "any", false, false, false, 11) + 1);
        // line 12
        echo "                ";
        $context["date"] = ($context["startDate"] ?? null);
        // line 13
        echo "                ";
        $context["firstDay"] = twig_date_format_filter($this->env, ($context["startDate"] ?? null), "d");
        // line 14
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($context["leftDays"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 15
            echo "                    <span class=\"text-";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\" style=\"color: #FFF; width: 100%;text-align: center;top:20px;\">
\t\t\t\t\t\t\t<div style=\"font-size: 5rem; line-height: 4rem;\">
                                ";
            // line 17
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date"] ?? null), "d"), "html", null, true);
            echo "
                            </div>
\t\t\t\t\t\t\t<div style=\"font-family: OpenSans-Regular;\">
\t\t\t\t\t\t\t\t";
            // line 20
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, ($context["date"] ?? null), "medium", "", null, "gregorian", "fr"), 2), "html", null, true);
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
            $context['_seq'] = twig_ensure_traversable(($context["meetings"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                // line 29
                echo "                                                ";
                if ((0 === twig_compare(twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 29), "d"), twig_date_format_filter($this->env, ($context["date"] ?? null), "d")))) {
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
            $context["date"] = twig_date_modify_filter($this->env, ($context["date"] ?? null), "+1 day");
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
        $context['_seq'] = twig_ensure_traversable(($context["meetings"] ?? null));
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
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "reasons", [], "any", false, false, false, 83));
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
    }

    // line 118
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
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
        return array (  314 => 121,  310 => 120,  305 => 119,  301 => 118,  296 => 116,  284 => 110,  269 => 98,  257 => 88,  248 => 85,  243 => 84,  239 => 83,  232 => 79,  226 => 78,  222 => 77,  217 => 75,  213 => 74,  210 => 73,  206 => 72,  192 => 60,  186 => 59,  184 => 58,  175 => 51,  169 => 50,  166 => 49,  157 => 45,  154 => 44,  152 => 43,  146 => 40,  140 => 39,  133 => 37,  130 => 36,  128 => 35,  120 => 32,  115 => 31,  112 => 30,  109 => 29,  105 => 28,  94 => 20,  88 => 17,  82 => 15,  77 => 14,  74 => 13,  71 => 12,  68 => 11,  65 => 10,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "planning/planningUser.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/planning/planningUser.html.twig");
    }
}
