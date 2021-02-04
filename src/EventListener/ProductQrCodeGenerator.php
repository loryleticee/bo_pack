<?php

namespace App\EventListener;

use App\Entity\Produit;
use App\Tools\QrCodeHandler;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class ProductQrCodeGenerator {
    /**
     * @var QrCodeHandler
     */
    private $qrCodeHandler;

    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(QrCodeHandler $qrCodeHandler, RouterInterface $router)
    {
        $this->qrCodeHandler = $qrCodeHandler;
        $this->router = $router;
    }

    public function postPersist(Produit $product, LifecycleEventArgs $event): void
    {
        $url = $this->router->generate('produit_show', [ 'id' => $product->getId()], UrlGeneratorInterface::ABSOLUTE_URL);
        $this->qrCodeHandler->generateQrCode($url);
        $this->qrCodeHandler->saveQrImage($product->getId());
    }
}
