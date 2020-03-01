<?php

namespace App\Service;

interface FactoryInterface
{
    const XML = 'xml';
    const JSON = 'json';
    const CSV = 'csv';

    /**
     * @param string $format
     * @return mixed
     */
    public function getData(?string $format);
}
