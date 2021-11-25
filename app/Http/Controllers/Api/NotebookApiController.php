<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notebook\NotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NotebookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return NotebookResource::collection(Notebook::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return NotebookResource
     */
    public function show(int $id): NotebookResource
    {
        $notebook = Notebook::findOrFail($id);
        return new NotebookResource($notebook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NotebookRequest $request
     * @param int $id
     * @return NotebookResource
     */
    public function update(NotebookRequest $request, int $id): NotebookResource
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $notebook = Notebook::find($id);
            $notebook->fill($request->validated())->save();

            return new NotebookResource($notebook);

        } catch(\Exception $e) {
            throw new HttpException(400, $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NotebookRequest $request
     * @return NotebookResource
     */
    public function store(NotebookRequest $request): NotebookResource
    {
        try {
            $notebook = new Notebook();
            $notebook->fill($request->validated())->save();
            return new NotebookResource($notebook);
        } catch (\Exception $e) {
            throw new HttpException(400, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        Notebook::findOrFail($id)->delete();
        return response()->json('Deleted');
    }
}
