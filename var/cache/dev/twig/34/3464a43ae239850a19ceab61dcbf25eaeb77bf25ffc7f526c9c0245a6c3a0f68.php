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
class __TwigTemplate_3732ad0249a3f64fb073ca54703e3a4176e7aa2b23b2b7288448ed6b3c3e9ae0 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "congres/contact.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "congres/contact.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "congres/contact.html.twig", 1);
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

        echo "Congrès - Incyte";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_contact", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17)]), "html", null, true);
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
        if (twig_test_empty((isset($context["contacts"]) || array_key_exists("contacts", $context) ? $context["contacts"] : (function () { throw new RuntimeError('Variable "contacts" does not exist.', 37, $this->source); })()))) {
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
        $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) || array_key_exists("contacts", $context) ? $context["contacts"] : (function () { throw new RuntimeError('Variable "contacts" does not exist.', 45, $this->source); })()));
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
                            <div style=\"text-align: right\">&#8594;</div>
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
        $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) || array_key_exists("contacts", $context) ? $context["contacts"] : (function () { throw new RuntimeError('Variable "contacts" does not exist.', 62, $this->source); })()));
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
            echo "');background-position: center;background-size: cover; min-height: 300px; border-bottom-left-radius: 20px;display: inline-block; width: 100%;\">
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
                    <div class=\"lieu-popin\">
                        <img src=\"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MjUuOTUxLDg5LjAyMUMzODYuODY0LDMyLjQ1MSwzMjQuOTE3LDAsMjU2LjAwNiwwUzEyNS4xNDgsMzIuNDUxLDg2LjA2MSw4OS4wMjENCgkJCWMtMzguODk1LDU2LjI4NC00Ny44NzYsMTI3LjU0MS0yNC4wNzIsMTkwLjQ5NmM2LjM2NywxNy4xOTIsMTYuNDg4LDMzLjg5NSwzMC4wMSw0OS41NDdsMTUwLjM3OCwxNzYuNjM0DQoJCQljMy40MDEsMy45OTgsOC4zODQsNi4zMDIsMTMuNjI5LDYuMzAyYzUuMjQ1LDAsMTAuMjI4LTIuMzAzLDEzLjYyOS02LjMwMmwxNTAuMzM2LTE3Ni41ODYNCgkJCWMxMy41ODItMTUuNzQyLDIzLjY5LTMyLjQyNywzMC4wMDQtNDkuNDgxQzQ3My44MjcsMjE2LjU2Miw0NjQuODQ2LDE0NS4zMDUsNDI1Ljk1MSw4OS4wMjF6IE00MTYuNDUxLDI2Ny4wOTMNCgkJCWMtNC44NjksMTMuMTU4LTEyLjgxOCwyNi4xNjctMjMuNjEzLDM4LjY4Yy0wLjAzLDAuMDMtMC4wNiwwLjA2LTAuMDg0LDAuMDk2TDI1Ni4wMDYsNDY2LjQ4N0wxMTkuMTc0LDMwNS43NjgNCgkJCWMtMTAuNzg5LTEyLjUwMi0xOC43MzgtMjUuNTEtMjMuNjU1LTM4Ljc5NGMtMTkuNjg2LTUyLjA2NS0xMi4yMTUtMTEwLjk4MSwxOS45OTEtMTU3LjU5Mg0KCQkJYzMyLjMwNy00Ni43Niw4My41MTktNzMuNTc4LDE0MC40OTYtNzMuNTc4YzU2Ljk3NiwwLDEwOC4xODIsMjYuODE3LDE0MC40OSw3My41NzgNCgkJCUM0MjguNzA4LDE1NS45OTMsNDM2LjE4NSwyMTQuOTA5LDQxNi40NTEsMjY3LjA5M3oiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTI1Ni4wMDYsMTA2LjIxOWMtNTUuMjc2LDAtMTAwLjI1Miw0NC45Ny0xMDAuMjUyLDEwMC4yNTJzNDQuOTcsMTAwLjI1MiwxMDAuMjUyLDEwMC4yNTJzMTAwLjI1Mi00NC45NywxMDAuMjUyLTEwMC4yNTINCgkJCUMzNTYuMjU4LDE1MS4xOTUsMzExLjI4MiwxMDYuMjE5LDI1Ni4wMDYsMTA2LjIxOXogTTI1Ni4wMDYsMjcwLjkxOGMtMzUuNTM2LDAtNjQuNDQ4LTI4LjkxMi02NC40NDgtNjQuNDQ4DQoJCQljMC0zNS41MzYsMjguOTEyLTY0LjQ0OCw2NC40NDgtNjQuNDQ4YzM1LjUzNiwwLDY0LjQ0OCwyOC45MTIsNjQuNDQ4LDY0LjQ0OFMyOTEuNTQyLDI3MC45MTgsMjU2LjAwNiwyNzAuOTE4eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K\"
                             style=\"width: 23px;\"/>
                        &nbsp;
                        ";
            // line 77
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "categoryUsers", [], "any", false, false, false, 77));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 78
                echo "                            ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 78), "html", null, true);
                echo " -
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "                        <span class=\"text-capitalize\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "localisation", [], "any", false, false, false, 80), "html", null, true);
            echo "</span>
                    </div>
                    <div>
                        <p class=\"titre-apropos-popin\">A PROPOS</p>
                        <p class=\"apropos-popin\">";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "about", [], "any", false, false, false, 84), "html", null, true);
            echo "
                        </p>
                    </div>
                    <a href=\"tel:";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "phone", [], "any", false, false, false, 87), "html", null, true);
            echo "\">
                        <div class=\"call-popin\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i></div>
                    </a>
                    <div class=\"but-popin\" id=\"form";
            // line 90
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 90), "html", null, true);
            echo "\"
                         onclick=\"modalCarousel('modalForm-'+";
            // line 91
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 91), "html", null, true);
            echo ");closeModal('back2-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 91), "html", null, true);
            echo ");modalCarousel('back1-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 91), "html", null, true);
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
        // line 99
        echo "
    ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) || array_key_exists("contacts", $context) ? $context["contacts"] : (function () { throw new RuntimeError('Variable "contacts" does not exist.', 100, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 101
            echo "        <!-- BEGIN POPPIN FORM  -->
        <div id=\"modalForm-";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 102), "html", null, true);
            echo "\" class=\"modal1\" style=\"";
            echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", true, true, false, 102) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 102, $this->source); })()), "contact", [], "any", false, false, false, 102), twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 102))))) ? ("display: flex") : ("display: none"));
            echo "\">
                <div class=\"modal-content\" style=\"display: block;\" id=\"formulaire";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 103), "html", null, true);
            echo "\">
                    <form name=\"form-";
            // line 104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 104), "html", null, true);
            echo "\" id=\"form-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 104), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("question_send", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 104, $this->source); })()), "id", [], "any", false, false, false, 104)]), "html", null, true);
            echo "\" method=\"post\">
                    <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
                        <div class=\"text-left back\" id=\"back1-";
            // line 106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 106), "html", null, true);
            echo "\"
                             onclick=\"closeModal('modalForm-'+";
            // line 107
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 107), "html", null, true);
            echo "); closeModal('back1-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 107), "html", null, true);
            echo "); modalCarousel('back2-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 107), "html", null, true);
            echo ")\"
                             style=\"float: left; height: 90px; line-height: 140px;\">&#8963;
                        </div>
                        <div class=\"text-left back\" id=\"back2-";
            // line 110
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 110), "html", null, true);
            echo "\"
                             onclick=\"closeModal('creneau-content'+";
            // line 111
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 111), "html", null, true);
            echo "); modalCarousel('back1-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 111), "html", null, true);
            echo ");modalCarousel('form-content'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 111), "html", null, true);
            echo "); closeModal('back2-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 111), "html", null, true);
            echo ")\"
                             style=\"float: left; height: 90px; line-height: 140px; display: none;\">&#8963;
                        </div>
                        <div class=\"titre-popin\">";
            // line 114
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "firstname", [], "any", false, false, false, 114), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "lastname", [], "any", false, false, false, 114), "html", null, true);
            echo "</div>
                        <div class=\"soustitre-popin poste2\">";
            // line 115
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "job", [], "any", false, false, false, 115), "html", null, true);
            echo "</div>
                        <div class=\"close\" id=\"close_form\"
                             onclick=\"closeModal('modalForm-'+";
            // line 117
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 117), "html", null, true);
            echo "); closeModal('modal-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 117), "html", null, true);
            echo ")\"></div>
                    </div>
                    <div style=\"background-image: url('";
            // line 119
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/user/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "img", [], "any", false, false, false, 119), "html", null, true);
            echo "');background-position: center;background-size: cover; height: 140px; width: 140px; border-radius: 50%; margin: auto; margin-top: -70px; z-index: 100; position: absolute; left: calc(50% - 70px);\"></div>
                    <div class=\"modal-body\" id=\"form-content";
            // line 120
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 120), "html", null, true);
            echo "\" style=\"margin-top: 60px;";
            echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", true, true, false, 120) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 120, $this->source); })()), "contact", [], "any", false, false, false, 120), twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 120))))) ? ("display: none") : ("display: block"));
            echo "\">
                        <form>
                            <div class=\"bold-OS pb-2\">MOTIF DU RENDEZ-VOUS</div>
                            <select class=\"form-control w-100 mb-3\" name=\"reason\">
                                ";
            // line 124
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "reasons", [], "any", false, false, false, 124));
            foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
                // line 125
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "id", [], "any", false, false, false, 125), "html", null, true);
                echo "\" ";
                echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "reason", [], "any", true, true, false, 125) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 125, $this->source); })()), "reason", [], "any", false, false, false, 125), twig_get_attribute($this->env, $this->source, $context["reason"], "id", [], "any", false, false, false, 125))))) ? ("selected=\"selected\"") : (""));
                echo ">
                                        ";
                // line 126
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reason"], "name", [], "any", false, false, false, 126), "html", null, true);
                echo "
                                    </option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            echo "                            </select>
                            <div class=\"bold-OS pb-2\">INFORMATIONS PERSONNELLES</div>
                            <select class=\"form-control w-100 mb-3\" name=\"civility\">
                                <option value=\"\">Civilité*</option>
                                <option>Professeur</option>
                                <option>Docteur</option>
                                <option>Monsieur</option>
                                <option>Madame</option>
                                ";
            // line 137
            if (twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "civility", [], "any", true, true, false, 137)) {
                // line 138
                echo "                                    <option selected=\"selected\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 138, $this->source); })()), "civility", [], "any", false, false, false, 138), "html", null, true);
                echo "</option>
                                ";
            }
            // line 140
            echo "                            </select>
                            <input type=\"text\" placeholder=\"Nom*\" name=\"lastname\" value=\"";
            // line 141
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "lastname", [], "any", true, true, false, 141)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 141, $this->source); })()), "lastname", [], "any", false, false, false, 141), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"text\" placeholder=\"Prénom*\" name=\"firstname\" value=\"";
            // line 142
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "firstname", [], "any", true, true, false, 142)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 142, $this->source); })()), "firstname", [], "any", false, false, false, 142), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"email\" placeholder=\"Email*\" name=\"mail\" value=\"";
            // line 143
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "mail", [], "any", true, true, false, 143)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 143, $this->source); })()), "mail", [], "any", false, false, false, 143), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"text\" placeholder=\"Téléphone\" name=\"phone\" value=\"";
            // line 144
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "phone", [], "any", true, true, false, 144)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 144, $this->source); })()), "phone", [], "any", false, false, false, 144), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\">
                            <input type=\"text\" placeholder=\"Lieu d'exercice\" name=\"localisation\" value=\"";
            // line 145
            ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "localisation", [], "any", true, true, false, 145)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 145, $this->source); })()), "localisation", [], "any", false, false, false, 145), "html", null, true))) : (print ("")));
            echo "\" class=\"form-control w-100 mb-3\">
                            <span class=\"badge badge-danger\" id=\"error-";
            // line 146
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 146), "html", null, true);
            echo "\" style=\"display: none;\">Veuillez remplir correctement le formulaire.</span>
                            <div class=\"but-popin-alert\"
                                 onclick=\"checkFormValid(";
            // line 148
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 148), "html", null, true);
            echo ");\">
                                Choisir une date et une heure
                            </div>
                            <div class=\"mention\">*champs obligatoires</div>
                    </div>
                    <div class=\"modal-body\" id=\"creneau-content";
            // line 153
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 153), "html", null, true);
            echo "\"
                         style=\"margin-top: 3rem;";
            // line 154
            echo (((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "contact", [], "any", true, true, false, 154) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 154, $this->source); })()), "contact", [], "any", false, false, false, 154), twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 154))))) ? ("display: inline-block") : ("display: none"));
            echo ";\">
                        <div>
                            <div class=\"wrapper\">
                                <div id=\"month\">
                                <span class=\"text-1\" style=\"\">
                                    ";
            // line 159
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 159, $this->source); })()), "endDate", [], "any", false, false, false, 159), "medium", "MMMM", null, "gregorian", "fr"), "html", null, true);
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
            // line 169
            echo "                                ";
            $context["difference"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 169, $this->source); })()), "endDate", [], "any", false, false, false, 169)), "diff", [0 => twig_date_converter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 169, $this->source); })()))], "method", false, false, false, 169);
            // line 170
            echo "                                ";
            $context["leftDays"] = (twig_get_attribute($this->env, $this->source, (isset($context["difference"]) || array_key_exists("difference", $context) ? $context["difference"] : (function () { throw new RuntimeError('Variable "difference" does not exist.', 170, $this->source); })()), "days", [], "any", false, false, false, 170) + 1);
            // line 171
            echo "                                ";
            $context["date"] = (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 171, $this->source); })());
            // line 172
            echo "                                ";
            $context["firstDay"] = twig_date_format_filter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 172, $this->source); })()), "d");
            // line 173
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["leftDays"]) || array_key_exists("leftDays", $context) ? $context["leftDays"] : (function () { throw new RuntimeError('Variable "leftDays" does not exist.', 173, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 174
                echo "                                    <div style=\"display: inline-block\"
                                         onclick=\"openCalendar('";
                // line 175
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 175, $this->source); })()), "D"), "html", null, true);
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 175), "html", null, true);
                echo "');\">
                                        <span class=\"day\">";
                // line 176
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 176, $this->source); })()), "full", "none", "", null, "gregorian", "fr"), 0, 3), "html", null, true);
                echo "</span>

                                        <label style=\"padding-left: 10px;\" class=\"btn btn-secondary mb-3 round ";
                // line 178
                echo (((0 === twig_compare($context["i"], 1))) ? ("active") : (""));
                echo "\" >
                                            <input type=\"radio\"
                                                   autocomplete=\"off\" ";
                // line 180
                echo (((0 === twig_compare($context["i"], 1))) ? ("checked") : (""));
                echo ">
                                            ";
                // line 181
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 181, $this->source); })()), "d"), "html", null, true);
                echo "
                                        </label>
                                    </div>
                                    ";
                // line 184
                $context["date"] = twig_date_modify_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 184, $this->source); })()), "+1 day");
                // line 185
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 186
            echo "                            </div>
                            <div class=\"bold-OS pb-2\">MEETING DE ";
            // line 187
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatTime($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 187, $this->source); })()), "durationMeeting", [], "any", false, false, false, 187), "medium", "mm"), "html", null, true);
            echo "
                                MN
                            </div>

                            <div class=\"btn-group-toggle-hour btn-group-toggle\" data-toggle=\"buttons\">
                                ";
            // line 192
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "meetings", [], "any", false, false, false, 192));
            foreach ($context['_seq'] as $context["_key"] => $context["meeting"]) {
                // line 193
                echo "                                    <label class=\"btn ";
                echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isOpen", [], "any", false, false, false, 193), true))) ? ("btn-secondary") : ("btn-outline-secondary disabled"));
                echo " mb-3 planning ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 193), "D"), "html", null, true);
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 193), "html", null, true);
                echo "\"
                                           style=\"display: ";
                // line 194
                echo (((0 === twig_compare(twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 194), "d"), (isset($context["firstDay"]) || array_key_exists("firstDay", $context) ? $context["firstDay"] : (function () { throw new RuntimeError('Variable "firstDay" does not exist.', 194, $this->source); })())))) ? ("block") : ("none"));
                echo "\"
                                            ";
                // line 195
                echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["meeting"], "isOpen", [], "any", false, false, false, 195), true))) ? ("") : ("disabled"));
                echo "
                                    >
                                        <input type=\"radio\" name=\"meeting\" autocomplete=\"off\"
                                               value=\"";
                // line 198
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "id", [], "any", false, false, false, 198), "html", null, true);
                echo "\" required>
                                        ";
                // line 199
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["meeting"], "startDate", [], "any", false, false, false, 199), "H:i"), "html", null, true);
                echo "
                                    </label>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meeting'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 202
            echo "                            </div>
                        </div>
                        <input class=\"but-popin-alert\" type=\"submit\" value=\"Valider le rendez-vous\" id=\"submit-";
            // line 204
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", [], "any", false, false, false, 204), "html", null, true);
            echo "\">
                    </div>
                    <div class=\"modal-body\" id=\"valid-content\" style=\"margin-top: 40px;display: none;\">
                        <div class=\"text-center pt-5\"><img src=\"data:image/svg+xml;base64,
                  PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0yNTYsMEMxMTQuODMzLDAsMCwxMTQuODMzLDAsMjU2czExNC44MzMsMjU2LDI1NiwyNTZzMjU2LTExNC44NTMsMjU2LTI1NlMzOTcuMTY3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yNzUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcyNSwzOS42NTksMjU2LDM5LjY1OWMxMTkuMjk1LDAsMjE2LjM0MSw5Ny4wNDYsMjE2LjM0MSwyMTYuMzQxICAgIFMzNzUuMjc1LDQ3Mi4zNDEsMjU2LDQ3Mi4zNDF6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojM0RCMzlFIj48L3BhdGg+Cgk8L2c+CjwvZz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zNzMuNDUxLDE2Ni45NjVjLTguMDcxLTcuMzM3LTIwLjYyMy02Ljc2Mi0yNy45OTksMS4zNDhMMjI0LjQ5MSwzMDEuNTA5bC01OC40MzgtNTkuNDA5ICAgIGMtNy43MTQtNy44MTMtMjAuMjQ2LTcuOTMyLTI4LjAzOS0wLjIzOGMtNy44MTMsNy42NzQtNy45MzIsMjAuMjI2LTAuMjM4LDI4LjAzOWw3My4xNTEsNzQuMzYxICAgIGMzLjc0OCwzLjgwNyw4LjgyNCw1LjkyOSwxNC4xMzgsNS45MjljMC4xMTksMCwwLjI1OCwwLDAuMzc3LDAuMDJjNS40NzMtMC4xMTksMTAuNjI5LTIuNDU5LDE0LjI5Ny02LjUwNGwxMzUuMDU5LTE0OC43MjIgICAgQzM4Mi4xNTYsMTg2Ljg1NCwzODEuNTYxLDE3NC4zMjIsMzczLjQ1MSwxNjYuOTY1eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6IzNEQjM5RSI+PC9wYXRoPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=\"
                                                           width=\"60\"/></div>
                        <h2 class=\"p-3 bold-OS text-center w-100\">Demande envoyée</h2>
                        <div class=\"p-3 content-accept text-center\">Votre demande de rendez-vous a bien été prise en
                            compte.Vous
                            receverez dans les plus brefs délais une confirmation par email.<br><br><span
                                    class=\"bold-OS\">L’équipe Incyte</span>
                        </div>
                        <div class=\"but-popin-alert\" id=\"home\">Retour à l'accueil</div>
                    </div>
                    </form>

                </div>
        </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 224
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 227
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 228
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        ";
        // line 229
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("slider");
        echo "
        ";
        // line 230
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
                        items: 2,
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

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
        return array (  623 => 230,  619 => 229,  614 => 228,  604 => 227,  593 => 224,  567 => 204,  563 => 202,  554 => 199,  550 => 198,  544 => 195,  540 => 194,  532 => 193,  528 => 192,  520 => 187,  517 => 186,  511 => 185,  509 => 184,  503 => 181,  499 => 180,  494 => 178,  489 => 176,  484 => 175,  481 => 174,  476 => 173,  473 => 172,  470 => 171,  467 => 170,  464 => 169,  452 => 159,  444 => 154,  440 => 153,  432 => 148,  427 => 146,  423 => 145,  419 => 144,  415 => 143,  411 => 142,  407 => 141,  404 => 140,  398 => 138,  396 => 137,  386 => 129,  377 => 126,  370 => 125,  366 => 124,  357 => 120,  352 => 119,  345 => 117,  340 => 115,  334 => 114,  322 => 111,  318 => 110,  308 => 107,  304 => 106,  295 => 104,  291 => 103,  285 => 102,  282 => 101,  278 => 100,  275 => 99,  257 => 91,  253 => 90,  247 => 87,  241 => 84,  233 => 80,  224 => 78,  220 => 77,  212 => 72,  206 => 71,  200 => 68,  195 => 67,  189 => 64,  186 => 63,  182 => 62,  174 => 56,  163 => 51,  157 => 50,  150 => 47,  145 => 46,  141 => 45,  134 => 40,  130 => 38,  128 => 37,  105 => 17,  99 => 14,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Congrès - Incyte{% endblock %}

{% block body %}
    <header class=\"\">
        <div class=\"hcontact\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"text-left back\" style=\"float: left; height: 110px; line-height: 130px;\" id=\"back\"><a
                                    onclick=\"window.history.back();\" style=\"color: #FFF\">&#8963;</a></div>
                        <h1 class=\"text-right\" style=\"padding-top: 30px;display: inline-block; float: right;\"><img
                                    src=\"{{ asset('img/logo-blanc.png') }}\" width=\"120\" alt=\"\"/></h1>
                    </div>
                    <div class=\"col-12\">
                        <form method=\"post\" action=\"{{ path('congres_contact', {id: congres.id}) }}\">
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
                    {% if contacts is empty %}
                        <h3 class=\"p-5\">Aucun contact</h3>
                    {% endif %}
                </div>
            </div>
        </div>
        <div id=\"carrousel\">
            <div class=\"owl-carousel owl-theme\">
                {% for contact in contacts %}
                    <div class=\"img\" onclick=\"modalCarousel('modal-'+{{ contact.id }})\">
                        <div style=\"background-image: url('{{ asset('uploads/img/user/') }}{{ contact.img }}');\"
                             class=\"img-carrousel\"></div>
                        <div style=\"padding: 10px 20px;\">
                            <div class=\"name\">{{ contact.firstname }} {{ contact.lastname }}</div>
                            <div class=\"poste\">{{ contact.job }}</div>
                            <div style=\"text-align: right\">&#8594;</div>
                        </div>
                    </div>
                {% endfor %}
            </div>
            <div class=\"text-center\">
                <div class=\"status\"></div>
            </div>
        </div>
    </section>
    {% for contact in contacts %}
        <!-- BEGIN : POPIN CONTACT -->
        <div id=\"modal-{{ contact.id }}\" class=\"modal1\">
            <div class=\"modal-content\" id=\"fiche\">

                <div style=\"background-image: url('{{ asset('uploads/img/user/') }}{{ contact.img }}');background-position: center;background-size: cover; min-height: 300px; border-bottom-left-radius: 20px;display: inline-block; width: 100%;\">
                    <div class=\"close\" onclick=\"closeModal('modal-'+{{ contact.id }})\"></div>
                </div>
                <div class=\"modal-body\">
                    <div class=\"name-popin\">{{ contact.firstname }} {{ contact.lastname }}</div>
                    <div class=\"poste-popin poste\">{{ contact.job }}</div>
                    <div class=\"lieu-popin\">
                        <img src=\"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MjUuOTUxLDg5LjAyMUMzODYuODY0LDMyLjQ1MSwzMjQuOTE3LDAsMjU2LjAwNiwwUzEyNS4xNDgsMzIuNDUxLDg2LjA2MSw4OS4wMjENCgkJCWMtMzguODk1LDU2LjI4NC00Ny44NzYsMTI3LjU0MS0yNC4wNzIsMTkwLjQ5NmM2LjM2NywxNy4xOTIsMTYuNDg4LDMzLjg5NSwzMC4wMSw0OS41NDdsMTUwLjM3OCwxNzYuNjM0DQoJCQljMy40MDEsMy45OTgsOC4zODQsNi4zMDIsMTMuNjI5LDYuMzAyYzUuMjQ1LDAsMTAuMjI4LTIuMzAzLDEzLjYyOS02LjMwMmwxNTAuMzM2LTE3Ni41ODYNCgkJCWMxMy41ODItMTUuNzQyLDIzLjY5LTMyLjQyNywzMC4wMDQtNDkuNDgxQzQ3My44MjcsMjE2LjU2Miw0NjQuODQ2LDE0NS4zMDUsNDI1Ljk1MSw4OS4wMjF6IE00MTYuNDUxLDI2Ny4wOTMNCgkJCWMtNC44NjksMTMuMTU4LTEyLjgxOCwyNi4xNjctMjMuNjEzLDM4LjY4Yy0wLjAzLDAuMDMtMC4wNiwwLjA2LTAuMDg0LDAuMDk2TDI1Ni4wMDYsNDY2LjQ4N0wxMTkuMTc0LDMwNS43NjgNCgkJCWMtMTAuNzg5LTEyLjUwMi0xOC43MzgtMjUuNTEtMjMuNjU1LTM4Ljc5NGMtMTkuNjg2LTUyLjA2NS0xMi4yMTUtMTEwLjk4MSwxOS45OTEtMTU3LjU5Mg0KCQkJYzMyLjMwNy00Ni43Niw4My41MTktNzMuNTc4LDE0MC40OTYtNzMuNTc4YzU2Ljk3NiwwLDEwOC4xODIsMjYuODE3LDE0MC40OSw3My41NzgNCgkJCUM0MjguNzA4LDE1NS45OTMsNDM2LjE4NSwyMTQuOTA5LDQxNi40NTEsMjY3LjA5M3oiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTI1Ni4wMDYsMTA2LjIxOWMtNTUuMjc2LDAtMTAwLjI1Miw0NC45Ny0xMDAuMjUyLDEwMC4yNTJzNDQuOTcsMTAwLjI1MiwxMDAuMjUyLDEwMC4yNTJzMTAwLjI1Mi00NC45NywxMDAuMjUyLTEwMC4yNTINCgkJCUMzNTYuMjU4LDE1MS4xOTUsMzExLjI4MiwxMDYuMjE5LDI1Ni4wMDYsMTA2LjIxOXogTTI1Ni4wMDYsMjcwLjkxOGMtMzUuNTM2LDAtNjQuNDQ4LTI4LjkxMi02NC40NDgtNjQuNDQ4DQoJCQljMC0zNS41MzYsMjguOTEyLTY0LjQ0OCw2NC40NDgtNjQuNDQ4YzM1LjUzNiwwLDY0LjQ0OCwyOC45MTIsNjQuNDQ4LDY0LjQ0OFMyOTEuNTQyLDI3MC45MTgsMjU2LjAwNiwyNzAuOTE4eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K\"
                             style=\"width: 23px;\"/>
                        &nbsp;
                        {% for category in contact.categoryUsers %}
                            {{ category.name }} -
                        {% endfor %}
                        <span class=\"text-capitalize\">{{ contact.localisation }}</span>
                    </div>
                    <div>
                        <p class=\"titre-apropos-popin\">A PROPOS</p>
                        <p class=\"apropos-popin\">{{ contact.about }}
                        </p>
                    </div>
                    <a href=\"tel:{{ contact.phone }}\">
                        <div class=\"call-popin\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i></div>
                    </a>
                    <div class=\"but-popin\" id=\"form{{ contact.id }}\"
                         onclick=\"modalCarousel('modalForm-'+{{ contact.id }});closeModal('back2-'+{{ contact.id }});modalCarousel('back1-'+{{ contact.id }})\">
                        Prendre rendez-vous
                    </div>

                </div>
            </div>
        </div>
    {% endfor %}

    {% for contact in contacts %}
        <!-- BEGIN POPPIN FORM  -->
        <div id=\"modalForm-{{ contact.id }}\" class=\"modal1\" style=\"{{ (customer.contact is defined and customer.contact == contact.id) ? 'display: flex' : 'display: none'}}\">
                <div class=\"modal-content\" style=\"display: block;\" id=\"formulaire{{ contact.id }}\">
                    <form name=\"form-{{ contact.id }}\" id=\"form-{{ contact.id }}\" action=\"{{ path('question_send', {id: congres.id} )}}\" method=\"post\">
                    <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
                        <div class=\"text-left back\" id=\"back1-{{ contact.id }}\"
                             onclick=\"closeModal('modalForm-'+{{ contact.id }}); closeModal('back1-'+{{ contact.id }}); modalCarousel('back2-'+{{ contact.id }})\"
                             style=\"float: left; height: 90px; line-height: 140px;\">&#8963;
                        </div>
                        <div class=\"text-left back\" id=\"back2-{{ contact.id }}\"
                             onclick=\"closeModal('creneau-content'+{{ contact.id }}); modalCarousel('back1-'+{{ contact.id }});modalCarousel('form-content'+{{ contact.id }}); closeModal('back2-'+{{ contact.id }})\"
                             style=\"float: left; height: 90px; line-height: 140px; display: none;\">&#8963;
                        </div>
                        <div class=\"titre-popin\">{{ contact.firstname }} {{ contact.lastname }}</div>
                        <div class=\"soustitre-popin poste2\">{{ contact.job }}</div>
                        <div class=\"close\" id=\"close_form\"
                             onclick=\"closeModal('modalForm-'+{{ contact.id }}); closeModal('modal-'+{{ contact.id }})\"></div>
                    </div>
                    <div style=\"background-image: url('{{ asset('uploads/img/user/') }}{{ contact.img }}');background-position: center;background-size: cover; height: 140px; width: 140px; border-radius: 50%; margin: auto; margin-top: -70px; z-index: 100; position: absolute; left: calc(50% - 70px);\"></div>
                    <div class=\"modal-body\" id=\"form-content{{ contact.id }}\" style=\"margin-top: 60px;{{ (customer.contact is defined and customer.contact == contact.id) ? 'display: none' : 'display: block'}}\">
                        <form>
                            <div class=\"bold-OS pb-2\">MOTIF DU RENDEZ-VOUS</div>
                            <select class=\"form-control w-100 mb-3\" name=\"reason\">
                                {% for reason in contact.reasons %}
                                    <option value=\"{{ reason.id }}\" {{ (customer.reason is defined and customer.reason == reason.id) ? 'selected=\"selected\"' : ''}}>
                                        {{ reason.name }}
                                    </option>
                                {% endfor %}
                            </select>
                            <div class=\"bold-OS pb-2\">INFORMATIONS PERSONNELLES</div>
                            <select class=\"form-control w-100 mb-3\" name=\"civility\">
                                <option value=\"\">Civilité*</option>
                                <option>Professeur</option>
                                <option>Docteur</option>
                                <option>Monsieur</option>
                                <option>Madame</option>
                                {% if customer.civility is defined %}
                                    <option selected=\"selected\">{{ customer.civility }}</option>
                                {% endif %}
                            </select>
                            <input type=\"text\" placeholder=\"Nom*\" name=\"lastname\" value=\"{{ (customer.lastname is defined) ? customer.lastname : ''}}\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"text\" placeholder=\"Prénom*\" name=\"firstname\" value=\"{{ (customer.firstname is defined) ? customer.firstname : ''}}\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"email\" placeholder=\"Email*\" name=\"mail\" value=\"{{ (customer.mail is defined) ? customer.mail : ''}}\" class=\"form-control w-100 mb-3\" required>
                            <input type=\"text\" placeholder=\"Téléphone\" name=\"phone\" value=\"{{ (customer.phone is defined) ? customer.phone : ''}}\" class=\"form-control w-100 mb-3\">
                            <input type=\"text\" placeholder=\"Lieu d'exercice\" name=\"localisation\" value=\"{{ (customer.localisation is defined) ? customer.localisation : ''}}\" class=\"form-control w-100 mb-3\">
                            <span class=\"badge badge-danger\" id=\"error-{{ contact.id }}\" style=\"display: none;\">Veuillez remplir correctement le formulaire.</span>
                            <div class=\"but-popin-alert\"
                                 onclick=\"checkFormValid({{ contact.id }});\">
                                Choisir une date et une heure
                            </div>
                            <div class=\"mention\">*champs obligatoires</div>
                    </div>
                    <div class=\"modal-body\" id=\"creneau-content{{ contact.id }}\"
                         style=\"margin-top: 3rem;{{ (customer.contact is defined and customer.contact == contact.id) ? 'display: inline-block' : 'display: none'}};\">
                        <div>
                            <div class=\"wrapper\">
                                <div id=\"month\">
                                <span class=\"text-1\" style=\"\">
                                    {{ congres.endDate|format_date(pattern='MMMM', locale='fr') }}
                                </span>
                                </div>
                            </div>
                            <div id=\"nav\" style=\"display: inline-block; float: right; font-size: 1.5rem;\">
                                <a href=\"#left\" class=\"left\"><i class=\"fa fa-angle-left\"></i>&nbsp;</a>
                                <a href=\"#right\" class=\"right\">&nbsp;<i class=\"fa fa-angle-right\"></i></a>
                            </div>
                            <div class=\"btn-group-toggle scroll text-center\" data-toggle=\"buttons\">
                                {# List days #}
                                {% set difference = date(congres.endDate).diff(date(startDate)) %}
                                {% set leftDays = difference.days + 1 %}
                                {% set date = startDate %}
                                {% set firstDay = startDate|date('d') %}
                                {% for i in 1..leftDays %}
                                    <div style=\"display: inline-block\"
                                         onclick=\"openCalendar('{{ date|date('D') }}{{ contact.id }}');\">
                                        <span class=\"day\">{{ date|format_datetime('full', 'none', locale='fr')|slice(0, 3) }}</span>

                                        <label style=\"padding-left: 10px;\" class=\"btn btn-secondary mb-3 round {{ (i == 1) ? 'active': '' }}\" >
                                            <input type=\"radio\"
                                                   autocomplete=\"off\" {{ (i == 1) ? 'checked': '' }}>
                                            {{ date|date('d') }}
                                        </label>
                                    </div>
                                    {% set date = date|date_modify(\"+1 day\") %}
                                {% endfor %}
                            </div>
                            <div class=\"bold-OS pb-2\">MEETING DE {{ congres.durationMeeting|format_time(pattern='mm') }}
                                MN
                            </div>

                            <div class=\"btn-group-toggle-hour btn-group-toggle\" data-toggle=\"buttons\">
                                {% for meeting in contact.meetings %}
                                    <label class=\"btn {{ meeting.isOpen == true ? 'btn-secondary' : 'btn-outline-secondary disabled' }} mb-3 planning {{ meeting.startDate|date('D') }}{{ contact.id }}\"
                                           style=\"display: {{ (meeting.startDate|date('d') == firstDay) ? 'block': 'none' }}\"
                                            {{ meeting.isOpen == true ? '' : 'disabled' }}
                                    >
                                        <input type=\"radio\" name=\"meeting\" autocomplete=\"off\"
                                               value=\"{{ meeting.id }}\" required>
                                        {{ meeting.startDate|date('H:i') }}
                                    </label>
                                {% endfor %}
                            </div>
                        </div>
                        <input class=\"but-popin-alert\" type=\"submit\" value=\"Valider le rendez-vous\" id=\"submit-{{ contact.id }}\">
                    </div>
                    <div class=\"modal-body\" id=\"valid-content\" style=\"margin-top: 40px;display: none;\">
                        <div class=\"text-center pt-5\"><img src=\"data:image/svg+xml;base64,
                  PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0yNTYsMEMxMTQuODMzLDAsMCwxMTQuODMzLDAsMjU2czExNC44MzMsMjU2LDI1NiwyNTZzMjU2LTExNC44NTMsMjU2LTI1NlMzOTcuMTY3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yNzUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcyNSwzOS42NTksMjU2LDM5LjY1OWMxMTkuMjk1LDAsMjE2LjM0MSw5Ny4wNDYsMjE2LjM0MSwyMTYuMzQxICAgIFMzNzUuMjc1LDQ3Mi4zNDEsMjU2LDQ3Mi4zNDF6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojM0RCMzlFIj48L3BhdGg+Cgk8L2c+CjwvZz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zNzMuNDUxLDE2Ni45NjVjLTguMDcxLTcuMzM3LTIwLjYyMy02Ljc2Mi0yNy45OTksMS4zNDhMMjI0LjQ5MSwzMDEuNTA5bC01OC40MzgtNTkuNDA5ICAgIGMtNy43MTQtNy44MTMtMjAuMjQ2LTcuOTMyLTI4LjAzOS0wLjIzOGMtNy44MTMsNy42NzQtNy45MzIsMjAuMjI2LTAuMjM4LDI4LjAzOWw3My4xNTEsNzQuMzYxICAgIGMzLjc0OCwzLjgwNyw4LjgyNCw1LjkyOSwxNC4xMzgsNS45MjljMC4xMTksMCwwLjI1OCwwLDAuMzc3LDAuMDJjNS40NzMtMC4xMTksMTAuNjI5LTIuNDU5LDE0LjI5Ny02LjUwNGwxMzUuMDU5LTE0OC43MjIgICAgQzM4Mi4xNTYsMTg2Ljg1NCwzODEuNTYxLDE3NC4zMjIsMzczLjQ1MSwxNjYuOTY1eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6IzNEQjM5RSI+PC9wYXRoPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=\"
                                                           width=\"60\"/></div>
                        <h2 class=\"p-3 bold-OS text-center w-100\">Demande envoyée</h2>
                        <div class=\"p-3 content-accept text-center\">Votre demande de rendez-vous a bien été prise en
                            compte.Vous
                            receverez dans les plus brefs délais une confirmation par email.<br><br><span
                                    class=\"bold-OS\">L’équipe Incyte</span>
                        </div>
                        <div class=\"but-popin-alert\" id=\"home\">Retour à l'accueil</div>
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
                        items: 2,
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
    {% endblock %}
", "congres/contact.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/contact.html.twig");
    }
}
