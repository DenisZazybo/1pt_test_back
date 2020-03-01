<?php
namespace App\Service\Exposer;

class JsonExposer implements ExposerInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function expose(array $data): string
    {
        return json_encode($data);
    }
}
