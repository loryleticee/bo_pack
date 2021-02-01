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

/* emails/annulationMeeting.html.twig */
class __TwigTemplate_bc611d5f868ae82edc90de902fc5027062513f8589c4a6e7503aaaf5d1e4755f extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/annulationMeeting.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/annulationMeeting.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\"
      xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"x-apple-disable-message-reformatting\">
    <!--[if gte mso 12]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>
                96
            </o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <style type=\"text/css\">
        @font-face {
            font-family: 'OpenSans-Regular';
            font-style: normal;
            font-weight: 400;
            src: local('OpenSans-Regular'), url(\"https://evenements-incyte.com/public/email/fonts/OpenSans-Regular.woff2\") format('woff2');
        }

        @font-face {
            font-family: 'OpenSans-Bold';
            font-style: normal;
            font-weight: 800;
            src: local('OpenSans-Bold'), url(\"https://evenements-incyte.com/public/email/fonts/OpenSans-Bold.woff2\") format('woff2');
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass, .ExternalClass *, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass
        body, html {
            min-width: 100% !important;
            margin: 0 auto !important;
            padding: 0 !important;
            background-color: #f3f4f7;
            font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;
\t\t\tline-height: normal;
        }

        * {
            text-size-adjust: none;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased !important
        }

        table {
            border-collapse: collapse !important;
            border-spacing: 0
        }

        table, td {
            mso-table-lspace: 0;
            mso-table-rspace: 0
        }

        img {
            -ms-interpolation-mode: bicubic
        }

        *[x-apple-data-detectors], .unstyle-auto-detected-links *, .aBn {
            cursor: default !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            color: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
            border-bottom: 0 !important
        }

        div {
            line-height: 100%;
        }

        p {
            margin: 0;
            padding: 0;
            margin-bottom: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            color: black;
            line-height: 100%;
        }

        a, a:link {
            color: #2A5DB0;
            text-decoration: underline;
        }

        body, table, td, p, a, li, blockquote {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
\t\t\tline-height: normal;
        }

        .appleLinks, .appleLinksWhite {
            text-decoration: none !important;
        }

        .but {
            background-color: #285eb4 !important;
            background-repeat: no-repeat;
            background-position-x: 15px;
            background-position-y: center;
            color: #FFF;
            border: #285eb4 2px solid;
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }

        .but:hover {
            background-color: #FFF !important;
            color: #285eb4 !important;
            border: #285eb4 2px solid;
        }

        .boRed {
            border-left: #73a1da 1px solid;
            border-top: 0;
        }

        .showsmart, *[class~=\"showsmart\"] {
            width: 0;
            display: none !important;
        }

        .hidsmart, *[class~=\"hidsmart\"] {
            display: block !important;
            max-height: inherit !important;
            overflow: visible !important;
        }

        @media screen and (max-width: 700px) {
            body {
                width: auto !important;
            }

            .w100p, *[class~=\"w100p\"] {
                width: 100% !important;
            }

            .w10, *[class~=\"w10\"] {
                width: 10px !important;
            }

            .h20, *[class~=\"h20\"] {
                height: 20px !important;
            }

            .pad10, *[class~=\"pad10\"] {
                padding: 10px !important;
            }

            .pad30, *[class~=\"pad30\"] {
                padding: 30px !important;
            }

            .padTop10, *[class~=\"padTop10\"] {
                padding-top: 10px !important;
            }

            .pad0, *[class~=\"pad0\"] {
                padding: 0px !important;
            }

            .fz13, *[class~=\"fz13\"] {
                font-size: 13px !important;
            }

            .noflo, *[class~=\"noflo\"] {
                float: none !important;
            }

            .hidsmart, *[class~=\"hidsmart\"] {
                width: 0;
                display: none !important;
            }

            .showsmart, *[class~=\"showsmartsimple\"] {
                display: inline-block !important;
                width: auto !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart, *[class~=\"showsmart\"] {
                display: inline-block !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .noborder, *[class~=\"noborder\"] {
                border: none !important;
            }

            .tac, *[class~=\"tac\"] {
                text-align: center;
            }

            .padBot, *[class~=\"padBot\"] {
                padding: 0 !important;
                padding-bottom: 15px !important;
                height: auto !important
            }

            .showsmart300, *[class~=\"showsmart300\"] {
                display: block !important;
                width: 300px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart280, *[class~=\"showsmart280\"] {
                display: block !important;
                width: 280px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart230, *[class~=\"showsmart230\"] {
                display: block !important;
                width: 230px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart187, *[class~=\"showsmart187\"] {
                display: block !important;
                width: 230px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart255, *[class~=\"showsmart255\"] {
                display: block !important;
                width: 255px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart128, *[class~=\"showsmart128\"] {
                display: block !important;
                width: 128px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .onlyForSmall, *[class~=\"onlyForSmall\"] {
                display: block !important;
                width: 280px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .hideForSmall, *[class~=\"hideForSmall\"] {
                width: 0 !important;
                display: none !important;
            }

            .boRed {
                border-top: #e0215a 1px solid;
                border-left: 0;
            }
        }

        @media screen and (max-width: 420px) {
            .padding10, *[class~=\"padding10\"] {
                padding: 10px !important;
            }

            .padBot, *[class~=\"padBot\"] {
                padding: 0 !important;
                padding-bottom: 15px !important;
                height: auto !important
            }

            .padTop, *[class~=\"padTop\"] {
                padding-top: 15px !important;
            }

            .padBotTop10, *[class~=\"padBotTop10\"] {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }

            .pad30, *[class~=\"pad20\"] {
                padding: 20px !important;
            }

            .w320, *[class~=\"w320\"] {
                width: 320px !important;
                margin: 0 auto;
            }

            .w300, *[class~=\"w300\"] {
                width: 300px !important;
            }

            .hidsmart, *[class~=\"hidsmart\"] {
                width: 0;
                display: none !important;
            }

            .showsmart, *[class~=\"showsmartsimple\"] {
                display: inline-block !important;
                width: auto !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart, *[class~=\"showsmart\"] {
                display: inline-block !important;
                width: auto !important;
                max-height: inherit !important;
                overflow: visible !important;
            }
        }
    </style>
</head>
<body style=\"-webkit-font-smoothing: antialiased;min-width:100% !important;background:#f3f4f7;-webkit-text-size-adjust:none; margin:0 auto;padding:0;\">
<!--[if !mso]>
<!-->
<div style=\"display:none; max-height:0; visibility:hidden; mso-hide:all;\">
    INCYTE : Ce créneau n'est plus disponible
</div>
<!--
<![endif]-->
<center style=\"width:100% !important; height:100% !important; table-layout:fixed !important; background-color:#f3f4f7;\">
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"margin:auto;\">
        <tbody>
        <tr>
            <td align=\"center\">
                <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"
                       style=\"background-color: #FFFFFF\" class=\"w100p\">
                    <tbody>
                    <!-- PREHEADER -->
                    <tr>
                        <td style=\"background-color: #f3f4f7; color:#999999;text-align: center; font-size: 13px; mso-padding-alt: 15px; padding: 15px;\">
                            <a style=\"color:#999999; text-decoration:none;\" href=\"#\" target=\"_blank\">Voir dans le
                                navigateur</a>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"font-size: 0; mso-padding-alt: 0; padding: 0; background-color: #285eb4; height: 10px;\"></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 30px; padding: 30px; font-size: 24px; background-color:white; mso-line-height: exactly; line-height: 0px;\"
                            align=\"center\"><img src=\"https://evenements-incyte.com/public/email/images/logo.png\" width=\"142\"
                                                height=\"95\" alt=\"Incyte\"/></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 30px 45px; padding: 30px 45px;  font-size: 30px; background-color:white; mso-line-height: exactly; font-weight: 800; color: #e2574c;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;\"
                            align=\"center\">";
        // line 365
        echo (((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 365, $this->source); })()), "customer"))) ? ("Votre rendez-vous a été annulé") : ("Ce créneau n'est plus disponible"));
        echo "</td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px; padding: 20px; font-size: 24px; background-color:white; mso-line-height: exactly; line-height: 0px;\"
                            align=\"center\"><img src=\"https://evenements-incyte.com/public/email/images/picto-refus.jpg\"
                                                width=\"235\" height=\"200\" alt=\"\"/></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px; padding: 20px; background-color:white; mso-line-height: exactly;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;\"
                            align=\"center\"><span
                                    style=\"font-size: 24px; color: #0049a1; font-weight: 800; text-transform: uppercase;\">";
        // line 375
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meeting"]) || array_key_exists("meeting", $context) ? $context["meeting"] : (function () { throw new RuntimeError('Variable "meeting" does not exist.', 375, $this->source); })()), "startDate", [], "any", false, false, false, 375), "full", "none", "", null, "gregorian", "fr"), "html", null, true);
        echo "</span><br><span
                                    style=\"font-size: 20px; color: #000000; font-weight: 800; text-transform: uppercase;\">";
        // line 376
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meeting"]) || array_key_exists("meeting", $context) ? $context["meeting"] : (function () { throw new RuntimeError('Variable "meeting" does not exist.', 376, $this->source); })()), "startDate", [], "any", false, false, false, 376), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meeting"]) || array_key_exists("meeting", $context) ? $context["meeting"] : (function () { throw new RuntimeError('Variable "meeting" does not exist.', 376, $this->source); })()), "endDate", [], "any", false, false, false, 376), "H:i"), "html", null, true);
        echo "</span>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px 45px; padding: 20px 45px; background-color:white; mso-line-height: exactly;\"
                            align=\"center\">
                                ";
        // line 382
        if ((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 382, $this->source); })()), "customer"))) {
            // line 383
            echo "                                    <p style=\"font-size: 20px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                        Votre contact a annulé votre rendez-vous.
                                    </p>
                                    <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;font-weight: 400;\">
                                        Vous trouverez ci-dessous la raison de cette annulation.                                    </p>
                                ";
        } else {
            // line 389
            echo "                            <p style=\"font-size: 20px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                Vous trouverez ci-dessous les informations nécessaires à la planification d’un nouveau
                                rendez-vous :
                            </p>
                            <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;font-weight: 400;\">
                                Pour plus d’informations, n’hésitez pas à me contacter aux coordonnées ci-dessous.
                            </p>
                            ";
        }
        // line 397
        echo "
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 35px; padding: 35px; background-color:white; mso-line-height: exactly;\"
                            align=\"center\">
                            <table width=\"630\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\">
                                <tbody>
                                <tr>
                                    <td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px; border-bottom: #efefef 1px solid; border-top: #efefef 1px solid;\">
                                        <span style=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">MOTIF DE L'ANNULATION</span>
                                        <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                            ";
        // line 409
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["meeting"]) || array_key_exists("meeting", $context) ? $context["meeting"] : (function () { throw new RuntimeError('Variable "meeting" does not exist.', 409, $this->source); })()), "reasonCancel", [], "any", false, false, false, 409), "html", null, true);
        echo "
                                        </p></td>
                                </tr>
                                <tr>
                                    <td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px; border-bottom: #efefef 1px solid;\">
                                        <span style=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">Contact</span>
                                        <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                            ";
        // line 416
        if ((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 416, $this->source); })()), "customer"))) {
            // line 417
            echo "                                            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 417, $this->source); })()), "civility", [], "any", false, false, false, 417), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 417, $this->source); })()), "lastname", [], "any", false, false, false, 417), "html", null, true);
            echo "<br>
                                            ";
            // line 418
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 418, $this->source); })()), "email", [], "any", false, false, false, 418), "html", null, true);
            echo "<br>
                                            ";
            // line 419
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 419, $this->source); })()), "localisation", [], "any", false, false, false, 419), "html", null, true);
            echo "<br>
                                            ";
            // line 420
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 420, $this->source); })()), "phone", [], "any", false, false, false, 420), "html", null, true);
            echo "
                                            ";
        } else {
            // line 422
            echo "                                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contact"]) || array_key_exists("contact", $context) ? $context["contact"] : (function () { throw new RuntimeError('Variable "contact" does not exist.', 422, $this->source); })()), "lastname", [], "any", false, false, false, 422), "html", null, true);
            echo "<br>
                                                ";
            // line 423
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contact"]) || array_key_exists("contact", $context) ? $context["contact"] : (function () { throw new RuntimeError('Variable "contact" does not exist.', 423, $this->source); })()), "email", [], "any", false, false, false, 423), "html", null, true);
            echo "<br>
                                                ";
            // line 424
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contact"]) || array_key_exists("contact", $context) ? $context["contact"] : (function () { throw new RuntimeError('Variable "contact" does not exist.', 424, $this->source); })()), "localisation", [], "any", false, false, false, 424), "html", null, true);
            echo "<br>
                                                ";
            // line 425
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contact"]) || array_key_exists("contact", $context) ? $context["contact"] : (function () { throw new RuntimeError('Variable "contact" does not exist.', 425, $this->source); })()), "phone", [], "any", false, false, false, 425), "html", null, true);
            echo "
                                            ";
        }
        // line 427
        echo "                                        </p></td>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- END PREHEADER -->
                    <!-- HEADER -->
                    <tr>
                        <td style=\"font-size: 20px; background-color:white; mso-line-height: exactly; text-align: center\"
                            class=\"w100p\" valign=\"top\">
                            <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\">
                                <tr>
                                    <td><!--[if (gte mso 9)|(IE)]></td>
                                        <td valign=\"top\"><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px; padding: 20px;\" align=\"center\">
                            <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"w100p\">
                                <tbody>
                                <tr>
                                    <td style=\"mso-padding-alt: 0px; padding: 0px;\" align=\"center\">
                                        <div>
                                            <!--[if mso]>
                                            <v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\"
                                                         xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"#\"
                                                         arcsize=\"50%\"
                                                         style=\"height:55px;v-text-anchor:middle;width:520px;\"
                                                         stroke=\"f\" fillcolor=\"#285eb4\">
                                                <w:anchorlock/>
                                                <center>
                                            <![endif]-->
                                            ";
        // line 463
        if ((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 463, $this->source); })()), "contact"))) {
            // line 464
            echo "                                                <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["domain_name"]) || array_key_exists("domain_name", $context) ? $context["domain_name"] : (function () { throw new RuntimeError('Variable "domain_name" does not exist.', 464, $this->source); })()), "html", null, true);
            echo "/congres/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 464, $this->source); })()), "id", [], "any", false, false, false, 464), "html", null, true);
            echo "/contact?firstname=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 464, $this->source); })()), "firstname", [], "any", false, false, false, 464), "html", null, true);
            echo "&lastname=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 464, $this->source); })()), "lastname", [], "any", false, false, false, 464), "html", null, true);
            echo "&mail=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 464, $this->source); })()), "email", [], "any", false, false, false, 464), "html", null, true);
            echo "&phone=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 464, $this->source); })()), "phone", [], "any", false, false, false, 464), "html", null, true);
            echo "&civility=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 464, $this->source); })()), "civility", [], "any", false, false, false, 464), "html", null, true);
            echo "&localisation=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 464, $this->source); })()), "localisation", [], "any", false, false, false, 464), "html", null, true);
            echo "&reason=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["meeting"]) || array_key_exists("meeting", $context) ? $context["meeting"] : (function () { throw new RuntimeError('Variable "meeting" does not exist.', 464, $this->source); })()), "reason", [], "any", false, false, false, 464), "id", [], "any", false, false, false, 464), "html", null, true);
            echo "&contact=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contact"]) || array_key_exists("contact", $context) ? $context["contact"] : (function () { throw new RuntimeError('Variable "contact" does not exist.', 464, $this->source); })()), "id", [], "any", false, false, false, 464), "html", null, true);
            echo "\"
                                                   style=\"font-family:'Arial','Verdana',sans-serif;background-color:#285eb4;color:#ffffff;display:inline-block;font-size:19px;font-weight:bold;height:50px;line-height:50px;mso-line-height:45px;text-align:center;text-decoration:none;width:445px;-webkit-text-size-adjust:none;border-radius: 50px;\"
                                                   class=\"but w100p\"
                                                >
                                                    Plannifier un nouveau rendez-vous
                                                </a>
                                            ";
        } else {
            // line 471
            echo "                                                <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["domain_name"]) || array_key_exists("domain_name", $context) ? $context["domain_name"] : (function () { throw new RuntimeError('Variable "domain_name" does not exist.', 471, $this->source); })()), "html", null, true);
            echo "/planning/user/";
            echo twig_escape_filter($this->env, (isset($context["mailCrypt"]) || array_key_exists("mailCrypt", $context) ? $context["mailCrypt"] : (function () { throw new RuntimeError('Variable "mailCrypt" does not exist.', 471, $this->source); })()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["congres"]) || array_key_exists("congres", $context) ? $context["congres"] : (function () { throw new RuntimeError('Variable "congres" does not exist.', 471, $this->source); })()), "id", [], "any", false, false, false, 471), "html", null, true);
            echo "\"
                                                   style=\"font-family:'Arial','Verdana',sans-serif;background-color:#285eb4;color:#ffffff;display:inline-block;font-size:19px;font-weight:bold;height:50px;line-height:50px;mso-line-height:45px;text-align:center;text-decoration:none;width:445px;-webkit-text-size-adjust:none;border-radius: 50px;\"
                                                   class=\"but w100p\"
                                                >
                                                    Accéder à mon agenda
                                                </a>
                                            ";
        }
        // line 478
        echo "                                            <!--[if mso]></center></v:roundrect><![endif]-->
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 0 ; padding: 0;\" align=\"center\">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt:20px; padding:20px;font-size: 11px;color: #303030;background-color: #f3f4f7;\"
                            align=\"left\">
                            ";
        // line 492
        if ((0 === twig_compare((isset($context["refusedBy"]) || array_key_exists("refusedBy", $context) ? $context["refusedBy"] : (function () { throw new RuntimeError('Variable "refusedBy" does not exist.', 492, $this->source); })()), "customer"))) {
            // line 493
            echo "                            <p>
                                Vous recevez cet email car vous avez planifié un rdv avec un collaborateur
                                Incyte en utilisant la web app.<br>
                                <strong>L’essentiel sur le traitement de vos données lorsque vous téléchargez la web
                                    app</strong><br>
                                Lorsque vous utilisez la web application, vos données personnelles sont traitées par
                                Incyte Biosciences France (35 ter avenue André Morizet 92100 Boulogne Billancourt) aux
                                fins de planifier des réunions entre les collaborateurs Incyte présents au congrès et
                                vous. Vous disposez d’un droit d’accès, de rectification et d’effacement de vos données
                                et d’un droit à la limitation du traitement. Vous pouvez vous opposer au traitement de
                                vos données pour des raisons tenant à votre situation particulière. Les statistiques
                                d’utilisation (nombre de téléchargements de la web app, nombre de documents téléchargés
                                et nombre de rdv pris) sont calculées de manière anonyme à partir de la web app, sans
                                que vous ou votre terminal ne soyez tracé (aucun dépôt de cookies ou autres
                                traceurs).<br>
                                Vous pouvez exercer vos droits auprès du DPO d’Incyte : <a
                                        href=\"mailto:Privacy@incyte.com\">Privacy@incyte.com</a>. Vous pouvez introduire
                                une réclamation auprès de la CNIL (<a href=\"https://www.cnil.fr\">www.cnil.fr</a>).</p>
                            <p>&nbsp;</p>
                            <p><strong>Informations complémentaires :</strong><br>
                                Vos données saisies dans la web app sont accessibles à Incyte et à Surf (l’agence en
                                charge du développement et de l’hébergement de la web app) et seront supprimées au plus
                                tard 1 mois après la fin du congrès. Incyte traite vos données personnelles sur la base
                                de son intérêt légitime en termes d’organisation et de gestion des ressources humaines.
                                La prise de rdv via la web app ne présente aucun caractère réglementaire ou contractuel
                                et vous pouvez également rencontrer nos collaborateurs présents au congrès sans rdv
                                préalable ou planifier une réunion en utilisant les modes de communications habituels.
                                La prise de rdv via la web app s’inscrit dans un traitement de données plus global ayant
                                pour finalité la gestion des relations avec les professionnels de santé. Pour une
                                information complète relative au traitement de vos données à des fins d’information
                                promotionnelle : <a href=\"https://www.incyte.fr.\">www.incyte.fr.</a></p>
                            <p>&nbsp;</p>
                            ";
        }
        // line 526
        echo "
                            <p>INS.020.2020</p></td>
                    </tr>
                    <!-- END CONTENT -->
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</center>
</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/annulationMeeting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  658 => 526,  623 => 493,  621 => 492,  605 => 478,  590 => 471,  561 => 464,  559 => 463,  521 => 427,  516 => 425,  512 => 424,  508 => 423,  503 => 422,  498 => 420,  494 => 419,  490 => 418,  483 => 417,  481 => 416,  471 => 409,  457 => 397,  447 => 389,  439 => 383,  437 => 382,  426 => 376,  422 => 375,  409 => 365,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\"
      xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"x-apple-disable-message-reformatting\">
    <!--[if gte mso 12]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>
                96
            </o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <style type=\"text/css\">
        @font-face {
            font-family: 'OpenSans-Regular';
            font-style: normal;
            font-weight: 400;
            src: local('OpenSans-Regular'), url(\"https://evenements-incyte.com/public/email/fonts/OpenSans-Regular.woff2\") format('woff2');
        }

        @font-face {
            font-family: 'OpenSans-Bold';
            font-style: normal;
            font-weight: 800;
            src: local('OpenSans-Bold'), url(\"https://evenements-incyte.com/public/email/fonts/OpenSans-Bold.woff2\") format('woff2');
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass, .ExternalClass *, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass
        body, html {
            min-width: 100% !important;
            margin: 0 auto !important;
            padding: 0 !important;
            background-color: #f3f4f7;
            font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;
\t\t\tline-height: normal;
        }

        * {
            text-size-adjust: none;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased !important
        }

        table {
            border-collapse: collapse !important;
            border-spacing: 0
        }

        table, td {
            mso-table-lspace: 0;
            mso-table-rspace: 0
        }

        img {
            -ms-interpolation-mode: bicubic
        }

        *[x-apple-data-detectors], .unstyle-auto-detected-links *, .aBn {
            cursor: default !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            color: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
            border-bottom: 0 !important
        }

        div {
            line-height: 100%;
        }

        p {
            margin: 0;
            padding: 0;
            margin-bottom: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            color: black;
            line-height: 100%;
        }

        a, a:link {
            color: #2A5DB0;
            text-decoration: underline;
        }

        body, table, td, p, a, li, blockquote {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
\t\t\tline-height: normal;
        }

        .appleLinks, .appleLinksWhite {
            text-decoration: none !important;
        }

        .but {
            background-color: #285eb4 !important;
            background-repeat: no-repeat;
            background-position-x: 15px;
            background-position-y: center;
            color: #FFF;
            border: #285eb4 2px solid;
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }

        .but:hover {
            background-color: #FFF !important;
            color: #285eb4 !important;
            border: #285eb4 2px solid;
        }

        .boRed {
            border-left: #73a1da 1px solid;
            border-top: 0;
        }

        .showsmart, *[class~=\"showsmart\"] {
            width: 0;
            display: none !important;
        }

        .hidsmart, *[class~=\"hidsmart\"] {
            display: block !important;
            max-height: inherit !important;
            overflow: visible !important;
        }

        @media screen and (max-width: 700px) {
            body {
                width: auto !important;
            }

            .w100p, *[class~=\"w100p\"] {
                width: 100% !important;
            }

            .w10, *[class~=\"w10\"] {
                width: 10px !important;
            }

            .h20, *[class~=\"h20\"] {
                height: 20px !important;
            }

            .pad10, *[class~=\"pad10\"] {
                padding: 10px !important;
            }

            .pad30, *[class~=\"pad30\"] {
                padding: 30px !important;
            }

            .padTop10, *[class~=\"padTop10\"] {
                padding-top: 10px !important;
            }

            .pad0, *[class~=\"pad0\"] {
                padding: 0px !important;
            }

            .fz13, *[class~=\"fz13\"] {
                font-size: 13px !important;
            }

            .noflo, *[class~=\"noflo\"] {
                float: none !important;
            }

            .hidsmart, *[class~=\"hidsmart\"] {
                width: 0;
                display: none !important;
            }

            .showsmart, *[class~=\"showsmartsimple\"] {
                display: inline-block !important;
                width: auto !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart, *[class~=\"showsmart\"] {
                display: inline-block !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .noborder, *[class~=\"noborder\"] {
                border: none !important;
            }

            .tac, *[class~=\"tac\"] {
                text-align: center;
            }

            .padBot, *[class~=\"padBot\"] {
                padding: 0 !important;
                padding-bottom: 15px !important;
                height: auto !important
            }

            .showsmart300, *[class~=\"showsmart300\"] {
                display: block !important;
                width: 300px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart280, *[class~=\"showsmart280\"] {
                display: block !important;
                width: 280px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart230, *[class~=\"showsmart230\"] {
                display: block !important;
                width: 230px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart187, *[class~=\"showsmart187\"] {
                display: block !important;
                width: 230px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart255, *[class~=\"showsmart255\"] {
                display: block !important;
                width: 255px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart128, *[class~=\"showsmart128\"] {
                display: block !important;
                width: 128px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .onlyForSmall, *[class~=\"onlyForSmall\"] {
                display: block !important;
                width: 280px !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .hideForSmall, *[class~=\"hideForSmall\"] {
                width: 0 !important;
                display: none !important;
            }

            .boRed {
                border-top: #e0215a 1px solid;
                border-left: 0;
            }
        }

        @media screen and (max-width: 420px) {
            .padding10, *[class~=\"padding10\"] {
                padding: 10px !important;
            }

            .padBot, *[class~=\"padBot\"] {
                padding: 0 !important;
                padding-bottom: 15px !important;
                height: auto !important
            }

            .padTop, *[class~=\"padTop\"] {
                padding-top: 15px !important;
            }

            .padBotTop10, *[class~=\"padBotTop10\"] {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }

            .pad30, *[class~=\"pad20\"] {
                padding: 20px !important;
            }

            .w320, *[class~=\"w320\"] {
                width: 320px !important;
                margin: 0 auto;
            }

            .w300, *[class~=\"w300\"] {
                width: 300px !important;
            }

            .hidsmart, *[class~=\"hidsmart\"] {
                width: 0;
                display: none !important;
            }

            .showsmart, *[class~=\"showsmartsimple\"] {
                display: inline-block !important;
                width: auto !important;
                max-height: inherit !important;
                overflow: visible !important;
            }

            .showsmart, *[class~=\"showsmart\"] {
                display: inline-block !important;
                width: auto !important;
                max-height: inherit !important;
                overflow: visible !important;
            }
        }
    </style>
</head>
<body style=\"-webkit-font-smoothing: antialiased;min-width:100% !important;background:#f3f4f7;-webkit-text-size-adjust:none; margin:0 auto;padding:0;\">
<!--[if !mso]>
<!-->
<div style=\"display:none; max-height:0; visibility:hidden; mso-hide:all;\">
    INCYTE : Ce créneau n'est plus disponible
</div>
<!--
<![endif]-->
<center style=\"width:100% !important; height:100% !important; table-layout:fixed !important; background-color:#f3f4f7;\">
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"margin:auto;\">
        <tbody>
        <tr>
            <td align=\"center\">
                <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"
                       style=\"background-color: #FFFFFF\" class=\"w100p\">
                    <tbody>
                    <!-- PREHEADER -->
                    <tr>
                        <td style=\"background-color: #f3f4f7; color:#999999;text-align: center; font-size: 13px; mso-padding-alt: 15px; padding: 15px;\">
                            <a style=\"color:#999999; text-decoration:none;\" href=\"#\" target=\"_blank\">Voir dans le
                                navigateur</a>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"font-size: 0; mso-padding-alt: 0; padding: 0; background-color: #285eb4; height: 10px;\"></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 30px; padding: 30px; font-size: 24px; background-color:white; mso-line-height: exactly; line-height: 0px;\"
                            align=\"center\"><img src=\"https://evenements-incyte.com/public/email/images/logo.png\" width=\"142\"
                                                height=\"95\" alt=\"Incyte\"/></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 30px 45px; padding: 30px 45px;  font-size: 30px; background-color:white; mso-line-height: exactly; font-weight: 800; color: #e2574c;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;\"
                            align=\"center\">{{ refusedBy == 'customer' ? 'Votre rendez-vous a été annulé' : 'Ce créneau n\\'est plus disponible' }}</td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px; padding: 20px; font-size: 24px; background-color:white; mso-line-height: exactly; line-height: 0px;\"
                            align=\"center\"><img src=\"https://evenements-incyte.com/public/email/images/picto-refus.jpg\"
                                                width=\"235\" height=\"200\" alt=\"\"/></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px; padding: 20px; background-color:white; mso-line-height: exactly;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;\"
                            align=\"center\"><span
                                    style=\"font-size: 24px; color: #0049a1; font-weight: 800; text-transform: uppercase;\">{{ meeting.startDate|format_datetime('full', 'none', locale='fr') }}</span><br><span
                                    style=\"font-size: 20px; color: #000000; font-weight: 800; text-transform: uppercase;\">{{ meeting.startDate|date('H:i') }} - {{ meeting.endDate|date('H:i') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px 45px; padding: 20px 45px; background-color:white; mso-line-height: exactly;\"
                            align=\"center\">
                                {% if refusedBy == 'customer' %}
                                    <p style=\"font-size: 20px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                        Votre contact a annulé votre rendez-vous.
                                    </p>
                                    <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;font-weight: 400;\">
                                        Vous trouverez ci-dessous la raison de cette annulation.                                    </p>
                                {% else %}
                            <p style=\"font-size: 20px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                Vous trouverez ci-dessous les informations nécessaires à la planification d’un nouveau
                                rendez-vous :
                            </p>
                            <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;font-weight: 400;\">
                                Pour plus d’informations, n’hésitez pas à me contacter aux coordonnées ci-dessous.
                            </p>
                            {% endif %}

                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 35px; padding: 35px; background-color:white; mso-line-height: exactly;\"
                            align=\"center\">
                            <table width=\"630\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\">
                                <tbody>
                                <tr>
                                    <td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px; border-bottom: #efefef 1px solid; border-top: #efefef 1px solid;\">
                                        <span style=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">MOTIF DE L'ANNULATION</span>
                                        <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                            {{ meeting.reasonCancel }}
                                        </p></td>
                                </tr>
                                <tr>
                                    <td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px; border-bottom: #efefef 1px solid;\">
                                        <span style=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">Contact</span>
                                        <p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                            {% if refusedBy == 'customer' %}
                                            {{ customer.civility }} {{ customer.lastname }}<br>
                                            {{ customer.email }}<br>
                                            {{ customer.localisation }}<br>
                                            {{ customer.phone }}
                                            {% else %}
                                                {{ contact.lastname }}<br>
                                                {{ contact.email }}<br>
                                                {{ contact.localisation }}<br>
                                                {{ contact.phone }}
                                            {% endif %}
                                        </p></td>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- END PREHEADER -->
                    <!-- HEADER -->
                    <tr>
                        <td style=\"font-size: 20px; background-color:white; mso-line-height: exactly; text-align: center\"
                            class=\"w100p\" valign=\"top\">
                            <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\">
                                <tr>
                                    <td><!--[if (gte mso 9)|(IE)]></td>
                                        <td valign=\"top\"><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px; padding: 20px;\" align=\"center\">
                            <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"w100p\">
                                <tbody>
                                <tr>
                                    <td style=\"mso-padding-alt: 0px; padding: 0px;\" align=\"center\">
                                        <div>
                                            <!--[if mso]>
                                            <v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\"
                                                         xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"#\"
                                                         arcsize=\"50%\"
                                                         style=\"height:55px;v-text-anchor:middle;width:520px;\"
                                                         stroke=\"f\" fillcolor=\"#285eb4\">
                                                <w:anchorlock/>
                                                <center>
                                            <![endif]-->
                                            {% if refusedBy == 'contact' %}
                                                <a href=\"{{ domain_name }}/congres/{{ congres.id }}/contact?firstname={{ customer.firstname }}&lastname={{ customer.lastname }}&mail={{ customer.email }}&phone={{ customer.phone }}&civility={{ customer.civility }}&localisation={{ customer.localisation }}&reason={{ meeting.reason.id }}&contact={{ contact.id }}\"
                                                   style=\"font-family:'Arial','Verdana',sans-serif;background-color:#285eb4;color:#ffffff;display:inline-block;font-size:19px;font-weight:bold;height:50px;line-height:50px;mso-line-height:45px;text-align:center;text-decoration:none;width:445px;-webkit-text-size-adjust:none;border-radius: 50px;\"
                                                   class=\"but w100p\"
                                                >
                                                    Plannifier un nouveau rendez-vous
                                                </a>
                                            {% else %}
                                                <a href=\"{{ domain_name }}/planning/user/{{ mailCrypt }}/{{ congres.id }}\"
                                                   style=\"font-family:'Arial','Verdana',sans-serif;background-color:#285eb4;color:#ffffff;display:inline-block;font-size:19px;font-weight:bold;height:50px;line-height:50px;mso-line-height:45px;text-align:center;text-decoration:none;width:445px;-webkit-text-size-adjust:none;border-radius: 50px;\"
                                                   class=\"but w100p\"
                                                >
                                                    Accéder à mon agenda
                                                </a>
                                            {% endif %}
                                            <!--[if mso]></center></v:roundrect><![endif]-->
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 0 ; padding: 0;\" align=\"center\">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt:20px; padding:20px;font-size: 11px;color: #303030;background-color: #f3f4f7;\"
                            align=\"left\">
                            {% if refusedBy == 'customer' %}
                            <p>
                                Vous recevez cet email car vous avez planifié un rdv avec un collaborateur
                                Incyte en utilisant la web app.<br>
                                <strong>L’essentiel sur le traitement de vos données lorsque vous téléchargez la web
                                    app</strong><br>
                                Lorsque vous utilisez la web application, vos données personnelles sont traitées par
                                Incyte Biosciences France (35 ter avenue André Morizet 92100 Boulogne Billancourt) aux
                                fins de planifier des réunions entre les collaborateurs Incyte présents au congrès et
                                vous. Vous disposez d’un droit d’accès, de rectification et d’effacement de vos données
                                et d’un droit à la limitation du traitement. Vous pouvez vous opposer au traitement de
                                vos données pour des raisons tenant à votre situation particulière. Les statistiques
                                d’utilisation (nombre de téléchargements de la web app, nombre de documents téléchargés
                                et nombre de rdv pris) sont calculées de manière anonyme à partir de la web app, sans
                                que vous ou votre terminal ne soyez tracé (aucun dépôt de cookies ou autres
                                traceurs).<br>
                                Vous pouvez exercer vos droits auprès du DPO d’Incyte : <a
                                        href=\"mailto:Privacy@incyte.com\">Privacy@incyte.com</a>. Vous pouvez introduire
                                une réclamation auprès de la CNIL (<a href=\"https://www.cnil.fr\">www.cnil.fr</a>).</p>
                            <p>&nbsp;</p>
                            <p><strong>Informations complémentaires :</strong><br>
                                Vos données saisies dans la web app sont accessibles à Incyte et à Surf (l’agence en
                                charge du développement et de l’hébergement de la web app) et seront supprimées au plus
                                tard 1 mois après la fin du congrès. Incyte traite vos données personnelles sur la base
                                de son intérêt légitime en termes d’organisation et de gestion des ressources humaines.
                                La prise de rdv via la web app ne présente aucun caractère réglementaire ou contractuel
                                et vous pouvez également rencontrer nos collaborateurs présents au congrès sans rdv
                                préalable ou planifier une réunion en utilisant les modes de communications habituels.
                                La prise de rdv via la web app s’inscrit dans un traitement de données plus global ayant
                                pour finalité la gestion des relations avec les professionnels de santé. Pour une
                                information complète relative au traitement de vos données à des fins d’information
                                promotionnelle : <a href=\"https://www.incyte.fr.\">www.incyte.fr.</a></p>
                            <p>&nbsp;</p>
                            {% endif %}

                            <p>INS.020.2020</p></td>
                    </tr>
                    <!-- END CONTENT -->
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</center>
</body>
</html>", "emails/annulationMeeting.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/emails/annulationMeeting.html.twig");
    }
}
