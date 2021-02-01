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

/* security/login.html.twig */
class __TwigTemplate_471d105a4cc166f0fa6a8e2e3609679cd5ac94c97d9b1fb39f4b9b356effe039 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Log in!";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<body class=\"text-center\">
<div class=\"pt-5 container\">
    <div class=\"row\">
        <div class=\"col-3\"></div>
        <div class=\"col-6\">
            <form method=\"post\">
                ";
        // line 12
        if (($context["error"] ?? null)) {
            // line 13
            echo "                    <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", [], "any", false, false, false, 13), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", [], "any", false, false, false, 13), "security"), "html", null, true);
            echo "</div>
                ";
        }
        // line 15
        echo "
                ";
        // line 16
        if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 16)) {
            // line 17
            echo "                    <div class=\"mb-3\">
                        You are logged in as ";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 18), "username", [], "any", false, false, false, 18), "html", null, true);
            echo ", <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">Logout</a>
                    </div>
                ";
        }
        // line 21
        echo "
                <img class=\"mb-4\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-bleu.png"), "html", null, true);
        echo "\" alt=\"\" height=\"72\">
                <h1 class=\"h3 mb-3 font-weight-normal\">Administration</h1>
                <label for=\"inputEmail\">Email</label>
                <input type=\"email\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" name=\"email\" id=\"inputEmail\" class=\"form-control\" required autofocus>
                <br>
                <label for=\"inputPassword\">Mot de passe</label>
                <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control \" required>
                <input type=\"hidden\" name=\"_csrf_token\"
                       value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"
                >
                <br>

                <button class=\"btn btn-lg btn-primary\" type=\"submit\">
                    Se connecter
                </button>
            </form>
            <p class=\"mt-5 mb-3 text-muted\">&copy; Agence Surf - 2020</p>

        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 30,  99 => 25,  93 => 22,  90 => 21,  82 => 18,  79 => 17,  77 => 16,  74 => 15,  68 => 13,  66 => 12,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "security/login.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/security/login.html.twig");
    }
}
