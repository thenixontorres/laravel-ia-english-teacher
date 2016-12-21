<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetipRequest;
use App\Http\Requests\UpdatetipRequest;
use App\Repositories\tipRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class tipController extends AppBaseController
{
    /** @var  tipRepository */
    private $tipRepository;

    public function __construct(tipRepository $tipRepo)
    {
        $this->tipRepository = $tipRepo;
    }

    /**
     * Display a listing of the tip.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipRepository->pushCriteria(new RequestCriteria($request));
        $tips = $this->tipRepository->all();

        return view('tips.index')
            ->with('tips', $tips);
    }

    /**
     * Show the form for creating a new tip.
     *
     * @return Response
     */
    public function create()
    {
        return view('tips.create');
    }

    /**
     * Store a newly created tip in storage.
     *
     * @param CreatetipRequest $request
     *
     * @return Response
     */
    public function store(CreatetipRequest $request)
    {
        $input = $request->all();

        $tip = $this->tipRepository->create($input);

        Flash::success('tip saved successfully.');

        return redirect(route('tips.index'));
    }

    /**
     * Display the specified tip.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tip = $this->tipRepository->findWithoutFail($id);

        if (empty($tip)) {
            Flash::error('tip not found');

            return redirect(route('tips.index'));
        }

        return view('tips.show')->with('tip', $tip);
    }

    /**
     * Show the form for editing the specified tip.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tip = $this->tipRepository->findWithoutFail($id);

        if (empty($tip)) {
            Flash::error('tip not found');

            return redirect(route('tips.index'));
        }

        return view('tips.edit')->with('tip', $tip);
    }

    /**
     * Update the specified tip in storage.
     *
     * @param  int              $id
     * @param UpdatetipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipRequest $request)
    {
        $tip = $this->tipRepository->findWithoutFail($id);

        if (empty($tip)) {
            Flash::error('tip not found');

            return redirect(route('tips.index'));
        }

        $tip = $this->tipRepository->update($request->all(), $id);

        Flash::success('tip updated successfully.');

        return redirect(route('tips.index'));
    }

    /**
     * Remove the specified tip from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tip = $this->tipRepository->findWithoutFail($id);

        if (empty($tip)) {
            Flash::error('tip not found');

            return redirect(route('tips.index'));
        }

        $this->tipRepository->delete($id);

        Flash::success('tip deleted successfully.');

        return redirect(route('tips.index'));
    }
}
