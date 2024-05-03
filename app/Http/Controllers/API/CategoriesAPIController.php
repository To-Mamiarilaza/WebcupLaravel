<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoriesAPIRequest;
use App\Http\Requests\API\UpdateCategoriesAPIRequest;
use App\Models\Categories;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Categories",
 *     description="Operations about Categories"
 * )
 */
class CategoriesAPIController extends AppBaseController
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    /**
     * Display a listing of the Categories.
     *
     * @OA\Get(
     *     path="/categories",
     *     summary="Get all categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#Models/Categories")
     *         )
     *     )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $categories = $this->categoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    /**
     * Store a newly created Categories in storage.
     *
     * @OA\Post(
     *     path="/categories",
     *     summary="Create a new category",
     *     tags={"Categories"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#Models/CreateCategoriesAPIRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#Models/Categories")
     *     )
     * )
     */
    public function store(CreateCategoriesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $categories = $this->categoriesRepository->create($input);

        return $this->sendResponse($categories->toArray(), 'Categories saved successfully');
    }

    /**
     * Display the specified Categories.
     *
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Get category by ID",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#Models/Categories")
     *     )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var Categories $categories */
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            return $this->sendError('Categories not found');
        }

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    /**
     * Update the specified Categories in storage.
     *
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     summary="Update category by ID",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#Models/UpdateCategoriesAPIRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#Models/Categories")
     *     )
     * )
     */
    public function update($id, UpdateCategoriesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Categories $categories */
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            return $this->sendError('Categories not found');
        }

        $categories = $this->categoriesRepository->update($input, $id);

        return $this->sendResponse($categories->toArray(), 'Categories updated successfully');
    }

    /**
     * Remove the specified Categories from storage.
     *
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Delete category by ID",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var Categories $categories */
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            return $this->sendError('Categories not found');
        }

        $categories->delete();

        return $this->sendSuccess('Categories deleted successfully');
    }
}
