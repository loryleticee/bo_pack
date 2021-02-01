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

/* congres/contact.html.twig */
class __TwigTemplate_62859e79e832978adbd658c987bde5b58fd3ec0baa7e0fd01b67824f2352edc8 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "congres/contact.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Congrès - Incyte";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <header class=\"\">
        <div class=\"hcontact\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"text-left back\" style=\"float: left; height: 110px; line-height: 130px;\" id=\"back\"><a
                                    onclick=\"window.history.back();\" style=\"color: #FFF\">&#8963;</a></div>
                        <h1 class=\"text-right\" style=\"padding-top: 30px;display: inline-block; float: right;\"><img
                                    src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-blanc.png"), "html", null, true);
        echo "\" width=\"120\" alt=\"\"/></h1>
                    </div>
                    <div class=\"col-12\">
                        <form method=\"post\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_contact", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 17)]), "html", null, true);
        echo "\">
                            <div class=\"input-group\" style=\"padding: 20px 10px;\">
                                <input type=\"text\" class=\"form-search\" name=\"search\" id=\"search-form\" placeholder=\"Qui recherchez-vous ?\">
                                <div class=\"input-group-append\">
                                    <button style=\"border-bottom: #FFF 1px solid; color: #FFF; background-color: transparent; border: none\" type=\"submit\">
                                        <i class='fa fa-search' aria-hidden='true'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-12 mb-2 text-left\">
                    <h2>Prendre rendez-vous</h2>
                    ";
        // line 37
        if (twig_test_empty(($context["contacts"] ?? null))) {
            // line 38
            echo "                        <h3 class=\"p-5\">Aucun contact</h3>
                    ";
        }
        // line 40
        echo "                </div>
            </div>
        </div>
        <div id=\"carrousel\">
            <div class=\"owl-carousel owl-theme\">
                ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["contacts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 46
            echo "                    <div class=\"img\" onclick=\"modalCarousel('modal-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 46), "html", null, true);
            echo ")\">
                        <div style=\"background-image: url('";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/user/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "img", [], "any", false, false, false, 47), "html", null, true);
            echo "');\"
                             class=\"img-carrousel\"></div>
                        <div style=\"padding: 10px 20px;\">
                            <div class=\"name\">";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "firstname", [], "any", false, false, false, 50), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "lastname", [], "any", false, false, false, 50), "html", null, true);
            echo "</div>
                            <div class=\"poste\">";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "job", [], "any", false, false, false, 51), "html", null, true);
            echo "</div>
                            <div style=\"position: absolute;bottom: 12px;right: 16px;\">&#8594;</div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "            </div>
            <div class=\"text-center\">
                <div class=\"status\"></div>
            </div>
        </div>
    </section>
    ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["contacts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 63
            echo "        <!-- BEGIN : POPIN CONTACT -->
        <div id=\"modal-";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 64), "html", null, true);
            echo "\" class=\"modal1\">
            <div class=\"modal-content\" id=\"fiche\">

                <div style=\"background-image: url('";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/user/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "img", [], "any", false, false, false, 67), "html", null, true);
            echo "');\" class=\"visuel-bg\">
                    <div class=\"close\" onclick=\"closeModal('modal-'+";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 68), "html", null, true);
            echo ")\"></div>
                </div>
                <div class=\"modal-body\">
                    <div class=\"name-popin\">";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "firstname", [], "any", false, false, false, 71), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "lastname", [], "any", false, false, false, 71), "html", null, true);
            echo "</div>
                    <div class=\"poste-popin poste\">";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "job", [], "any", false, false, false, 72), "html", null, true);
            echo "</div>
