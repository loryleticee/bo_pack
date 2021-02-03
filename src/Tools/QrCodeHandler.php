<?php

namespace App\Tools;

use Endroid\QrCode\QrCode;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Cocur\Slugify\Slugify;

class QrCodeHandler
{
    /**
     * @var string
     */
    protected $qrCodeDir;

    /**
     * @var Slugify
     */
    protected $slugify;

    /**
     * @var QrCode
     */
    protected $qrCode;

    public function __construct(ParameterBagInterface $params)
    {
        $this->qrCodeDir = $params->get('qr_code_dir');
        $this->slugify = new Slugify();
    }

    public function generateQrCode($string)
    {
        $this->qrCode = new QrCode($string);
    }
    public function saveQrImage($string)
    {
        $slug = $this->slugify->slugify($string);
        $this->qrCode->writeFile("{$this->qrCodeDir}/images/$slug.png");
    }
}
