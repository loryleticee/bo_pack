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

/* congres/caroussel.html.twig */
class __TwigTemplate_ca2a76f73073f9646ad019430cd9174749659f5fd9155a1dfb4e687922f18389 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "congres/caroussel.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "congres/caroussel.html.twig"));

        // line 1
        echo "<div id=\"carrousel\">
    <div class=\"owl-carousel owl-theme\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["documents"]) || array_key_exists("documents", $context) ? $context["documents"] : (function () { throw new RuntimeError('Variable "documents" does not exist.', 3, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 4
            echo "            <div class=\"img\"
                 onclick=\"modalCarousel('modal-'+";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 5), "html", null, true);
            echo ")\">
                <div style=\"background-image: url(";
            // line 6
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/document/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "img", [], "any", false, false, false, 6), "html", null, true);
            echo ");\"
                     class=\"img-carrousel\"></div>
                <div style=\"padding: 10px 20px;\">
                    <div class=\"name\">";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 9), "html", null, true);
            echo " </div>
                    <div class=\"poste\">";
            // line 10
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "about", [], "any", false, false, false, 10), 0, 15), "html", null, true);
            echo " ...</div>
                    <div style=\"text-align: right\">&#8594;</div>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </div>
    <div class=\"text-center\">
        <div class=\"status\"></div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "congres/caroussel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 15,  69 => 10,  65 => 9,  58 => 6,  54 => 5,  51 => 4,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"carrousel\">
    <div class=\"owl-carousel owl-theme\">
        {% for doc in documents %}
            <div class=\"img\"
                 onclick=\"modalCarousel('modal-'+{{ doc.id }})\">
                <div style=\"background-image: url({{ asset('uploads/img/document/') }}{{ doc.img }});\"
                     class=\"img-carrousel\"></div>
                <div style=\"padding: 10px 20px;\">
                    <div class=\"name\">{{ doc.name }} </div>
                    <div class=\"poste\">{{ doc.about|slice(0,15) }} ...</div>
                    <div style=\"text-align: right\">&#8594;</div>
                </div>
            </div>
        {% endfor %}
    </div>
    <div class=\"text-center\">
        <div class=\"status\"></div>
    </div>
</div>
", "congres/caroussel.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/caroussel.html.twig");
    }
}
