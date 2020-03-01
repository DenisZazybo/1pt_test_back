<?php


namespace App\Service\Reader;


use Symfony\Component\HttpKernel\KernelInterface;

abstract class AbstractSource implements SourceInterface
{
    /**
     * @var string
     */
    public const RESOURCE_PATH = '/src/Resource/';
    /**
     * @var string
     */
    protected $projectDir;

    public function __construct(KernelInterface $kernel)
    {
        $this->projectDir = $kernel->getProjectDir();
    }

    /**
     * @return array
     */
    abstract public function read(): array;
}
