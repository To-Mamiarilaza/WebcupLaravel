<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduitsRequest;
use App\Http\Requests\UpdateProduitsRequest;
use App\Repositories\ProduitsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Categories;

class ProduitsController extends AppBaseController
{
    /** @var ProduitsRepository $produitsRepository*/
    private $produitsRepository;

    public function __construct(ProduitsRepository $produitsRepo)
    {
        $this->produitsRepository = $produitsRepo;
    }

    /**
     * Display a listing of the Produits.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $produits = $this->produitsRepository->all();

        return view('produits.index')
            ->with('produits', $produits);
    }

    /**
     * Show the form for creating a new Produits.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Categories::pluck('nom', 'id');
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created Produits in storage.
     *
     * @param CreateProduitsRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitsRequest $request)
    {
        $input = $request->all();

        $produits = $this->produitsRepository->create($input);

        Flash::success('Produits saved successfully.');

        return redirect(route('produits.index'));
    }

    /**
     * Display the specified Produits.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produits = $this->produitsRepository->find($id);

        if (empty($produits)) {
            Flash::error('Produits not found');

            return redirect(route('produits.index'));
        }

        return view('produits.show')->with('produits', $produits);
    }

    /**
     * Show the form for editing the specified Produits.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produits = $this->produitsRepository->find($id);
        $categories = Categories::pluck('nom', 'id');

        if (empty($produits)) {
            Flash::error('Produits not found');

            return redirect(route('produits.index'));
        }

        // return view('produits.edit')->with('produits', $produits);
        return view('produits.edit', compact('produits', 'categories'));
    }

    /**
     * Update the specified Produits in storage.
     *
     * @param int $id
     * @param UpdateProduitsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitsRequest $request)
    {
        $produits = $this->produitsRepository->find($id);

        if (empty($produits)) {
            Flash::error('Produits not found');

            return redirect(route('produits.index'));
        }

        $produits = $this->produitsRepository->update($request->all(), $id);

        Flash::success('Produits updated successfully.');

        return redirect(route('produits.index'));
    }

    /**
     * Remove the specified Produits from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produits = $this->produitsRepository->find($id);

        if (empty($produits)) {
            Flash::error('Produits not found');

            return redirect(route('produits.index'));
        }

        $this->produitsRepository->delete($id);

        Flash::success('Produits deleted successfully.');

        return redirect(route('produits.index'));
    }
}
