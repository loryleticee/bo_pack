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

/* meeting/acceptedMeeting.html.twig */
class __TwigTemplate_f7f3ed8c28b662f86f3ecb41bea566bc9b4a4428ef6e540753f7c69c92d5e301 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "meeting/acceptedMeeting.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/picto-valid.jpg"), "html", null, true);
        echo "\" style=\"width: 160px;\" alt=\"\"/></div>
                <h2 class=\"p-3 bold-OS\">Rendez-vous accepté</h2>
                <div class=\"p-3 content-accept\">Le rendez-vous a été accepté, un email de confirmation vient d’être envoyé à votre contact.</div>
                <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planning_user", ["email" => ($context["cryptEmail"] ?? null), "idCongres" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 27)]), "html", null, true);
        echo "\">
                    <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Voir mon agenda du congrès</div>
                </a>
            </div>
        </div>
    </div>
</section>
";
        // line 34
        $this->loadTemplate("congres/_footerML.html.twig", "meeting/acceptedMeeting.html.twig", 34)->display($context);
    }

    // line 37
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
        // line 39
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
        return "meeting/acceptedMeeting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 39,  112 => 38,  108 => 37,  104 => 34,  94 => 27,  88 => 24,  75 => 14,  71 => 13,  67 => 12,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "meeting/acceptedMeeting.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/meeting/acceptedMeeting.html.twig");
    }
}