\t\t\t\t\t";
            // line 73
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["contact"], "localisation", [], "any", false, false, false, 73))) {
                // line 74
                echo "                    <div class=\"lieu-popin\">
                        <img src=\"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MjUuOTUxLDg5LjAyMUMzODYuODY0LDMyLjQ1MSwzMjQuOTE3LDAsMjU2LjAwNiwwUzEyNS4xNDgsMzIuNDUxLDg2LjA2MSw4OS4wMjENCgkJCWMtMzguODk1LDU2LjI4NC00Ny44NzYsMTI3LjU0MS0yNC4wNzIsMTkwLjQ5NmM2LjM2NywxNy4xOTIsMTYuNDg4LDMzLjg5NSwzMC4wMSw0OS41NDdsMTUwLjM3OCwxNzYuNjM0DQoJCQljMy40MDEsMy45OTgsOC4zODQsNi4zMDIsMTMuNjI5LDYuMzAyYzUuMjQ1LDAsMTAuMjI4LTIuMzAzLDEzLjYyOS02LjMwMmwxNTAuMzM2LTE3Ni41ODYNCgkJCWMxMy41ODItMTUuNzQyLDIzLjY5LTMyLjQyNywzMC4wMDQtNDkuNDgxQzQ3My44MjcsMjE2LjU2Miw0NjQuODQ2LDE0NS4zMDUsNDI1Ljk1MSw4OS4wMjF6IE00MTYuNDUxLDI2Ny4wOTMNCgkJCWMtNC44NjksMTMuMTU4LTEyLjgxOCwyNi4xNjctMjMuNjEzLDM4LjY4Yy0wLjAzLDAuMDMtMC4wNiwwLjA2LTAuMDg0LDAuMDk2TDI1Ni4wMDYsNDY2LjQ4N0wxMTkuMTc0LDMwNS43NjgNCgkJCWMtMTAuNzg5LTEyLjUwMi0xOC43MzgtMjUuNTEtMjMuNjU1LTM4Ljc5NGMtMTkuNjg2LTUyLjA2NS0xMi4yMTUtMTEwLjk4MSwxOS45OTEtMTU3LjU5Mg0KCQkJYzMyLjMwNy00Ni43Niw4My41MTktNzMuNTc4LDE0MC40OTYtNzMuNTc4YzU2Ljk3NiwwLDEwOC4xODIsMjYuODE3LDE0MC40OSw3My41NzgNCgkJCUM0MjguNzA4LDE1NS45OTMsNDM2LjE4NSwyMTQuOTA5LDQxNi40NTEsMjY3LjA5M3oiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTI1Ni4wMDYsMTA2LjIxOWMtNTUuMjc2LDAtMTAwLjI1Miw0NC45Ny0xMDAuMjUyLDEwMC4yNTJzNDQuOTcsMTAwLjI1MiwxMDAuMjUyLDEwMC4yNTJzMTAwLjI1Mi00NC45NywxMDAuMjUyLTEwMC4yNTINCgkJCUMzNTYuMjU4LDE1MS4xOTUsMzExLjI4MiwxMDYuMjE5LDI1Ni4wMDYsMTA2LjIxOXogTTI1Ni4wMDYsMjcwLjkxOGMtMzUuNTM2LDAtNjQuNDQ4LTI4LjkxMi02NC40NDgtNjQuNDQ4DQoJCQljMC0zNS41MzYsMjguOTEyLTY0LjQ0OCw2NC40NDgtNjQuNDQ4YzM1LjUzNiwwLDY0LjQ0OCwyOC45MTIsNjQuNDQ4LDY0LjQ0OFMyOTEuNTQyLDI3MC45MTgsMjU2LjAwNiwyNzAuOTE4eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K\"
                             style=\"width: 23px;\"/>
                        &nbsp;
                        ";
                // line 78
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "categoryUsers", [], "any", false, false, false, 78));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 79
                    echo "                            ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 79), "html", null, true);
                    echo " -
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                echo "                        <span class=\"text-capitalize\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "localisation", [], "any", false, false, false, 81), "html", null, true);
                echo "</span>
                    </div>
\t\t\t\t\t";
            }
            // line 84
            echo "                    ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["contact"], "about", [], "any", false, false, false, 84))) {
                // line 85
                echo "\t\t\t\t\t<div>
                        <p class=\"titre-apropos-popin\">A PROPOS</p>
                        <p class=\"apropos-popin\">";
                // line 87
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "about", [], "any", false, false, false, 87), "html", null, true);
                echo "</p>
                    </div>
