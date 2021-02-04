<?php

namespace App\Tools;

use setasign\Fpdi\Fpdi;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class PdfGenerator
{
    const ITEMS_PER_PAGE = 12; // always an even number
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

    public function getPdf(array $products)
    {
        $files = $this->generatePdfFragments($products);

        $pdf = new FPDI();

        foreach ($files as $index => $file) {
            $pageCount = $pdf->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $templateId = $pdf->importPage($pageNo);
                $size = $pdf->getTemplateSize($templateId);

                if ($size['width'] > $size['height']) {
                    $pdf->AddPage('L', array($size['width'], $size['height']));
                } else {
                    $pdf->AddPage('P', array($size['width'], $size['height']));
                }

                $pdf->useTemplate($templateId);

                $pdf->SetFont('Helvetica');
                $pdf->SetXY(100, 0);
                $pdf->Write(8, 'page ' . ($index + 1));
            }
        }

        $pdf->Output();
    }

    /**
     * @param array $products
     * @return array
     */
    private function generatePdfFragments(array $products): array
    {
        $totalItems = count($products);
        $imagesPerPage = self::ITEMS_PER_PAGE;
        $totalPages = ceil($totalItems / $imagesPerPage);
        $files = [];

        for ($page = 1; $page <= $totalPages; $page++) {
            $pdf = new Fpdi();
            $pdf->AddPage();
            $pdf->setSourceFile($this->qrCodeDir . '/template.pdf');
            $tplIdx = $pdf->importPage(1);

            foreach (range(1, $imagesPerPage) as $item) {
                $pdf->useTemplate($tplIdx, 10, 10, 100);
                $pdf->SetFont('Helvetica');
                $pdf->SetTextColor(255, 0, 0);

                $currentItemIndex = $imagesPerPage * ($page - 1) + $item - 1;
                if (!isset($products[$currentItemIndex])) {
                    break;
                }
                $currentProduct = $products[$currentItemIndex];
                $image = $this->qrCodeDir . "/images/{$currentProduct->getId()}.png";
                if (!file_exists($image)) {
                    $this->generateQrCode($currentProduct);
                }

                if ($item % 2 !== 0) {
                    $y = 20 * $item + 20;
                    $pdf->SetXY(40, $y);
                    $pdf->Write(0, "Item ID : {$currentProduct->getId()}");
                    $pdf->Cell(30, 30, $pdf->Image($image, $pdf->GetX() - 20, $pdf->GetY() - 33, /*side*/ 30), 0, 0, 'C', false);
                } else {
                    $y = 20 * ($item - 1) + 20;
                    $pdf->SetXY(120, $y);
                    $pdf->Write(0, "Item ID : {$currentProduct->getId()}");
                    $pdf->Cell(30, 30, $pdf->Image($image, $pdf->GetX() - 20, $pdf->GetY() - 33, /*side*/ 30), 0, 0, 'C', false);
                }
            }
            $tempFile = "{$this->qrCodeDir}/temp/page{$page}.pdf";
            $pdf->Output($tempFile, 'F');
            $files[] = $tempFile;
        }

        return $files;
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
