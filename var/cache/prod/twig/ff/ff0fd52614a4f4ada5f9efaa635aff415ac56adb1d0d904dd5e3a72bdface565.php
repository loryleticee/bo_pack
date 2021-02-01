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
class __TwigTemplate_0d6d4135ed17c53578b69e5c4e1bb140417a18375a241b130bbd68b5b8d23b8d extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "meeting/validationRefuseMeeting.html.twig", 1);
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "name", [], "any", false, false, false, 14), "html", null, true);
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
        echo (((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) ? ("Annuler") : ("Refuser"));
        echo " le rendez-vous</h2>
                <div class=\"p-3 content-accept font-weight-bold\">Votre ";
        // line 26
        echo (((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) ? ("annulation a bien été prise en compte") : ("refus a bien été pris en compte"));
        echo ".</div>
                <div class=\"p-3 content-accept \">
                    Si vous souhaitez plannifier un nouveau rendez-vous, cliquez sur le lien ci-dessous.
                </div>
                ";
        // line 30
        if ((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) {
            // line 31
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_contact", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 31), "firstname" => twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "firstname", [], "any", false, false, false, 31), "lastname" => twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "lastname", [], "any", false, false, false, 31), "mail" => twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "email", [], "any", false, false, false, 31), "phone" => twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "phone", [], "any", false, false, false, 31), "civility" => twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "civility", [], "any", false, false, false, 31), "localisation" => twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "localisation", [], "any", false, false, false, 31), "reason" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["meeting"] ?? null), "reason", [], "any", false, false, false, 31), "id", [], "any", false, false, false, 31), "contact" => twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "id", [], "any", false, false, false, 31)]), "html", null, true);
            echo "\">
                    <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Plannifier un nouveau rendez-vous</div>
                </a>
                ";
        } else {
            // line 35
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planning_user", ["email" => ($context["mailCrypt"] ?? null), "idCongres" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 35)]), "html", null, true);
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
    }

    // line 46
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
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
        return array (  139 => 48,  135 => 47,  131 => 46,  127 => 43,  121 => 39,  113 => 35,  105 => 31,  103 => 30,  96 => 26,  92 => 25,  88 => 24,  75 => 14,  71 => 13,  67 => 12,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "meeting/validationRefuseMeeting.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/meeting/validationRefuseMeeting.html.twig");
    }
}
