<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrackRequest;
use App\Http\Resources\TracksResource;
use App\Models\Committe;
use App\Models\Tracks;
use App\Traits\ResponsTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TracksController extends Controller
{
    use ResponsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($committe)
    {
        $tracks = Tracks::where('committe_id', $committe)->get();
        return TracksResource::collection($tracks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackRequest $request, Committe $committe)
    {

    //    dd($committe->id);
        Tracks::create(
         $request->all()+[
                'committe_id'=>$committe->id,
              ]);
        return $this->returnSuccessMessage('تم اضافة التراك بنجاح',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Committe $committe,Tracks $track)
    {
        // $track = Tracks::where('committe_id',$committe)->where('id',$track)->first();
        return new TracksResource($track);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrackRequest $request, Committe $committe,Tracks $track)
    {
        $track->update(
            $request->all()+[
            'committe_id'=>$committe->id,
          ]);
        return $this->returnSuccessMessage('تم التعديل بنجاح',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($committe,Tracks $track)
    {
        $track->delete();
        return $this->returnSuccessMessage('تم الحذف بنجاح',Response::HTTP_OK);
    }
}
