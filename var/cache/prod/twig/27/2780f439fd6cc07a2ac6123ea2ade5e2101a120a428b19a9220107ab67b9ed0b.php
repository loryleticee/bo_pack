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

/* congres/document.html.twig */
class __TwigTemplate_42146dcccdb15a40daa3649cc64bfc9c8eb825392b08b6f43529d29946094350 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "congres/document.html.twig", 1);
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
        echo "    <header class=\"\">
        <div class=\"hcontact\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"text-left back\" style=\"float: left; height: 110px; line-height: 130px;\" id=\"back\">
                            <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_home", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 12)]), "html", null, true);
        echo "\" style=\"color: #FFF\">&#8963;</a></div>
                        <h1 class=\"text-right\" style=\"padding-top: 30px;display: inline-block; float: right;\"><img
                                    src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo-blanc.png"), "html", null, true);
        echo "\" width=\"120\" alt=\"\"/></h1>
                    </div>
                    <div class=\"col-12\">
                        <form method=\"post\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_documents", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 17)]), "html", null, true);
        echo "\">
                            <div class=\"input-group\" style=\"padding: 20px 10px;\">
                                <input type=\"text\" class=\"form-search\" name=\"search\" id=\"search-form\" ";
        // line 19
        echo " placeholder=\"Que recherchez-vous ?\">
                                <div class=\"input-group-append\">
                                    <button style=\"border-bottom: #FFF 1px solid; color: #FFF; background-color: transparent; border: none\" type=\"submit\">
                                        <i class='fa fa-search' aria-hidden='true'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-12 mb-2 text-left\">
                    <h2>Documents</h2>
                </div>
            </div>
        </div>
        <div class=\"onglet text-center bold-OS\" id=\"onglet\">
            <a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_documents", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 41), "category" => "Tous"]), "html", null, true);
        echo "\">
                <div class=\"";
        // line 42
        echo ((((0 === twig_compare(($context["get"] ?? null), "Tous")) || (null === ($context["get"] ?? null)))) ? ("active") : (""));
        echo " p-3 d-inline-block\" >Tous</div>
            </a>
            ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 45
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_documents", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 45), "category" => twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 45)]), "html", null, true);
            echo "\">
                    <div class=\"";
            // line 46
            echo (((0 === twig_compare(($context["get"] ?? null), twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 46)))) ? ("active") : (""));
            echo " p-3 d-inline-block\" >";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 46), "html", null, true);
            echo "</div>
                </a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "        </div>
        ";
        // line 50
        if (twig_test_empty(($context["documents"] ?? null))) {
            // line 51
            echo "            <h3 class=\"p-5 text-center\">Aucun document</h3>
        ";
        }
        // line 53
        echo "        <div id=\"carrousel-inner\">
        <div id=\"carrousel\">
            <div class=\"owl-carousel owl-theme\">
                ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["documents"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 57
            echo "                    <div class=\"img\"
                         onclick=\"modalCarousel('modal-";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 58), "html", null, true);
            echo "')\">
                        <div style=\"background-image: url(";
            // line 59
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/document/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "img", [], "any", false, false, false, 59), "html", null, true);
            echo ");\"
                             class=\"img-carrousel\"></div>
                        <div style=\"padding: 10px 20px;\">
                            <div class=\"name\">";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 62), "html", null, true);
            echo " </div>
                            <div class=\"poste\">";
            // line 63
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "about", [], "any", false, false, false, 63), 0, 15), "html", null, true);
            echo " ...</div>
                            <div style=\"position: absolute;bottom: 12px;right: 16px;\">&#8594;</div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            </div>
            <div class=\"text-center\">
                <div class=\"status\"></div>
            </div>
        </div>
        </div>
    </section>
    <!-- BEGIN : POPIN CONTACT -->
    ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["documents"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 77
            echo "        <div id=\"modal-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 77), "html", null, true);
            echo "\"  class=\"modal1\">
            <div class=\"modal-content\" id=\"fiche\">
                <div style=\"background-image: url(";
            // line 79
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/document/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "img", [], "any", false, false, false, 79), "html", null, true);
            echo ");\" class=\"visuel-bg\">
                    <div class=\"close\" onclick=\"closeModal('modal-'+";
            // line 80
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 80), "html", null, true);
            echo ")\"></div>
                </div>
                <div class=\"modal-body\">
                    <div class=\"name-popin\">";
            // line 83
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 83), "html", null, true);
            echo "</div>
                    <div class=\"apropos-popin\"><img src=\"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNDc3Ljg2NyA0NzcuODY3IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NzcuODY3IDQ3Ny44Njc7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNMjM4LjkzMywwQzEwNi45NzQsMCwwLDEwNi45NzQsMCwyMzguOTMzczEwNi45NzQsMjM4LjkzMywyMzguOTMzLDIzOC45MzNzMjM4LjkzMy0xMDYuOTc0LDIzOC45MzMtMjM4LjkzMw0KCQkJQzQ3Ny43MjYsMTA3LjAzMywzNzAuODM0LDAuMTQxLDIzOC45MzMsMHogTTIzOC45MzMsNDQzLjczM2MtMTEzLjEwOCwwLTIwNC44LTkxLjY5Mi0yMDQuOC0yMDQuOHM5MS42OTItMjA0LjgsMjA0LjgtMjA0LjgNCgkJCXMyMDQuOCw5MS42OTIsMjA0LjgsMjA0LjhDNDQzLjYxMSwzNTEuOTkxLDM1MS45OTEsNDQzLjYxMSwyMzguOTMzLDQ0My43MzN6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yMzguOTMzLDg1LjMzM2MtOS40MjYsMC0xNy4wNjcsNy42NDEtMTcuMDY3LDE3LjA2N3YxMTkuNDY3SDEwMi40Yy05LjQyNiwwLTE3LjA2Nyw3LjY0MS0xNy4wNjcsMTcuMDY3DQoJCQlTOTIuOTc0LDI1NiwxMDIuNCwyNTZoMTM2LjUzM2M5LjQyNiwwLDE3LjA2Ny03LjY0MSwxNy4wNjctMTcuMDY3VjEwMi40QzI1Niw5Mi45NzQsMjQ4LjM1OSw4NS4zMzMsMjM4LjkzMyw4NS4zMzN6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=\"  style=\"width: 16px;\" /> ";
            // line 84
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "createdAt", [], "any", false, false, false, 84), "medium", "", null, "gregorian", "fr"), "html", null, true);
            echo "  &nbsp; <img src=\"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8Zz4NCgkJCTxwYXRoIGQ9Ik00NDQuODc1LDEwOS43OTJMMzM4LjIwOCwzLjEyNWMtMi0yLTQuNzA4LTMuMTI1LTcuNTQyLTMuMTI1aC0yMjRDODMuMTM1LDAsNjQsMTkuMTM1LDY0LDQyLjY2N3Y0MjYuNjY3DQoJCQkJQzY0LDQ5Mi44NjUsODMuMTM1LDUxMiwxMDYuNjY3LDUxMmgyOTguNjY3QzQyOC44NjUsNTEyLDQ0OCw0OTIuODY1LDQ0OCw0NjkuMzMzdi0zNTINCgkJCQlDNDQ4LDExNC41LDQ0Ni44NzUsMTExLjc5Miw0NDQuODc1LDEwOS43OTJ6IE0zNDEuMzMzLDM2LjQxN2w3MC4yNSw3MC4yNWgtNDguOTE3Yy0xMS43NiwwLTIxLjMzMy05LjU3My0yMS4zMzMtMjEuMzMzVjM2LjQxN3oNCgkJCQkgTTQyNi42NjcsNDY5LjMzM2MwLDExLjc2LTkuNTczLDIxLjMzMy0yMS4zMzMsMjEuMzMzSDEwNi42NjdjLTExLjc2LDAtMjEuMzMzLTkuNTczLTIxLjMzMy0yMS4zMzNWNDIuNjY3DQoJCQkJYzAtMTEuNzYsOS41NzMtMjEuMzMzLDIxLjMzMy0yMS4zMzNIMzIwdjY0QzMyMCwxMDguODY1LDMzOS4xMzUsMTI4LDM2Mi42NjcsMTI4aDY0VjQ2OS4zMzN6Ii8+DQoJCQk8cGF0aCBkPSJNMzEwLjM4NSwzMTMuMTM1Yy05Ljg3NS03Ljc3MS0xOS4yNi0xNS43Ni0yNS41MS0yMi4wMWMtOC4xMjUtOC4xMjUtMTUuMzY1LTE2LTIxLjY1Ni0yMy41DQoJCQkJYzkuODEzLTMwLjMyMywxNC4xMTUtNDUuOTU4LDE0LjExNS01NC4yOTJjMC0zNS40MDYtMTIuNzkyLTQyLjY2Ny0zMi00Mi42NjdjLTE0LjU5NCwwLTMyLDcuNTgzLTMyLDQzLjY4OA0KCQkJCWMwLDE1LjkxNyw4LjcxOSwzNS4yNCwyNiw1Ny42OThjLTQuMjI5LDEyLjkwNi05LjE5OCwyNy43OTItMTQuNzgxLDQ0LjU3M2MtMi42ODgsOC4wNTItNS42MDQsMTUuNTEtOC42ODgsMjIuNDA2DQoJCQkJYy0yLjUxLDEuMTE1LTQuOTQ4LDIuMjUtNy4zMDIsMy40MjdjLTguNDc5LDQuMjQtMTYuNTMxLDguMDUyLTI0LDExLjU5NEMxNTAuNSwzNzAuMTc3LDEyOCwzODAuODQ0LDEyOCw0MDEuOTA2DQoJCQkJYzAsMTUuMjkyLDE2LjYxNSwyNC43NiwzMiwyNC43NmMxOS44MzMsMCw0OS43ODEtMjYuNDksNzEuNjU2LTcxLjExNWMyMi43MDgtOC45NTgsNTAuOTM4LTE1LjU5NCw3My4yMTktMTkuNzUNCgkJCQljMTcuODU0LDEzLjcyOSwzNy41NzMsMjYuODY1LDQ3LjEyNSwyNi44NjVjMjYuNDQ4LDAsMzItMTUuMjkyLDMyLTI4LjExNWMwLTI1LjIxOS0yOC44MTMtMjUuMjE5LTQyLjY2Ny0yNS4yMTkNCgkJCQlDMzM3LjAzMSwzMDkuMzMzLDMyNS40OSwzMTAuNjA0LDMxMC4zODUsMzEzLjEzNXogTTE2MCw0MDUuMzMzYy02LjA5NCwwLTEwLjIxOS0yLjg3NS0xMC42NjctMy40MjcNCgkJCQljMC03LjU2MywyMi41NTItMTguMjUsNDQuMzY1LTI4LjU4M2MxLjM4NS0wLjY1NiwyLjc5Mi0xLjMxMyw0LjIxOS0xLjk5QzE4MS44OTYsMzk0LjU2MywxNjYuMDUyLDQwNS4zMzMsMTYwLDQwNS4zMzN6DQoJCQkJIE0yMzQuNjY3LDIxNC4zNTRjMC0yMi4zNTQsNi45MzgtMjIuMzU0LDEwLjY2Ny0yMi4zNTRjNy41NDIsMCwxMC42NjcsMCwxMC42NjcsMjEuMzMzYzAsNC41LTMsMTUuNzUtOC40OSwzMy4zMTMNCgkJCQlDMjM5LjEzNSwyMzMuNzUsMjM0LjY2NywyMjIuNjk4LDIzNC42NjcsMjE0LjM1NHogTTI0Mi44NDQsMzI5YzAuNjY3LTEuODU0LDEuMzEzLTMuNzI5LDEuOTM4LTUuNjI1DQoJCQkJYzMuOTU4LTExLjg3NSw3LjUyMS0yMi41NDIsMTAuNjk4LTMyLjE0NmM0LjQyNyw0Ljg3NSw5LjE5OCw5Ljg2NSwxNC4zMTMsMTQuOTc5YzIsMiw2Ljk1OCw2LjUsMTMuNTYzLDEyLjEzNQ0KCQkJCUMyNzAuMjA4LDMyMS4yMDgsMjU2LjIxOSwzMjQuNzYsMjQyLjg0NCwzMjl6IE0zNjIuNjY3LDMzNC41NTJjMCw0Ljc5MiwwLDYuNzgxLTkuODk2LDYuODQ0DQoJCQkJYy0yLjkwNi0wLjYyNS05LjYyNS00LjU4My0xNy45MTctMTAuMjI5YzMuMDEtMC4zMzMsNS4yMjktMC41LDYuNDc5LTAuNUMzNTcuMDk0LDMzMC42NjcsMzYxLjU2MywzMzIuMjA4LDM2Mi42NjcsMzM0LjU1MnoiLz4NCgkJPC9nPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K\"  style=\"width: 16px;\" /> PDF - ";
            echo twig_escape_filter($this->env, $this->extensions['App\Twig\ByteConversionTwigExtension']->formatBytes(twig_get_attribute($this->env, $this->source, $context["doc"], "size", [], "any", false, false, false, 84)), "html", null, true);
            echo "</div>
                    <br>
                    <div>
                        <p class=\"titre-apropos-popin\">A PROPOS</p>
                        <p class=\"apropos-popin\">
                            ";
            // line 89
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "about", [], "any", false, false, false, 89), "html", null, true);
            echo "
                            <br><br>
                            REF: ";
            // line 91
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "ref", [], "any", false, false, false, 91), "html", null, true);
            echo "
                        </p>
                    </div>
                    <div class=\"but-popin-doc\" onclick=\"modalCarousel('modalForm-'+";
            // line 94
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 94), "html", null, true);
            echo ")\" id=\"valid\">Je souhaite télécharger ce document</div>

                </div>
            </div>
        </div>

        <!-- BEGIN POPPIN FORM  -->
        <div id=\"modalForm-";
            // line 101
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 101), "html", null, true);
            echo "\" class=\"modal1\" >
            <div class=\"modal-content-alert\">
                <div class=\"close\" id=\"close_doc\" onclick=\"closeModal('modalForm-'+";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 103), "html", null, true);
            echo ")\"></div>
                <div class=\"modal-body\" id=\"modal-body-";
            // line 104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 104), "html", null, true);
            echo "\">
                    <div>
                        <p class=\"titre-popin-alert\">Confirmer le téléchargement</p>
                        <p class=\"content-popin-alert text-center\">Je souhaite obtenir le document ";
            // line 107
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 107), "html", null, true);
            echo " au format dématérialisé.</p>
                        <a href=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/documents/"), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "docName", [], "any", false, false, false, 108), "html", null, true);
            echo "\" download onclick=\"addStat(";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 108), "html", null, true);
            echo "); closeModal('modalForm-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 108), "html", null, true);
            echo "); modalCarousel('modalFormFinal-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 108), "html", null, true);
            echo ")\">
                            <div class=\"but-popin-alert\" id=\"telecharger\">Accepter</div>
                        </a>
                        <div class=\"mention\">Ce document est pour un usage strictement personnel, il ne doit pas être partagé ou transferé.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN : POPIN TELECHARGEMENT BROCHURE -->
        <div id=\"modalFormFinal-";
            // line 117
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 117), "html", null, true);
            echo "\" class=\"modal1\" >
            <div class=\"modal-content-alert\">
                <div class=\"close\" id=\"close_doc\" onclick=\"closeModal('modalFormFinal-'+";
            // line 119
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 119), "html", null, true);
            echo "); closeModal('modalForm-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 119), "html", null, true);
            echo "); closeModal('modal-'+";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 119), "html", null, true);
            echo ")\"\"></div>
                    <div class=\"modal-body\" id=\"modal-body-final-";
            // line 120
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "id", [], "any", false, false, false, 120), "html", null, true);
            echo "\" >
                        <div class=\"text-center pt-5\"><img src=\"data:image/svg+xml;base64,
                      PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiBjbGFzcz0iIj48Zz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0yNTYsMEMxMTQuODMzLDAsMCwxMTQuODMzLDAsMjU2czExNC44MzMsMjU2LDI1NiwyNTZzMjU2LTExNC44NTMsMjU2LTI1NlMzOTcuMTY3LDAsMjU2LDB6IE0yNTYsNDcyLjM0MSAgICBjLTExOS4yNzUsMC0yMTYuMzQxLTk3LjA0Ni0yMTYuMzQxLTIxNi4zNDFTMTM2LjcyNSwzOS42NTksMjU2LDM5LjY1OWMxMTkuMjk1LDAsMjE2LjM0MSw5Ny4wNDYsMjE2LjM0MSwyMTYuMzQxICAgIFMzNzUuMjc1LDQ3Mi4zNDEsMjU2LDQ3Mi4zNDF6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojM0RCMzlFIj48L3BhdGg+Cgk8L2c+CjwvZz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zNzMuNDUxLDE2Ni45NjVjLTguMDcxLTcuMzM3LTIwLjYyMy02Ljc2Mi0yNy45OTksMS4zNDhMMjI0LjQ5MSwzMDEuNTA5bC01OC40MzgtNTkuNDA5ICAgIGMtNy43MTQtNy44MTMtMjAuMjQ2LTcuOTMyLTI4LjAzOS0wLjIzOGMtNy44MTMsNy42NzQtNy45MzIsMjAuMjI2LTAuMjM4LDI4LjAzOWw3My4xNTEsNzQuMzYxICAgIGMzLjc0OCwzLjgwNyw4LjgyNCw1LjkyOSwxNC4xMzgsNS45MjljMC4xMTksMCwwLjI1OCwwLDAuMzc3LDAuMDJjNS40NzMtMC4xMTksMTAuNjI5LTIuNDU5LDE0LjI5Ny02LjUwNGwxMzUuMDU5LTE0OC43MjIgICAgQzM4Mi4xNTYsMTg2Ljg1NCwzODEuNTYxLDE3NC4zMjIsMzczLjQ1MSwxNjYuOTY1eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6IzNEQjM5RSI+PC9wYXRoPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=\" width=\"60\" /></div>
                        <h2 class=\"p-3 bold-OS text-center w-100\">Document téléchargé</h2>
                        <div class=\"p-3 content-accept text-center\">Le document est en cours de téléchargement<span class=\"one\">.</span><span class=\"two\">.</span><span class=\"three\">.</span></div>
                        <a href=\"";
            // line 125
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("congres_home", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 125)]), "html", null, true);
            echo "\">
                            <div class=\"but-popin-alert\" id=\"home\">Retour à l'accueil</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "
