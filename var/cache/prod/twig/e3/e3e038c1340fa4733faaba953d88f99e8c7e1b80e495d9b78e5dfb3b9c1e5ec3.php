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

/* emails/askMeeting.html.twig */
class __TwigTemplate_b06952d162b21a0b6920401475c90c690a8e63d74015f47f516e9b966f1b1d2b extends Template
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
            src: local('OpenSans-Regular'), url(\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/public/email/fonts/OpenSans-Regular.woff2\") format('woff2');
        }

        @font-face {
            font-family: 'OpenSans-Bold';
            font-style: normal;
            font-weight: 800;
            src: local('OpenSans-Bold'), url(\"";
        // line 30
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/public/email/fonts/OpenSans-Bold.woff2\") format('woff2');
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
\t\t\tline-height:normal;
            font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;
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
\t\t\tline-height:normal;
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
\t\t\tline-height:normal;
        }

        .appleLinks, .appleLinksWhite {
            text-decoration: none !important;
        }

        .but_valid {
            background-color: #6fceab !important;
            background-repeat: no-repeat;
            background-position-x: 15px;
            background-position-y: center;
            color: #FFFFFF;
            border: #6fceab 2px solid;
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }

        .but_valid:hover {
            background-color: #FFF !important;
            color: #6fceab !important;
            border: #6fceab 2px solid;
        }

        .but_refus {
            background-color: #ce6f6f !important;
            background-repeat: no-repeat;
            background-position-x: 15px;
            background-position-y: center;
            color: #FFF;
            border: #ce6f6f 2px solid;
            -webkit-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }

        .but_refus:hover {
            background-color: #FFF !important;
            color: #ce6f6f !important;
            border: #ce6f6f 2px solid;
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

            .t-center, *[class~=\"t-center\"] {
                text-align: center !important;
                height: auto !important
            }
        }
    </style>
</head>
<body style=\"-webkit-font-smoothing: antialiased;min-width:100% !important;background:#f3f4f7;-webkit-text-size-adjust:none; margin:0 auto;padding:0;\">
<!--[if !mso]>
<!-->
<div style=\"display:none; max-height:0; visibility:hidden; mso-hide:all;\">
    INCYTE : Vous avez reçu une nouvelle demande de rendez-vous
</div>
<!--
<![endif]-->
<center style=\"width:100% !important; height:100% !important; table-layout:fixed !important; background-color:#f3f4f7;\">
    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
        <tbody>
        <tr>
            <td align=\"center\">
                <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"background-color: #FFFFFF\" class=\"w100p\">
                    <tbody>
                    <!-- PREHEADER -->
                    <tr>
                        <td style=\"background-color: #f3f4f7; color:#999999;text-align: center; font-size: 13px; mso-padding-alt: 15px; padding: 15px;\">
                            <a style=\"color:#999999; text-decoration:none;\" href=\"#\" target=\"_blank\">Voir dans le navigateur</a>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"font-size: 0; mso-padding-alt: 0; padding: 0; background-color: #285eb4; height: 10px;\"></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 30px; padding: 30px; font-size: 24px; background-color:white; mso-line-height: exactly; line-height: 0px;\" align=\"center\">
\t\t\t\t\t\t\t<img src=\"";
        // line 382
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/public/email/images/logo.png\" width=\"142\" height=\"95\" alt=\"Incyte\"/>
\t\t\t\t\t\t</td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 30px 45px; padding:  30px 45px; font-size: 30px; background-color:white; mso-line-height: exactly; line-height: 32px; font-weight: 800; font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;\"
                            align=\"center\">Vous avez reçu une nouvelle demande de rendez-vous
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 10px; padding: 10px; font-size: 24px; background-color:white; mso-line-height: exactly; line-height: 0px;\" align=\"center\">
                            <img src=\"";
        // line 392
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/public/email/images/picto.jpg\" width=\"235\" height=\"200\" alt=\"\"/>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 10px; padding: 10px; background-color:white; mso-line-height: exactly;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;line-height: 26px;\"
                            align=\"center\"><span style=\"font-size: 24px; color: #0049a1; font-weight: 800; text-transform: uppercase;\">";
        // line 397
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, twig_get_attribute($this->env, $this->source, ($context["meeting"] ?? null), "startDate", [], "any", false, false, false, 397), "full", "none", "", null, "gregorian", "fr"), "html", null, true);
        echo "</span>
                            <br>
                            <span style=\"font-size: 20px;line-height: 22px; color: #000000; font-weight: 800; text-transform: uppercase;\">
                                ";
        // line 400
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meeting"] ?? null), "startDate", [], "any", false, false, false, 400), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["meeting"] ?? null), "endDate", [], "any", false, false, false, 400), "H:i"), "html", null, true);
        echo "
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px 30px; padding: 20px 30px; background-color:white; mso-line-height: exactly;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;\" align=\"center\">
\t\t\t\t\t\t\t<table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t  <tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t  <td valign=\"middle\" align=\"center\">
\t\t\t\t\t\t\t\t\t  <table width=\"325\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\" style=\"float:left;\">
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px;\" valign=\"middle\" align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t<!--[if mso]>
\t\t\t\t\t\t\t\t\t\t\t\t<v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"#\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t arcsize=\"50%\" style=\"height:55px;v-text-anchor:middle;width:250px;\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t stroke=\"f\" fillcolor=\"#6fceab\" href=\"";
        // line 418
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/meeting/accept/";
        echo twig_escape_filter($this->env, ($context["meetingIdEncrypt"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<w:anchorlock/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<center>
\t\t\t\t\t\t\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 422
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/meeting/accept/";
        echo twig_escape_filter($this->env, ($context["meetingIdEncrypt"] ?? null), "html", null, true);
        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t   style=\"font-family:'Arial','Verdana',sans-serif;display:inline-block;font-size:19px;font-weight:bold;height:50px;line-height:50px;mso-line-height:45px;text-align:center;text-decoration:none;color: #FFF; width:245px;-webkit-text-size-adjust:none;border-radius: 50px;\"
\t\t\t\t\t\t\t\t\t\t\t\t   class=\"but_valid w100p\">&#10003; &nbsp; Accepter le RDV</a>
\t\t\t\t\t\t\t\t\t\t\t\t<!--[if mso]></center></v:roundrect><![endif]-->
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t<!--[if (gte mso 9)|(IE)]></td><td valign=\"middle\" align=\"center\"><![endif]-->
\t\t\t\t\t\t\t\t\t<table width=\"50\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\"
\t\t\t\t\t\t\t\t\t\t   style=\"float:left;height:90px\">
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px;\" valign=\"middle\"
\t\t\t\t\t\t\t\t\t\t\t\talign=\"center\"><span
\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle=\"font-size: 17px; text-transform: uppercase; color: #7b7b7b; font-weight: 300\">OU</span>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t<!--[if (gte mso 9)|(IE)]></td><td valign=\"middle\" align=\"center\"><![endif]-->
\t\t\t\t\t\t\t\t\t<table width=\"325\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\"
\t\t\t\t\t\t\t\t\t\t   style=\"float:left;\">
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px;\" valign=\"middle\"
\t\t\t\t\t\t\t\t\t\t\t\talign=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t<!--[if mso]>
\t\t\t\t\t\t\t\t\t\t\t\t<v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"#\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t arcsize=\"50%\" style=\"height:55px;v-text-anchor:middle;width:250px;\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t stroke=\"f\" fillcolor=\"#ce6f6f\" href=\"";
        // line 453
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/meeting/refuse/";
        echo twig_escape_filter($this->env, ($context["meetingIdEncrypt"] ?? null), "html", null, true);
        echo "?refusedBy=contact\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<w:anchorlock/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<center>
\t\t\t\t\t\t\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 457
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/meeting/refuse/";
        echo twig_escape_filter($this->env, ($context["meetingIdEncrypt"] ?? null), "html", null, true);
        echo "?refusedBy=contact\"
\t\t\t\t\t\t\t\t\t\t\t\t   style=\"font-family:'Arial','Verdana',sans-serif;display:inline-block;font-size:19px;font-weight:bold;height:50px;line-height:50px;mso-line-height:45px;text-align:center;text-decoration:none;color: #FFF; width:245px;-webkit-text-size-adjust:none;border-radius: 50px;\"
\t\t\t\t\t\t\t\t\t\t\t\t   class=\"but_refus w100p\">&#10005; &nbsp; Refuser le RDV</a>
\t\t\t\t\t\t\t\t\t\t\t\t<!--[if mso]></center></v:roundrect><![endif]-->
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t  </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t  </tbody>
\t\t\t\t\t\t\t</table>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px 45px; padding: 20px 45px; background-color:white; mso-line-height: exactly;\"
                            align=\"center\"><p
                                    style=\"font-size: 20px; line-height: normal; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
                                Veuillez indiquer votre réponse en cliquant ci-dessus</p>
                            <p style=\"font-size: 15px; line-height: normal; color: #000000;font-family: 'OpenSans-Regular', 'Arial', Arial, sans-serif;font-weight: 400;\">
                                Si vous ne répondez pas à ce mail, votre contact ne sera pas informé de la confirmation
                                ou non de votre rendez-vous.</p></td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 35px; padding: 35px; background-color:white; mso-line-height: exactly;\" align=\"center\">
\t\t\t\t\t\t\t<table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t  <tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t  <td valign=\"top\" height=\"140\">
\t\t\t\t\t\t\t\t\t  <table width=\"210\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p t-center\" style=\"float: left; height: 140px\">
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px;border-top: #efefef 1px solid; border-bottom: #efefef 1px solid;\"
\t\t\t\t\t\t\t\t\t\t\t\tvalign=\"top\"><span
\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">Lieu</span>
\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 493
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "name", [], "any", false, false, false, 493), "html", null, true);
        echo "<br>
\t\t\t\t\t\t\t\t\t\t\t\t\tStand Incyte</p></td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t<!--[if (gte mso 9)|(IE)]></td><td valign=\"top\" height=\"140\" width=\"210\"><![endif]-->
\t\t\t\t\t\t\t\t\t<table width=\"210\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p t-center\" style=\"float: left; height: 140px\">
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px;border-top: #efefef 1px solid; border-bottom: #efefef 1px solid;\"
\t\t\t\t\t\t\t\t\t\t\t\tvalign=\"top\"><span
\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">Motif du rendez-vous</span>
\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 506
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["meeting"] ?? null), "reason", [], "any", false, false, false, 506), "name", [], "any", false, false, false, 506), "html", null, true);
        echo "</p></td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t<!--[if (gte mso 9)|(IE)]></td><td valign=\"top\" height=\"140\" width=\"210\"><![endif]-->
