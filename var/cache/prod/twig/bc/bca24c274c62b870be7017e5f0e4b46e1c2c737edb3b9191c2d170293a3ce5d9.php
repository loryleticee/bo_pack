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
class __TwigTemplate_01909e7f8ccb1a4829510e9dcb4f017f50c3fd91762053a5e92064cc29096de1 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "congres/home.html.twig", 1);
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
                ";
        // line 23
        if ((0 === twig_compare(($context["eventStart"] ?? null), true))) {
            // line 24
            echo "                    <div class=\"col-sm-12 col-lg-6\" style=\"padding: 0;\">
                        ";
            // line 25
            if ((0 === twig_compare(($context["code"] ?? null), true))) {
                // line 26
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_documents", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 26)]), "html", null, true);
                echo "\">
                        ";
            }
            // line 28
            echo "                        <div class=\"bloc-home-document\"
                                ";
            // line 29
            if ((0 !== twig_compare(($context["code"] ?? null), true))) {
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
            if ((0 === twig_compare(($context["code"] ?? null), true))) {
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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_contact", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 54)]), "html", null, true);
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
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formSecurity"] ?? null), 'form_start');
        echo "
                    ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["formSecurity"] ?? null), 'errors');
        echo "

                    ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formSecurity"] ?? null), "code", [], "any", false, false, false, 75), 'row');
        echo "

                    ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["formSecurity"] ?? null), "submit", [], "any", false, false, false, 77), 'row', ["label" => "Valider le code"]);
        echo "
                    ";
        // line 78
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formSecurity"] ?? null), 'form_end');
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
                    <p class=\"content-popin-alert\">Vous pouvez prendre rendez-vous avec un membre de l’équipe Incyte France.</p>
                </div>
            </div>
        </div>
    </div>
";
        // line 94
        $this->loadTemplate("congres/_footerML.html.twig", "congres/home.html.twig", 94)->display($context);
    }

    // line 97
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
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
        return array (  213 => 99,  208 => 98,  204 => 97,  200 => 94,  181 => 78,  177 => 77,  172 => 75,  167 => 73,  163 => 72,  142 => 54,  138 => 52,  127 => 43,  123 => 41,  119 => 39,  117 => 38,  109 => 32,  105 => 30,  103 => 29,  100 => 28,  94 => 26,  92 => 25,  89 => 24,  87 => 23,  75 => 14,  71 => 13,  67 => 12,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "congres/home.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/home.html.twig");
    }
}
