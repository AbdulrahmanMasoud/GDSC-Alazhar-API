<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Http\Resources\CoursesResource;
use App\Models\Courses;
use App\Models\Tracks;
use Illuminate\Http\Request;
use App\Traits\ResponsTrait;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    use ResponsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($track)
    {
        $courses = Courses::where('track_id', $track)->get();
        return CoursesResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoursesRequest $request, Tracks $track)
    {
        Courses::create(
            $request->all()+[
                   'track_id'=>$track->id,
                 ]);
           return $this->returnSuccessMessage('تم اضافة الكورس بنجاح',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tracks $track,Courses $course)
    {
        return new CoursesResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoursesRequest $request,Tracks $track, Courses $course)
    {
        $course->update(
            $request->all()+[
            'track_id'=>$track->id,
          ]);
        return $this->returnSuccessMessage('تم التعديل بنجاح',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($track,Courses $course)
    {
        $course->delete();
        return $this->returnSuccessMessage('تم الحذف بنجاح',Response::HTTP_OK);
    }
}
