<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteRequest;
use App\Http\Resources\CommitteResource;
use App\Models\Committe;
use Illuminate\Http\Request;
use App\Traits\ResponsTrait;
use Symfony\Component\HttpFoundation\Response;

class CommittesController extends Controller
{
  use ResponsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committes = Committe::get();
        return CommitteResource::collection($committes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommitteRequest $request)
    {
        Committe::create($request->all());
        return $this->returnSuccessMessage('تم اضافة اللجنه بنجاح',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Committe $committe)
    {
        return new CommitteResource($committe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommitteRequest $request,Committe $committe)
    {
        // dd($committe);
        $committe->update($request->all());
        return $this->returnSuccessMessage('تم التعديل بنجاح',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committe $committe)
    {
        $committe->delete();
        return $this->returnSuccessMessage('تم حذف اللجنه بنجاح بنجاح',Response::HTTP_OK);
    }
}
