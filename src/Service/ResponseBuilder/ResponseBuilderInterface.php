<?php


namespace App\Service\ResponseBuilder;


use Symfony\Component\HttpFoundation\Response;

interface ResponseBuilderInterface
{
    public function build(array $takers, string $responseFormat): Response;
}
