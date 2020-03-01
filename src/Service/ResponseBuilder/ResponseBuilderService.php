<?php
namespace App\Service\ResponseBuilder;

use App\Exception\NotSupportFormatException;
use App\Service\Exposer\ExposerFactory;
use App\Service\Exposer\JsonExposer;
use App\Service\Exposer\XmlExposer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseBuilderService implements ResponseBuilderInterface
{
    /**
     * @var ExposerFactory
     */
    private $exposerFactory;

    public function __construct(ExposerFactory $exposerFactory)
    {
        $this->exposerFactory = $exposerFactory;
    }

    /**
     * @param array $takers
     * @param string $responseFormat
     * @return Response
     */
    public function build(array $takers, string $responseFormat): Response
    {
        try {
            $exposer = $this->exposerFactory->getData($responseFormat);

            if ($exposer instanceof JsonExposer) {
                return new JsonResponse($takers);
            }
            if ($exposer instanceof XmlExposer) {
                $takers = $exposer->expose($takers);
                return new Response($takers);
            }
            return new JsonResponse('Format not supported', Response::HTTP_BAD_REQUEST);

        } catch (NotSupportFormatException $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_CONFLICT);
        }
    }
}
