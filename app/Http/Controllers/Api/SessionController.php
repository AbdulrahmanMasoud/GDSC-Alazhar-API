<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Http\Resources\SessionResource;
use App\Models\Courses;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Traits\ResponsTrait;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    use ResponsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
        $session = Session::where('course_id', $course)->get();
        return SessionResource::collection($session);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request, Courses $course)
    {
        Session::create(
            $request->all()+[
                   'course_id'=>$course->id,
                 ]);
           return $this->returnSuccessMessage('تم اضافة الحلقه بنجاح',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $course,Session $session)
    {
        return new SessionResource($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRequest $request,Courses $course, Session $session)
    {
        $session->update(
            $request->all()+[
            'course_id'=>$course->id,
          ]);
        return $this->returnSuccessMessage('تم التعديل بنجاح',Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($session)
    {
        $session->delete();
        return $this->returnSuccessMessage('تم الحذف بنجاح',Response::HTTP_OK);
    }
}
