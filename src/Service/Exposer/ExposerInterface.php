<?php
namespace App\Service\Exposer;

interface ExposerInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function expose(array $data): string;
}
