<?php

namespace App\Service\Reader;

class CsvSource extends AbstractSource
{
    /**
     * @var string
     */
    public const SOURCE_FIlE = 'testtakers.csv';

    /**
     * @return array
     */
    public function read(): array
    {
        $data = [];
        $file = fopen(
            sprintf('%s%s%s', $this->projectDir, self::RESOURCE_PATH, self::SOURCE_FIlE),
            'rb'
        );
        $header = fgetcsv($file);

        while ($row = fgetcsv($file)) {
            $data[] = array_combine($header, $row);
        }

        return $data;
    }
}
