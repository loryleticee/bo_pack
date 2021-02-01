<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Base64Encode extends AbstractExtension
{
    /**
     * Gets filters
     *
     * @return array
     */
    public function getFilters()
    {
        return array(
            new TwigFilter('base64_encode', [$this, 'encode']),
        );
    }

    public function getName()
    {
        return 'base64_encode';
    }

    function encode($string)
    {
        return base64_encode($string);
    }

}