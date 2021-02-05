<?php

namespace App\Tools;

use setasign\Fpdi\Fpdi;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class PdfGenerator
{
    /**
     * @var string
     */
    private $qrCodeDir;
    /**
     * @var QrCodeHandler
     */
    private $qrCodeHandler;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(QrCodeHandler $qrCodeHandler, ParameterBagInterface $params, RouterInterface $router)
    {
        $this->qrCodeDir = $params->get('qr_code_dir');
        $this->qrCodeHandler = $qrCodeHandler;
        $this->router = $router;
    }

    public function getPdfDyno(array $products)
    {
        $pdf = new Fpdi('P', 'mm', [28, 89]);
        $pdf->AddPage();
        $pdf->setSourceFile($this->qrCodeDir . '/28x89_template.pdf');
        $templateId = $pdf->importPage(1);

        $pdf->useTemplate($templateId, 0, 0, 1);
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->SetTextColor(255, 0, 0);

        $currentProduct = $products[0];
        $image = $this->qrCodeDir . "/images/{$currentProduct->getId()}.png";
        if (!file_exists($image)) {
            $this->generateQrCode($currentProduct);
        }

        $pdf->SetXY(7, 26);
        $pdf->Write(0, 'id:' . $currentProduct->getId());
        $pdf->SetXY(4, 4);
        $pdf->Cell(20, 20, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), /*side*/ 20), 0, 0, 'C', false);

        $tempFilePath = "{$this->qrCodeDir}/temp/dyno.pdf";
        $pdf->Output($tempFilePath, 'F');

        return $tempFilePath;
    }

    /**
     * @param $currentProduct
     */
    private function generateQrCode($currentProduct): void
    {
        $url = $this->router->generate('produit_show', ['id' => $currentProduct->getId()], UrlGeneratorInterface::ABSOLUTE_URL);
        $this->qrCodeHandler->generateQrCode($url);
        $this->qrCodeHandler->saveQrImage($currentProduct->getId());
    }
}
