<?php

namespace App\Service\Reader;

class JsonSource extends AbstractSource
{
    /**
     * @var string
     */
    public const SOURCE_FIlE = 'testtakers.json';
    /**
     * @return array
     */
    public function read(): array
    {
        $data = file_get_contents(
            sprintf('%s%s%s', $this->projectDir, self::RESOURCE_PATH, self::SOURCE_FIlE)
        );
        return json_decode($data, true);
    }
}
