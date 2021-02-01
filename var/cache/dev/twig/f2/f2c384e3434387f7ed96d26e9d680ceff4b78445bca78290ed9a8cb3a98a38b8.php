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

/* congres/home.html.twig */
class __TwigTemplate_ed7dc1c049ddd705fa7b4fc10d617c1cdc5d1c05f3c04f9531f95db418c84394 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "congres/home.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "congres/home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "congres/home.html.twig", 1);
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
        echo "    <header>
        <div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <h1 class=\"text-right\" style=\"position: absolute;right: 20px;top: 30px;\"><img
                                    src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-bleu.png"), "html", null, true);
        echo "\" width=\"120\" alt=\"\"/></h1>
                        <div class=\"logo-app\"><img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-app.png"), "html", null, true);
        echo "\" width=\"150\" alt=\"\"/></div>
                        <div class=\"nom-event\">";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 14, $this->source); })()), "name", [], "any", false, false, false, 14), "html", null, true);
        echo "</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class=\"container\">
            <div class=\"row\">
                ";
        // line 23
        if ((0 === twig_compare((isset($context["eventStart"]) || array_key_exists("eventStart", $context) ? $context["eventStart"] : (function () { throw new RuntimeError('Variable "eventStart" does not exist.', 23, $this->source); })()), true))) {
            // line 24
            echo "                    <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;\">
                        ";
            // line 25
            if ((0 === twig_compare((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 25, $this->source); })()), true))) {
                // line 26
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_documents", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 26, $this->source); })()), "id", [], "any", false, false, false, 26)]), "html", null, true);
                echo "\">
                        ";
            }
            // line 28
            echo "                        <div class=\"bloc-home-document\"
                                ";
            // line 29
            if ((0 !== twig_compare((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 29, $this->source); })()), true))) {
                // line 30
                echo "                                    onclick=\"openModal('myModal_doc')\"
                                ";
            }
            // line 32
            echo "                             id=\"btn_doc\">
                            <h2 class=\"titre-home\">Télécharger nos documents</h2>
                            <div class=\"texte-home\">Retrouvez les documents disponibles sur notre stand en format
                                éléctronique.
                            </div>
                            <i class=\"fa fa-angle-right but-doc\"></i></div>
                            ";
            // line 38
            if ((0 === twig_compare((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 38, $this->source); })()), true))) {
                // line 39
                echo "                                </a>
                            ";
            }
            // line 41
            echo "                    </div>
                ";
        } else {
            // line 43
            echo "                    <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;filter: grayscale(90%);\">
                        <div class=\"bloc-home-document\" id=\"btn_doc\" onclick=\"openModal('toCome')\">
                            <h2 class=\"titre-home\">Télécharger nos documents</h2>
                            <div class=\"texte-home\">Tous nos documents seront disponibles à l'ouverture du congrès.
                            </div>
                            <i class=\"fa fa-angle-right but-doc\"></i>
                        </div>
                    </div>
                ";
        }
        // line 52
        echo "
                <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;\">
                        <a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_contact", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 54, $this->source); })()), "id", [], "any", false, false, false, 54)]), "html", null, true);
        echo "\">
                        <div class=\"bloc-home-contact\" id=\"btn_contact\"><h2 class=\"titre-home\">Prendre rendez-vous</h2>
                            <div class=\"texte-home\">Prenez rendez-vous avec un membre de l'équipe Incyte.</div>
                            <i class=\"fa fa-angle-left but-contact\"></i></div>
                        </a>
                    </div>
            </div>
        </div>
    </section>
    <!-- BEGIN : Modal Pharma -->
    <div id=\"myModal_doc\" class=\"modal1\">
        <div class=\"modal-content-alert\">
            <div class=\"close\" id=\"close_doc\" onclick=\"closeModal('myModal_doc')\"></div>
            <div class=\"modal-body\">
                <div>
                    <p class=\"titre-popin-alert\">Télécharger nos documents</p>
                    <p class=\"content-popin-alert\">Pour télécharger nos documents vous devez saisir le code de sécurité
                        disponible sur notre stand :</p>
                    ";
        // line 72
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formSecurity"]) || array_key_exists("formSecurity", $context) ? $context["formSecurity"] : (function () { throw new RuntimeError('Variable "formSecurity" does not exist.', 72, $this->source); })()), 'form_start');
        echo "
                    ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["formSecurity"]) || array_key_exists("formSecurity", $context) ? $context["formSecurity"] : (function () { throw new RuntimeError('Variable "formSecurity" does not exist.', 73, $this->source); })()), 'errors');
        echo "

                    ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formSecurity"]) || array_key_exists("formSecurity", $context) ? $context["formSecurity"] : (function () { throw new RuntimeError('Variable "formSecurity" does not exist.', 75, $this->source); })()), "code", [], "any", false, false, false, 75), 'row');
        echo "

                    ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formSecurity"]) || array_key_exists("formSecurity", $context) ? $context["formSecurity"] : (function () { throw new RuntimeError('Variable "formSecurity" does not exist.', 77, $this->source); })()), "submit", [], "any", false, false, false, 77), 'row', ["label" => "Valider le code"]);
        echo "
                    ";
        // line 78
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formSecurity"]) || array_key_exists("formSecurity", $context) ? $context["formSecurity"] : (function () { throw new RuntimeError('Variable "formSecurity" does not exist.', 78, $this->source); })()), 'form_end');
        echo "
                </div>
            </div>
        </div>
    </div>
    <div id=\"toCome\" class=\"modal1\">
        <div class=\"modal-content-alert\">
            <div class=\"close\" id=\"close_doc\" onclick=\"closeModal('toCome')\"></div>
            <div class=\"modal-body\">
                <div>
                    <p class=\"titre-popin-alert\">Tous nos documents seront disponibles à l'ouverture du congrès</p>
                    <p class=\"content-popin-alert\">Vous pouvez prendre rendez-vous avec un de nos conseiller</p>
                </div>
            </div>
        </div>
    </div>
