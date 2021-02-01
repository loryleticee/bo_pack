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

/* congres/_footerML.html.twig */
class __TwigTemplate_7392bacc97106df79f5b4064c273f141e82ee0bc8c86f1cd5bcfcd353cf5edd1 extends Template
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
        echo "<footer class=\"text-center\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <p style=\"margin-top: 1rem;\">
                <div id=\"btn_ML\" style=\"display: inline-block;\">Données personnelles</div> &nbsp;|&nbsp;
                <div id=\"btn_pharma\" style=\"display: inline-block;\">Pharmacovigilance</div> &nbsp; <span
                        style=\"color: #827a7a\">INS.019.2020</span></p>
            </div>
        </div>
    </div>
</footer>
<!-- BEGIN : Modal ML -->
<div id=\"myModal_ML\" class=\"modal1\">
    <div class=\"modal-content\">
        <div style=\"background-color: #34467e; min-height: 90px; border-bottom-left-radius: 20px;display: inline-block;width: 100%;\">
            <div class=\"titre-popin\">Gestion <br>des Données personnelles</div>
            <div class=\"close\" id=\"close_ML\"></div>
        </div>
        <div class=\"modal-body\">
            <div class=\"content-popin\"><p class=\"text-center bold-OS\">Nous respectons votre sphère privée</p>
                <p class=\"text-center\">Pour plus d’information : <a href=\"http://www.incyte.com/privacy-policy\"
                                                                    target=\"_blank\">http://www.incyte.com/privacy-policy</a>
                </p>

                <p class=\"text-left\">Incyte Biosciences France traite vos données personnelles afin de : <br>
                    · Planifier des réunions avec vous lors des congrès de la SFH 2020;<br>
                    · Vous permettre de recevoir des informations sur les produits Incyte;
                </p>
                <p class=\"text-left\">Vous disposez d’un droit d’accès, de rectification et d’effacement de vos
                    données, d’un droit à la limitation du traitement et d’un droit d’opposition au traitement,
                    ainsi que du droit de définir des directives relatives au sort de vos données après votre décès,
                    que vous pouvez exercer auprès du Délégué à la protection des données dans votre pays de
                    résidence ou de travail.</p>
                <p class=\"text-left\">Vous pouvez obtenir plus de renseignements sur les pratiques d'Incyte en
                    matière de protection des données en visitant le site <a
                            href=\"http://www.incyte.com/privacy-policy\" target=\"_blank\">http://www.incyte.com/privacy-policy</a>
                    ou <a href=\"https://www.incyte.fr\" target=\"_blank\">https://www.incyte.fr/</a>. En accédant à ce
                    lien, vous pouvez vous renseigner sur les types de données personnelles que nous recueillons, la
                    manière dont nous les utilisons, si la collecte et le traitement sont facultatifs, les sources
                    des données personnelles que nous traitons, comment elles sont partagées, où elles sont stockées
                    ou transférées, combien de temps nous les conservons et les coordonnées d'Incyte, du responsable
                    de la protection des données d'Incyte et de votre autorité de contrôle.</p>
                <p class=\"text-left\">Veuillez contacter <a href=\"mailto:privacy@incyte.com\">privacy@incyte.com</a>
                    pour toute demande, question ou préoccupation ou si vous souhaitez exercer vos droits.</p>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN : Modal Pharma -->
<div id=\"myModal_pharma\" class=\"modal1\">
    <div class=\"modal-content\">
        <div style=\"background-color: #34467e; min-height: 80px; border-bottom-left-radius: 20px;display: inline-block;width: 100%;\">
            <div class=\"titre-popin\">PHARMACOVIGILANCE</div>
            <div class=\"close\" id=\"close_pharma\"></div>
        </div>
        <div class=\"modal-body\">
            <div class=\"content-popin\">
                <p>La déclaration des effets indésirables suspectés après autorisation du médicament est importante. Elle permet une surveillance continue du rapport bénéfice/risque du médicament.</p>
                <p>Déclarez immédiatement tout effet indésirable suspecté d’être dû à un médicament à votre Centre régional de pharmacovigilance (CRPV) ou sur <a href=\"https://www.signalement-sante.gouv.fr\" target=\"_blank\">www.signalement-sante.gouv.fr</a>.</p>
                <p>Pour plus d’information, consulter la rubrique «&nbsp;Déclarer un effet indésirable&nbsp;» sur le site Internet de l’ANSM : <a href=\"http://ansm.sante.fr\" target=\"_blank\">http://ansm.sante.fr</a>.</p>
                <p>En parallèle, les effets indésirables peuvent être déclarés au centre d’appel Incyte :<br>
                    Email : <a href=\"mailto:eumedinfo@incyte.com\">eumedinfo@incyte.com</a><br>
                    Tél : 08 05 22 00 62</p>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "congres/_footerML.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "congres/_footerML.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/congres/_footerML.html.twig");
    }
}
