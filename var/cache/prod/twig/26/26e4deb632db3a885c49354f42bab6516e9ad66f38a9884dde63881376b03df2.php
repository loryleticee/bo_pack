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

/* meeting/refuseMeeting.html.twig */
class __TwigTemplate_1291b06cce44f67e824bd536c2e00c56b1d8371bbcd8aee8cd508f45e7491348 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "meeting/refuseMeeting.html.twig", 1);
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
                <div class=\"p-3 content-accept\">Vous avez souhaitez ";
        // line 26
        echo (((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) ? ("annuler") : ("refuser"));
        echo " le rendez-vous, veuillez indiquer ci-dessous à votre contact le motif de votre ";
        echo (((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) ? ("annulation") : ("refus"));
        echo ".</div>
                ";
        // line 27
        $context["refus"] = (((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) ? ("Valider votre annulation") : ("Valider votre refus"));
        // line 28
        echo "                ";
        $context["refusMotif"] = (((0 === twig_compare(($context["refusedBy"] ?? null), "customer"))) ? ("Motif de l'annulation ...") : ("Motif du refus ..."));
        // line 29
        echo "                ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
                        ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "reasonCancel", [], "any", false, false, false, 30), 'widget', ["attr" => ["placeholder" => ($context["refusMotif"] ?? null)]]);
        echo "
                        ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "submit", [], "any", false, false, false, 31), 'widget', ["label" => ($context["refus"] ?? null)]);
        echo "
                ";
        // line 32
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
            </div>
        </div>
    </div>
</section>
";
        // line 37
        $this->loadTemplate("congres/_footerML.html.twig", "meeting/refuseMeeting.html.twig", 37)->display($context);
    }

    // line 40
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
        // line 42
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
        return "meeting/refuseMeeting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 42,  136 => 41,  132 => 40,  128 => 37,  120 => 32,  116 => 31,  112 => 30,  107 => 29,  104 => 28,  102 => 27,  96 => 26,  92 => 25,  88 => 24,  75 => 14,  71 => 13,  67 => 12,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "meeting/refuseMeeting.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/meeting/refuseMeeting.html.twig");
    }
}