";
        // line 94
        $this->loadTemplate("congres/_footerML.html.twig", "congres/home.html.twig", 94)->display($context);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 97
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 98
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 99
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("modal");
        echo "
    <script>
        var modal_doc = document.getElementById(\"myModal_doc\");

        function openModal(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"block\";
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
        return "congres/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 99,  250 => 98,  240 => 97,  230 => 94,  211 => 78,  207 => 77,  202 => 75,  197 => 73,  193 => 72,  172 => 54,  168 => 52,  157 => 43,  153 => 41,  149 => 39,  147 => 38,  139 => 32,  135 => 30,  133 => 29,  130 => 28,  124 => 26,  122 => 25,  119 => 24,  117 => 23,  105 => 14,  101 => 13,  97 => 12,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Congrès - Incyte{% endblock %}

{% block body %}
    <header>
        <div>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <h1 class=\"text-right\" style=\"position: absolute;right: 20px;top: 30px;\"><img
                                    src=\"{{ asset('img/logo-bleu.png') }}\" width=\"120\" alt=\"\"/></h1>
                        <div class=\"logo-app\"><img src=\"{{ asset('img/logo-app.png') }}\" width=\"150\" alt=\"\"/></div>
                        <div class=\"nom-event\">{{ congres.name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class=\"container\">
            <div class=\"row\">
                {% if eventStart == true %}
                    <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;\">
                        {% if code == true %}
                            <a href=\"{{ path('congres_documents', {id: congres.id}) }}\">
                        {% endif %}
                        <div class=\"bloc-home-document\"
                                {% if code != true %}
                                    onclick=\"openModal('myModal_doc')\"
                                {% endif %}
                             id=\"btn_doc\">
                            <h2 class=\"titre-home\">Télécharger nos documents</h2>
                            <div class=\"texte-home\">Retrouvez les documents disponibles sur notre stand en format
                                éléctronique.
                            </div>
                            <i class=\"fa fa-angle-right but-doc\"></i></div>
                            {% if code == true %}
                                </a>
                            {% endif %}
                    </div>
                {% else %}
                    <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;filter: grayscale(90%);\">
                        <div class=\"bloc-home-document\" id=\"btn_doc\" onclick=\"openModal('toCome')\">
                            <h2 class=\"titre-home\">Télécharger nos documents</h2>
                            <div class=\"texte-home\">Tous nos documents seront disponibles à l'ouverture du congrès.
                            </div>
                            <i class=\"fa fa-angle-right but-doc\"></i>
                        </div>
                    </div>
                {% endif %}

                <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;\">
                        <a href=\"{{ path('congres_contact', {id: congres.id}) }}\">
                        <div class=\"bloc-home-contact\" id=\"btn_contact\"><h2 class=\"titre-home\">Prendre rendez-vous</h2>
                            <div class=\"texte-home\">Prenez rendez-vous avec un membre de l'équipe Incyte.</div>
                            <i class=\"fa fa-angle-left but-contact\"></i></div>
                        </a>
                    </div>
            </div>
        </div>
    </section>
    <!-- BEGIN : Modal Pharma -->
    <div id=\"myModal_doc\" class=\"modal1\">
        <div class=\"modal-content-alert\">
            <div class=\"close\" id=\"close_doc\" onclick=\"closeModal('myModal_doc')\"></div>
            <div class=\"modal-body\">
                <div>
                    <p class=\"titre-popin-alert\">Télécharger nos documents</p>
                    <p class=\"content-popin-alert\">Pour télécharger nos documents vous devez saisir le code de sécurité
                        disponible sur notre stand :</p>
                    {{ form_start(formSecurity) }}
                    {{ form_errors(formSecurity) }}

                    {{ form_row(formSecurity.code) }}

                    {{ form_row(formSecurity.submit, { 'label': 'Valider le code' }) }}
                    {{ form_end(formSecurity) }}
                </div>
            </div>
        </div>
    </div>
    <div id=\"toCome\" class=\"modal1\">
        <div class=\"modal-content-alert\">
            <div class=\"close\" id=\"close_doc\" onclick=\"closeModal('toCome')\"></div>
            <div class=\"modal-body\">
                <div>
                    <p class=\"titre-popin-alert\">Tous nos documents seront disponibles à l'ouverture du congrès</p>
                    <p class=\"content-popin-alert\">Vous pouvez prendre rendez-vous avec un de nos conseiller</p>
                </div>
            </div>
        </div>
    </div>
{% include 'congres/_footerML.html.twig' %}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {{ encore_entry_script_tags('modal') }}
    <script>
        var modal_doc = document.getElementById(\"myModal_doc\");

        function openModal(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"block\";
        }
        function closeModal(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"none\";
        }
    </script>
{% endblock %}

", "congres/home.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/home.html.twig");
    }
}
