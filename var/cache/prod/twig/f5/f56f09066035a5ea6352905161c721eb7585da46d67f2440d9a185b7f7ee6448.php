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

/* admin/categories/_delete_formReason.html.twig */
class __TwigTemplate_bace44f991a6db6979f61c7251b22188598947ba66edc925edd129ab3356967a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_reason_delete", ["id" => twig_get_attribute($this->env, $this->source, ($context["reason"] ?? null), "id", [], "any", false, false, false, 1)]), "html", null, true);
        echo "\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');\">
    <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . twig_get_attribute($this->env, $this->source, ($context["reason"] ?? null), "id", [], "any", false, false, false, 3))), "html", null, true);
        echo "\">
    <a class=\"dropdown-item\" ><button class=\"btn btn-delete p-0\">Supprimer</button></a>
</form>
";
    }

    public function getTemplateName()
    {
        return "admin/categories/_delete_formReason.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/categories/_delete_formReason.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/admin/categories/_delete_formReason.html.twig");
    }
}
