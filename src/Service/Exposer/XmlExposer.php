<?php

namespace App\Service\Exposer;

use SimpleXMLElement;

class XmlExposer implements ExposerInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function expose(array $data): string
    {
        return $this->arrayToXml($data);
    }

    /**
     * @param array $array
     * @param string|null $rootElement
     * @param SimpleXMLElement|null $xml
     * @return mixed
     */
    private function arrayToXml(array $array, string $rootElement = null, SimpleXMLElement $xml = null)
    {
        if ($xml === null) {
            $xml = new SimpleXMLElement($rootElement ?? '<root/>');
        }

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->arrayToXml($value, $key, $xml->addChild($key));
            } else {
                $xml->addChild($key, $value);
            }
        }

        return $xml->asXML();
    }
}
