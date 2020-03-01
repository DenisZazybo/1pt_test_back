<?php


namespace App\Service;


use App\Exception\NotSupportFormatException;
use App\Service\Reader\SourceFactory;

class TestTakerService
{
    /**
     * @var SourceFactory
     */
    private $sourceFactory;

    /**
     * TakerHandler constructor.
     * @param SourceFactory $readerFactory
     */
    public function __construct(SourceFactory $readerFactory)
    {
        $this->sourceFactory = $readerFactory;
    }

    /**
     * @param string|null $sourceFormat
     * @return array
     * @throws NotSupportFormatException
     */
    public function getTakers(?string $sourceFormat): array
    {
        $source = $this->sourceFactory->getData($sourceFormat);
        return $source->read();
    }

}