\t\t\t\t\t";
            }
            // line 90
            echo "                    <a href=\"tel:";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "phone", [], "any", false, false, false, 90), "html", null, true);
            echo "\">
                        <div class=\"call-popin\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i></div>
                    </a>
                    <div class=\"but-popin\" id=\"form";
            // line 93
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 93), "html", null, true);
            echo "\"
                         onclick=\"modalCarousel('modalForm-'+";
            // line 94
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 94), "html", null, true);
            echo ");closeModal('back2-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 94), "html", null, true);
            echo ");modalCarousel('back1-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 94), "html", null, true);
            echo ")\">
                        Prendre rendez-vous
                    </div>

                </div>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "
    ";
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["contacts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 104
            echo "        <!-- BEGIN POPPIN FORM  -->
        <div id=\"modalForm-";
            // line 105
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 105), "html", null, true);
            echo "\" class=\"modal1\" style=\"";
            echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", true, true, false, 105) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", false, false, false, 105), twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 105))))) ? ("display: flex") : ("display: none"));
            echo "\">
                <div class=\"modal-content\" style=\"display: block;\" id=\"formulaire";
            // line 106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 106), "html", null, true);
            echo "\">
                    <form name=\"form-";
            // line 107
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 107), "html", null, true);
            echo "\" id=\"form-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 107), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("question_send", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 107)]), "html", null, true);
            echo "\" method=\"post\">
                    <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
                        <div class=\"text-left back\" id=\"back1-";
            // line 109
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 109), "html", null, true);
            echo "\"
                             onclick=\"closeModal('modalForm-'+";
            // line 110
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 110), "html", null, true);
            echo "); closeModal('back1-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 110), "html", null, true);
            echo "); modalCarousel('back2-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 110), "html", null, true);
            echo ")\"
                             style=\"float: left; height: 90px; line-height: 140px;\">&#8963;
                        </div>
                        <div class=\"text-left back\" id=\"back2-";
            // line 113
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 113), "html", null, true);
            echo "\"
                             onclick=\"closeModal('creneau-content'+";
            // line 114
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 114), "html", null, true);
            echo "); modalCarousel('back1-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 114), "html", null, true);
            echo ");modalCarousel('form-content'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 114), "html", null, true);
            echo "); closeModal('back2-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 114), "html", null, true);
            echo ")\"
                             style=\"float: left; height: 90px; line-height: 140px; display: none;\">&#8963;
                        </div>
                        <div class=\"titre-popin\">";
            // line 117
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "firstname", [], "any", false, false, false, 117), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "lastname", [], "any", false, false, false, 117), "html", null, true);
            echo "</div>
                        <div class=\"soustitre-popin poste2\">";
            // line 118
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "job", [], "any", false, false, false, 118), "html", null, true);
            echo "</div>
                        <div class=\"close\" id=\"close_form\"
                             onclick=\"closeModal('modalForm-'+";
            // line 120
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 120), "html", null, true);
            echo "); closeModal('modal-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 120), "html", null, true);
            echo ")\"></div>
                    </div>
                    <div style=\"background-image: url('";
            // line 122
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/user/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "img", [], "any", false, false, false, 122), "html", null, true);
            echo "');background-position: center;background-size: cover; height: 140px; width: 140px; border-radius: 50%; margin: auto; margin-top: -70px; z-index: 100; position: absolute; left: calc(50% - 70px);\"></div>
                    <div class=\"modal-body\" id=\"form-content";
            // line 123
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 123), "html", null, true);
            echo "\" style=\"margin-top: 60px;";
            echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", true, true, false, 123) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", false, false, false, 123), twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 123))))) ? ("display: none") : ("display: block"));
            echo "\">
                        <form>
                            <div class=\"bold-OS pb-2\">MOTIF DU RENDEZ-VOUS</div>
                            <select class=\"form-control w-100 mb-3\" name=\"reason\">
                                ";
            // line 127
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "reasons", [], "any", false, false, false, 127));
            foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
                // line 128
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "id", [], "any", false, false, false, 128), "html", null, true);
                echo "\" ";
                echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "reason", [], "any", true, true, false, 128) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "reason", [], "any", false, false, false, 128), twig_get_attribute($this->env, $this->source, $context["reason"], "id", [], "any", false, false, false, 128))))) ? ("selected=\"selected\"") : (""));
                echo ">
                                        ";
                // line 129
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "name", [], "any", false, false, false, 129), "html", null, true);
                echo "
                                    </option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "                            </select>
                            <div class=\"bold-OS pb-2\">INFORMATIONS PERSONNELLES</div>
                            <select class=\"form-control w-100 mb-3\" name=\"civility\">
                                <option value=\"\">Civilité*</option>
                                <option>Professeur</option>
                                <option>Docteur</option>
                                <option>Monsieur</option>
                                <option>Madame</option>
                                ";
            // line 140
            if (twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "civility", [], "any", true, true, false, 140)) {
                // line 141
                echo "                                    <option selected=\"selected\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "civility", [], "any", false, false, false, 141), "html", null, true);
                echo "</option>
                                ";
            }
            // line 143
            echo "                            </select>
                            <input type=\"text\" placeholder=\"Nom*\" name=\"lastname\" value=\"";
            // line 144
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "lastname", [], "any", true, true, false, 144)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "lastname", [], "any", false, false, false, 144), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"text\" placeholder=\"Prénom*\" name=\"firstname\" value=\"";
            // line 145
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "firstname", [], "any", true, true, false, 145)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "firstname", [], "any", false, false, false, 145), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"email\" placeholder=\"Email*\" name=\"mail\" value=\"";
            // line 146
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "mail", [], "any", true, true, false, 146)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "mail", [], "any", false, false, false, 146), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"text\" placeholder=\"Téléphone\" name=\"phone\" value=\"";
            // line 147
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "phone", [], "any", true, true, false, 147)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "phone", [], "any", false, false, false, 147), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\">
                            <input type=\"text\" placeholder=\"Lieu d'exercice\" name=\"localisation\" value=\"";
            // line 148
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "localisation", [], "any", true, true, false, 148)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "localisation", [], "any", false, false, false, 148), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\">
                            <span class=\"badge badge-danger\" id=\"error-";
            // line 149
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 149), "html", null, true);
            echo "\" style=\"display: none;\">Veuillez remplir correctement le formulaire.</span>
                            <div class=\"but-popin-alert\"
                                 onclick=\"checkFormValid(";
            // line 151
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 151), "html", null, true);
            echo ");\">
                                Choisir une date et une heure
                            </div>
                            <div class=\"mention\">*champs obligatoires</div>
                    </div>
                    <div class=\"modal-body\" id=\"creneau-content";
            // line 156
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 156), "html", null, true);
            echo "\"
                         style=\"margin-top: 3rem;";
            // line 157
            echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", true, true, false, 157) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", false, false, false, 157), twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 157))))) ? ("display: inline-block") : ("display: none"));
            echo ";\">
                        <div>
                            <div class=\"wrapper\">
                                <div id=\"month\">
                                <span class=\"text-1\" style=\"\">
                                    ";
            // line 162
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "endDate", [], "any", false, false, false, 162), "medium", "MMMM", null, "gregorian", "fr"), "html", null, true);
            echo "
                                </span>
                                </div>
                            </div>
                            <div id=\"nav\" style=\"display: inline-block; float: right; font-size: 1.5rem;\">
                                <a href=\"#left\" class=\"left\"><i class=\"fa fa-angle-left\"></i>&nbsp;</a>
                                <a href=\"#right\" class=\"right\">&nbsp;<i class=\"fa fa-angle-right\"></i></a>
                            </div>
                            <div class=\"btn-group-toggle scroll text-center\" data-toggle=\"buttons\">
                                ";
            // line 172
            echo "                                ";
            $context["difference"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "endDate", [], "any", false, false, false, 172)), "diff", [0 => twig_date_converter($this->env, ($context["startDate"] ?? null))], "method", false, false, false, 172);
            // line 173
            echo "                                ";
            $context["leftDays"] = (twig_get_attribute($this->env, $this->source, ($context["difference"] ?? null), "days", [], "any", false, false, false, 173) + 1);
            // line 174
            echo "                                ";
            $context["date"] = ($context["startDate"] ?? null);
            // line 175
            echo "                                ";
            $context["firstDay"] = twig_date_format_filter($this->env, ($context["startDate"] ?? null), "d");
            // line 176
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, ($context["leftDays"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 177
                echo "                                    <div style=\"display: inline-block\"
                                         onclick=\"openCalendar('";
                // line 178
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date"] ?? null), "D"), "html", null, true);
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 178), "html", null, true);
                echo "');\">
                                        <span class=\"day\">";
                // line 179
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, ($context["date"] ?? null), "full", "none", "", null, "gregorian", "fr"), 0, 3), "html", null, true);
                echo "</span>

                                        <label style=\"padding-left: 10px;\" class=\"btn btn-secondary mb-3 round ";
                // line 181
                echo (((0 === twig_compare($context["i"], 1))) ? ("active") : (""));
                echo "\" >
                                            <input type=\"radio\"
                                                   autocomplete=\"off\" ";
                // line 183
                echo (((0 === twig_compare($context["i"], 1))) ? ("checked") : (""));
                echo ">
                                            ";
                // line 184
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date"] ?? null), "d"), "html", null, true);
                echo "
                                        </label>
                                    </div>
                                    ";
                // line 187
                $context["date"] = twig_date_modify_filter($this->env, ($context["date"] ?? null), "+1 day");
                // line 188
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 189
            echo "                            </div>
                            <div class=\"bold-OS pb-2\">MEETING DE ";
            // line 190
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatTime($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "durationMeeting", [], "any", false, false, false, 190), "medium", "mm"), "html", null, true);
            echo "
                                MN
                            </div>

                            <div class=\"btn-group-toggle-hour btn-group-toggle\" data-toggle=\"buttons\">
                                ";
            // line 195
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "meetings", [], "any", false, false, false, 195));
            foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                // line 196
                echo "                                    <label class=\"btn ";
                echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isOpen", [], "any", false, false, false, 196), true))) ? ("btn-secondary") : ("btn-outline-secondary disabled"));
                echo " mb-3 planning ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 196), "D"), "html", null, true);
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 196), "html", null, true);
                echo "\"
                                           style=\"display: ";
                // line 197
                echo (((0 === twig_compare(twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 197), "d"), ($context["firstDay"] ?? null)))) ? ("block") : ("none"));
                echo "\"
                                            ";
                // line 198
                echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isOpen", [], "any", false, false, false, 198), true))) ? ("") : ("disabled"));
                echo "
                                    >
                                        <input type=\"radio\" name=\"meeting\" autocomplete=\"off\"
                                               value=\"";
                // line 201
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 201), "html", null, true);
                echo "\" required>
                                        ";
                // line 202
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 202), "H:i"), "html", null, true);
                echo "
                                    </label>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meeting'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 205
            echo "                            </div>
                        </div>
                        <input class=\"but-popin-alert\" type=\"submit\" value=\"Valider le rendez-vous\" id=\"submit-";
            // line 207
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 207), "html", null, true);
            echo "\">
                    </div>
                    </form>

                </div>
        </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        echo "
