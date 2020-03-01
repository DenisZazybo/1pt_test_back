<?php
namespace App\Service\Exposer;

use App\Exception\NotSupportFormatException;
use App\Service\FactoryInterface;

class ExposerFactory implements FactoryInterface
{
    /**
     * @var JsonExposer
     */
    private $jsonExposer;

    /**
     * @var XmlExposer
     */
    private $xmlExposer;

    public function __construct(JsonExposer $jsonExposer, XmlExposer $xmlExposer)
    {
        $this->jsonExposer = $jsonExposer;
        $this->xmlExposer = $xmlExposer;
    }

    /**
     * @param string $format
     * @return ExposerInterface
     * @throws NotSupportFormatException
     */
    public function getData(?string $format): ExposerInterface
    {
        switch ($format) {
            case self::XML:
                return $this->xmlExposer;
                break;
            case self::JSON:
                return $this->jsonExposer;
                break;
            default:
                throw new NotSupportFormatException('Format not supported');
        }
    }
}
