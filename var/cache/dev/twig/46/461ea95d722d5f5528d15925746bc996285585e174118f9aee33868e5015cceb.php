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

/* meeting/validationRefuseMeeting.html.twig */
class __TwigTemplate_25f4b1c60db9f02ad9d09b942406abad50b6e35b13c5251190945e9318e17d02 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "meeting/validationRefuseMeeting.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "meeting/validationRefuseMeeting.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "meeting/validationRefuseMeeting.html.twig", 1);
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
        echo "<body>
<header>
    <div>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <h1 class=\"text-right\" style=\"position: absolute;right: 20px;top: 30px;\"><img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-bleu.png"), "html", null, true);
        echo "\" width=\"120\" alt=\"\"/></h1>
                    <div class=\"logo-app\"><img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-app.png"), "html", null, true);
        echo "\" width=\"130\" alt=\"\"/></div>
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
            <div class=\"col-12 text-center\">
                <div class=\"p-5\"><img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/picto-refus.jpg"), "html", null, true);
        echo "\" style=\"width: 160px;\" alt=\"\"/></div>
                <h2 class=\"p-3 bold-OS\">";
        // line 25
        echo (((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 25, $this->source); })()), "customer"))) ? ("Annuler") : ("Refuser"));
        echo " le rendez-vous</h2>
                <div class=\"p-3 content-accept font-weight-bold\">Votre ";
        // line 26
        echo (((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 26, $this->source); })()), "customer"))) ? ("annulation a bien été prise en compte") : ("refus a bien été pris en compte"));
        echo ".</div>
                <div class=\"p-3 content-accept \">
                    Si vous souhaitez plannifier un nouveau rendez-vous, cliquez sur le lien ci-dessous.
                </div>
                ";
        // line 30
        if ((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 30, $this->source); })()), "customer"))) {
            // line 31
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_contact", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 31, $this->source); })()), "id", [], "any", false, false, false, 31), "firstname" => twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "firstname", [], "any", false, false, false, 31), "lastname" => twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "lastname", [], "any", false, false, false, 31), "mail" => twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "email", [], "any", false, false, false, 31), "phone" => twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "phone", [], "any", false, false, false, 31), "civility" => twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "civility", [], "any", false, false, false, 31), "localisation" => twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "localisation", [], "any", false, false, false, 31), "reason" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["meeting"]) || array_key_exists("meeting", $context) ? $context["meeting"] : (function () { throw new RuntimeError('Variable "meeting" does not exist.', 31, $this->source); })()), "reason", [], "any", false, false, false, 31), "id", [], "any", false, false, false, 31), "contact" => twig_get_attribute($this->env, $this->source, (isset($context["contact"]) || array_key_exists("contact", $context) ? $context["contact"] : (function () { throw new RuntimeError('Variable "contact" does not exist.', 31, $this->source); })()), "id", [], "any", false, false, false, 31)]), "html", null, true);
            echo "\">
                    <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Plannifier un nouveau rendez-vous</div>
                </a>
                ";
        } else {
            // line 35
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planning_user", ["email" => (isset($context["mailCrypt"]) || array_key_exists("mailCrypt", $context) ? $context["mailCrypt"] : (function () { throw new RuntimeError('Variable "mailCrypt" does not exist.', 35, $this->source); })()), "idCongres" => twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 35, $this->source); })()), "id", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\">
                        <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Accéder à mon agenda</div>
                    </a>
                ";
        }
        // line 39
        echo "            </div>
        </div>
    </div>
</section>
";
        // line 43
        $this->loadTemplate("congres/_footerML.html.twig", "meeting/validationRefuseMeeting.html.twig", 43)->display($context);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 46
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 47
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
        // line 48
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
        return "meeting/validationRefuseMeeting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 48,  177 => 47,  167 => 46,  157 => 43,  151 => 39,  143 => 35,  135 => 31,  133 => 30,  126 => 26,  122 => 25,  118 => 24,  105 => 14,  101 => 13,  97 => 12,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Congrès - Incyte{% endblock %}

{% block body %}
<body>
<header>
    <div>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <h1 class=\"text-right\" style=\"position: absolute;right: 20px;top: 30px;\"><img src=\"{{ asset('img/logo-bleu.png') }}\" width=\"120\" alt=\"\"/></h1>
                    <div class=\"logo-app\"><img src=\"{{ asset('img/logo-app.png') }}\" width=\"130\" alt=\"\"/></div>
                    <div class=\"nom-event\">{{ congres.name }}</div>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12 text-center\">
                <div class=\"p-5\"><img src=\"{{ asset('img/picto-refus.jpg') }}\" style=\"width: 160px;\" alt=\"\"/></div>
                <h2 class=\"p-3 bold-OS\">{{ refusedBy == 'customer'? 'Annuler' : 'Refuser' }} le rendez-vous</h2>
                <div class=\"p-3 content-accept font-weight-bold\">Votre {{ refusedBy == 'customer'? 'annulation a bien été prise en compte' : 'refus a bien été pris en compte' }}.</div>
                <div class=\"p-3 content-accept \">
                    Si vous souhaitez plannifier un nouveau rendez-vous, cliquez sur le lien ci-dessous.
                </div>
                {% if refusedBy == 'customer' %}
                    <a href=\"{{ path('congres_contact', {id: congres.id, firstname: customer.firstname, lastname: customer.lastname, mail: customer.email, phone: customer.phone, civility: customer.civility, localisation: customer.localisation, reason: meeting.reason.id, contact: contact.id}) }}\">
                    <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Plannifier un nouveau rendez-vous</div>
                </a>
                {% else %}
                    <a href=\"{{ path('planning_user',{email: mailCrypt, idCongres: congres.id}) }}\">
                        <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Accéder à mon agenda</div>
                    </a>
                {% endif %}
            </div>
        </div>
    </div>
</section>
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
{% endblock %}", "meeting/validationRefuseMeeting.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/meeting/validationRefuseMeeting.html.twig");
    }
}
