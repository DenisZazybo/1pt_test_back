<?php

namespace App\Controller;

use App\Exception\NotSupportFormatException;
use App\Service\ResponseBuilder\ResponseBuilderService;
use App\Service\TestTakerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestTakerController extends AbstractController
{
    /**
     * @Route("/takers.{expose_format}", methods="GET")
     * @param Request $request
     * @param TestTakerService $testTakerService
     * @param ResponseBuilderService $responseBuilder
     * @param $expose_format
     * @return JsonResponse
     */
    public function getTakersAction(
        Request $request,
        string $expose_format,
        TestTakerService $testTakerService,
        ResponseBuilderService $responseBuilder
        ): Response
    {
        $sourceFormat = $request->get('source');
        try {
            $takers = $testTakerService->getTakers($sourceFormat);
        } catch (NotSupportFormatException $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $responseBuilder->build($takers, $expose_format);
    }
}
