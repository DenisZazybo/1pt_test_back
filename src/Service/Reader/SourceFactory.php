<?php
namespace App\Service\Reader;

use App\Exception\NotSupportFormatException;
use App\Service\FactoryInterface;

class SourceFactory implements FactoryInterface
{
    /**
     * @var JsonSource
     */
    private $jsonReader;

    /**
     * @var CsvSource
     */
    private $csvReader;

    public function __construct(JsonSource $jsonReader, CsvSource $csvReader)
    {
        $this->jsonReader = $jsonReader;
        $this->csvReader = $csvReader;
    }

    /**
     * @param string $format
     * @return AbstractSource
     * @throws NotSupportFormatException
     */
    public function getData(?string $format): AbstractSource
    {
        switch ($format) {
            case self::JSON:
                return $this->jsonReader;
                break;
            case self::CSV:
                return $this->csvReader;
                break;
            default:
                throw new NotSupportFormatException('Format not supported');
        }
    }
}
