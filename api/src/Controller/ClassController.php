<?php

namespace App\Controller;

use App\Auth\Services\ManageClassService;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

header('Access-Control-Allow-Origin: *');
class ClassController extends AbstractController
{
    private Manager $manager;
    private ManageClassService $manageClassService;

    public function __construct(Manager $manager, ManageClassService $manageClassService)
    {
        $this->manager = $manager;
        $this->manageClassService = $manageClassService;
    }

    /**
     * @OA\RequestBody(
     *     description="Classes",
     *     required=true,
     *     @OA\JsonContent(
     *         @OA\Property(
     *             property="email",
     *             type="string",
     *             example="correo@email.com",
     *         ),
     *     ),
     * )
     * @OA\Response(
     *     response=200,
     *     description="Classesresponse",
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(
     *             property="data",
     *             type="object",
     *             @OA\Property(
     *                 property="hasclass",
     *                 type="boolean",
     *                 example=true,
     *             ),
     *         ),
     *     ),
     * )
     * )
     * @OA\Tag(name="hasClass")
     */
    #[Route('/hasclasses', name: 'app_hasclass', methods: 'POST')]
    public function hasClasses(Request $request){
        $email = $request->get('email');
        $hasclass = $this->manageClassService->findClasses($email);
        return new Response($hasclass != null);
    }
}