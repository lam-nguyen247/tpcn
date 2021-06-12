<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorRequest;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->show(0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $visitorList = Visitor::all();
        return view('admin.visitor.index', compact('visitorList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VisitorRequest $visitorRequest
     * @return \Illuminate\Http\Client\Response
     */
    public function store(VisitorRequest $visitorRequest)
    {
        return Http::get('http://ip-api.com/json/' . $visitorRequest->ip . '?fields=status,country,regionName,lat,lon,timezone,isp,org,as,mobile,proxy');
    }

    /**
     * Display the specified resource.
     *
     * @param int $day
     * @return Response
     */
    public function show(int $day)
    {
        if (-1 == $day) {
            $visitorList = Visitor::all();
        } else if (0 == $day || 1 == $day) {
            $visitorList = Visitor::whereDate('created_at', today()->subDays($day))->get();
        } else {
            $visitorList = Visitor::whereDate('created_at', '>=', today()->subDays($day))->get();
        }
        $timeList = $this->timeList();
        return view('admin.visitor.index', compact('visitorList', 'day', 'timeList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Visitor $visitor
     * @return Response
     */
    public function edit(Visitor $visitor)
    {
        $visitorList = Visitor::all();
        return view('admin.visitor.index', compact('visitor', 'visitorList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VisitorRequest $visitorRequest
     * @param Visitor $visitor
     * @return Response
     */
    public function update(VisitorRequest $visitorRequest, Visitor $visitor)
    {
        $visitor->update($visitorRequest->all());
        return redirect()->route('visitor.index')->with('success', trans('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Visitor $visitor
     * @return Response
     * @throws Exception
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return back()->with('success', trans('Deleted successfully'));
    }

    private function timeList()
    {
        return collect([
            ['day' => 0, 'label' => 'Today'],
            ['day' => 1, 'label' => 'Yesterday'],
            ['day' => 7, 'label' => 'Last 7 days'],
            ['day' => 28, 'label' => 'Last 28 days'],
            ['day' => 90, 'label' => 'Last 90 days'],
            ['day' => -1, 'label' => 'All'],
        ]);
    }
}