";
    }

    // line 136
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 137
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 138
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("modal");
        echo "
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js\"></script>
    <script>
        function sortElement(cat){
            var allItem2 = document.getElementsByClassName(\"owl-item\")
            console.log(allItem2)
            for(var b = 0; b < allItem2.length; b++){
                allItem2[b].style.display = \"none\";
            }
            var itemDisplay = document.getElementsByClassName(cat)
            for(var a = 0; a < itemDisplay.length; a++){
                itemDisplay[a].style.display = \"flex\";
            }
        }

        \$( \"#onglet > div\").click(function() {
            \$(\"#onglet > div\").removeClass(\"active\");
            \$(this).addClass(\"active\");
        });

        function addStat(id) {
            \$.ajax({
                url: '";
        // line 160
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add_stat", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 160)]), "html", null, true);
        echo "?doc='+id,
                data: id,
                dataType: 'json'
            })
        }

        function search() {
            toFind = document.getElementById('search-form').value;
            console.log(toFind);
            \$.ajax({
                type: \"POST\",
                url: '";
        // line 171
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("search_doc", ["id" => twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 171)]), "html", null, true);
        echo "?search='+toFind,
                data: toFind,
                success: function(data) {
                    console.log(data);
                    document.getElementById('carrousel-inner').innerHTML = data;
                },
                error: function(e)
                {alert('Error: ' + e);}
            })
        }

        function modalCarousel(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"inline-block\";
        }

        function closeModal(id) {
            var modal = document.getElementById(id);
            modal.style.display = \"none\";
        }

        \$('.owl-carousel').owlCarousel({
            center: false,
            loop: true,
            nav: true,
            navText: ['<i class=\"fa fa-angle-left previous\"></i> PRECEDENT', 'SUIVANT <i class=\"fa fa-angle-right next\"></i>'],
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                990: {
                    items: 5,
                }
            },
            onInitialized: coverFlowEfx,
            onTranslate: coverFlowEfx,
        });

        function coverFlowEfx(e) {
            if (\$('.owl-dots')) {
                \$('.owl-dots').remove();
            }
            idx = e.item.index;
            \$('.owl-item.big').removeClass('big');
            \$('.owl-item.medium').removeClass('medium');
            \$('.owl-item.mdright').removeClass('mdright');
            \$('.owl-item.mdleft').removeClass('mdleft');
            \$('.owl-item.smallRight').removeClass('smallRight');
            \$('.owl-item.smallLeft').removeClass('smallLeft');
            \$('.owl-item').eq(idx - 1).addClass('medium mdleft');
            \$('.owl-item').eq(idx).addClass('big');
            \$('.owl-item').eq(idx + 1).addClass('medium mdright');
            \$('.owl-item').eq(idx + 2).addClass('smallRight');
            \$('.owl-item').eq(idx - 2).addClass('smallLeft');
        }

        document.addEventListener(\"DOMContentLoaded\", function(e) {
            var allItem = document.getElementsByClassName(\"owl-item\")


            var i = 0
            ";
        // line 235
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["documents"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 236
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["doc"], "categoryDocuments", [], "any", false, false, false, 236));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 237
                echo "            allItem[i].classList.add(\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 237), "html", null, true);
                echo "\");
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 239
            echo "            i = i + 1
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 241
        echo "        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "congres/document.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  467 => 241,  460 => 239,  451 => 237,  446 => 236,  442 => 235,  375 => 171,  361 => 160,  336 => 138,  331 => 137,  327 => 136,  322 => 133,  308 => 125,  300 => 120,  292 => 119,  287 => 117,  268 => 108,  264 => 107,  258 => 104,  254 => 103,  249 => 101,  239 => 94,  233 => 91,  228 => 89,  218 => 84,  214 => 83,  208 => 80,  203 => 79,  197 => 77,  193 => 76,  183 => 68,  172 => 63,  168 => 62,  161 => 59,  157 => 58,  154 => 57,  150 => 56,  145 => 53,  141 => 51,  139 => 50,  136 => 49,  125 => 46,  120 => 45,  116 => 44,  111 => 42,  107 => 41,  83 => 19,  78 => 17,  72 => 14,  67 => 12,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "congres/document.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/document.html.twig");
    }
}
