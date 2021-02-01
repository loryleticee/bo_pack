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

/* meeting/askMeetingSend.html.twig */
class __TwigTemplate_deb4facb59465f2bd19585111739e596174c5276aed581aea2eed775c3136d5e extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "meeting/askMeetingSend.html.twig", 1);
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
        echo "    <div class=\"modal-display\">
        <div style=\"display: block;\">
            <div style=\"background-color: #34467e; min-height: 140px; border-bottom-left-radius: 20px; display: inline-block; width: 100%;\">
                <div class=\"titre-popin\">";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "firstname", [], "any", false, false, false, 9), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "lastname", [], "any", false, false, false, 9), "html", null, true);
        echo "</div>
                <div class=\"soustitre-popin poste2\">";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "job", [], "any", false, false, false, 10), "html", null, true);
        echo "</div>
                <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_home", ["id" => ($context["id"] ?? null)]), "html", null, true);
        echo "\">
                    <div class=\"close\" id=\"close_form\"></div>
                </a>
            </div>
            <div style=\"background-image: url('";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/user/"), "html", null, true);
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "img", [], "any", false, false, false, 15), "html", null, true);
        echo "');background-position: center;background-size: cover; height: 140px; width: 140px; border-radius: 50%; margin: auto; margin-top: -70px; z-index: 100; position: absolute; left: calc(50% - 70px);\"></div>
            <div class=\"modal-body\" style=\"margin-top: 60px;\">
                <section>
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-12 text-center\">
                                <div class=\"pt-5\"><img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/check-valid.png"), "html", null, true);
        echo "\" style=\"width: 25%; max-width: 80px;\" alt=\"\"/></div>
                                <h2 class=\"p-3 bold-OS\">Demande envoyée</h2>
                                <div class=\"p-3 content-accept\">
                                    Votre demande de rendez-vous a bien été prise en compte. Vous recevrez dans les plus brefs délais une confirmation par mail.
                                    <br><br>
                                    <strong>L'équipe Incyte</strong>
                                </div>
                                <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_home", ["id" => ($context["id"] ?? null)]), "html", null, true);
        echo "\">
                                    <div class=\"but-popin-alert\" style=\"margin-bottom: 80px;\">Retour à l'accueil

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
";
    }

    // line 41
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "meeting/askMeetingSend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 42,  118 => 41,  101 => 28,  91 => 21,  81 => 15,  74 => 11,  70 => 10,  64 => 9,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "meeting/askMeetingSend.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/meeting/askMeetingSend.html.twig");
    }
}