";
    }

    // line 218
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 219
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        ";
        // line 220
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("slider");
        echo "
        ";
        // line 221
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("modal");
        echo "
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js\"></script>
        <script>
            function modalCarousel(id) {
                var modal = document.getElementById(id);
                modal.style.display = \"inline-block\";
            }

            function openCalendar(id) {
                console.log(id)

                var divsToHide = document.getElementsByClassName(\"planning\"); //divsToHide is an array
                for (var i = 0; i < divsToHide.length; i++) {
                    divsToHide[i].style.display = \"none\";
                }
                var divsToShow = document.getElementsByClassName(id);
                console.log(divsToShow)

                for (var a = 0; a < divsToShow.length; a++) {
                    divsToShow[a].style.display = \"block\";
                }
            }

            function closeModal(id) {
                var modal = document.getElementById(id);
                modal.style.display = \"none\";
            }
            function validateEmail(email) {
                const re = /^(([^<>()[\\]\\\\.,;:\\s@\\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\\"]+)*)|(\\\".+\\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))\$/;
                return re.test(email);
            }

            function checkFormValid(contactId){
                var civ = document.forms[\"form-\"+contactId][\"civility\"].value;
                var lastname = document.forms[\"form-\"+contactId][\"lastname\"].value;
                var firstname = document.forms[\"form-\"+contactId][\"firstname\"].value;
                var mail = document.forms[\"form-\"+contactId][\"mail\"].value;
                if ((validateEmail(mail)) && (civ !== \"\") && (lastname !== \"\") && (firstname !== \"\")){
                    modalCarousel('creneau-content'+contactId);
                    closeModal('form-content'+contactId);
                    closeModal('back1-'+contactId);
                    modalCarousel('back2-'+contactId)
                }else {
                    modalCarousel('error-'+contactId);
                }
            }


            \$('.owl-carousel').owlCarousel({
                center: false,
                loop: true,
                nav: true,
                navText: ['<i class=\"fa fa-angle-left previous\"></i> PRECEDENT', 'SUIVANT <i class=\"fa fa-angle-right next\"></i>'],
                responsive: {
                    0: {
                        items: 2,
                    },
                    768: {
                        items: 4,
                    },
                    990: {
                        items: 5,
                    }
                },
                onInitialized: coverFlowEfx,
                onTranslate: coverFlowEfx,
            });

            function coverFlowEfx(e) {
                if (\$('.owl-dots')) {
                    \$('.owl-dots').remove();
                }
                idx = e.item.index;
                \$('.owl-item.big').removeClass('big');
                \$('.owl-item.medium').removeClass('medium');
                \$('.owl-item.mdright').removeClass('mdright');
                \$('.owl-item.mdleft').removeClass('mdleft');
                \$('.owl-item.smallRight').removeClass('smallRight');
                \$('.owl-item.smallLeft').removeClass('smallLeft');
                \$('.owl-item').eq(idx - 1).addClass('medium mdleft');
                \$('.owl-item').eq(idx).addClass('big');
                \$('.owl-item').eq(idx + 1).addClass('medium mdright');
                \$('.owl-item').eq(idx + 2).addClass('smallRight');
                \$('.owl-item').eq(idx - 2).addClass('smallLeft');
            }
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "congres/contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  580 => 221,  576 => 220,  571 => 219,  567 => 218,  562 => 215,  548 => 207,  544 => 205,  535 => 202,  531 => 201,  525 => 198,  521 => 197,  513 => 196,  509 => 195,  501 => 190,  498 => 189,  492 => 188,  490 => 187,  484 => 184,  480 => 183,  475 => 181,  470 => 179,  465 => 178,  462 => 177,  457 => 176,  454 => 175,  451 => 174,  448 => 173,  445 => 172,  433 => 162,  425 => 157,  421 => 156,  413 => 151,  408 => 149,  404 => 148,  400 => 147,  396 => 146,  392 => 145,  388 => 144,  385 => 143,  379 => 141,  377 => 140,  367 => 132,  358 => 129,  351 => 128,  347 => 127,  338 => 123,  333 => 122,  326 => 120,  321 => 118,  315 => 117,  303 => 114,  299 => 113,  289 => 110,  285 => 109,  276 => 107,  272 => 106,  266 => 105,  263 => 104,  259 => 103,  256 => 102,  238 => 94,  234 => 93,  227 => 90,  221 => 87,  217 => 85,  214 => 84,  207 => 81,  198 => 79,  194 => 78,  188 => 74,  186 => 73,  182 => 72,  176 => 71,  170 => 68,  165 => 67,  159 => 64,  156 => 63,  152 => 62,  144 => 56,  133 => 51,  127 => 50,  120 => 47,  115 => 46,  111 => 45,  104 => 40,  100 => 38,  98 => 37,  75 => 17,  69 => 14,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "congres/contact.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/contact.html.twig");
    }
}