\t\t\t\t\t\t\t\t\t<table width=\"210\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p t-center\" style=\"float: left; height: 140px\">
\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"mso-padding-alt: 20px 10px; padding: 20px 10px;border-top: #efefef 1px solid; border-bottom: #efefef 1px solid;\"
\t\t\t\t\t\t\t\t\t\t\t\tvalign=\"top\"><span
\t\t\t\t\t\t\t\t\t\t\t\t\t\tstyle=\"font-size: 13px; text-transform: uppercase; color: #7b7b7b\">Contact</span>
\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-size: 15px; color: #000000;font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 518
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "civility", [], "any", false, false, false, 518), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "lastname", [], "any", false, false, false, 518), "html", null, true);
        echo "<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 519
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "email", [], "any", false, false, false, 519), "html", null, true);
        echo "<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 520
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "localisation", [], "any", false, false, false, 520), "html", null, true);
        echo "<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 521
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "phone", [], "any", false, false, false, 521), "html", null, true);
        echo "</p></td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t  </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t  </tbody>
\t\t\t\t\t\t\t</table>
                        </td>
                    </tr>
                    <!-- END PREHEADER -->
                    <!-- HEADER -->
                    <tr>
                        <td style=\"font-size: 20px; background-color:white; mso-line-height: exactly; text-align: center\"
                            class=\"w100p\" valign=\"top\">
                            <table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"w100p\">
                                <tr>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt: 20px 45px; padding: 20px 45px; background-color: #285eb4; color: #FFF;font-size:15px;\"
                            align=\"center\">
                            Garder bien cet e-mail, si vous souhaitez accéder à votre agenda du congrès et cliquer sur
                            le lien ci-dessous :<br>
                            <a href=\"";
        // line 548
        echo twig_escape_filter($this->env, ($context["domain_name"] ?? null), "html", null, true);
        echo "/planning/user/";
        echo twig_escape_filter($this->env, ($context["mailCrypt"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["congres"] ?? null), "id", [], "any", false, false, false, 548), "html", null, true);
        echo "\"
                               style=\"font-family: 'OpenSans-Bold', 'Arial', Arial, sans-serif;font-weight: 800;color:#ffffff;display:inline-block;font-size:15px;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;text-transform: uppercase;\"><br>
                                Accéder à mon agenda du congrès</a>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"mso-padding-alt:20px; padding:20px;font-size: 11px;color: #303030;background-color: #f3f4f7;\"
                            align=\"center\">
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
    }

    public function getTemplateName()
    {
        return "emails/askMeeting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  646 => 548,  616 => 521,  612 => 520,  608 => 519,  602 => 518,  587 => 506,  571 => 493,  530 => 457,  521 => 453,  485 => 422,  476 => 418,  453 => 400,  447 => 397,  439 => 392,  426 => 382,  71 => 30,  61 => 23,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "emails/askMeeting.html.twig", "/var/www/vhosts/evenements-incyte.com/httpdocs/templates/emails/askMeeting.html.twig");
    }
}
