<?php
/**
 * Created by PhpStorm.
 * User: dexter
 * Date: 4/16/14
 * Time: 9:49 AM
 */

class OfferController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $offers = Auth::user()->offers;

        return View::make('offers.index')
            ->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return View::make('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        $rules = array(
            'offerName'         => 'required',
            'subjectLines'      => 'required',
            'fromLine'          => 'required',
            'friendlyFromLines' => 'required',
            'affiliateLink'     => 'required',
            'offerUnsubscribe'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('offers/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $offer = new Offer;
            $offer->offerName = Input::get('offerName');
            $offer->subjectLines = Input::get('subjectLines');
            $offer->fromLine = Input::get('fromLine');
            $offer->friendlyFromLines = Input::get('friendlyFromLines');
            $offer->affiliateLink = Input::get('affiliateLink');
            $offer->offerUnsubscribe = Input::get('offerUnsubscribe');
            $offer->network_id = Input::get('network_id');
            $offer->user_id = 3;
            $offer->save();

            Session::flash('message', 'Successfully added Offer');
            return Redirect::to('offers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $offer = Offer::find($id);

        return View::make('offers.show')
            ->with('offer', $offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $offer = Offer::find($id);

        return View::make('offers.edit')
            ->with('offer', $offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
        $rules = array(
            'offerName'         => 'required',
            'subjectLines'      => 'required',
            'fromLine'          => 'required',
            'friendlyFromLines' => 'required',
            'affiliateLink'     => 'required',
            'offerUnsubscribe'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('offers/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $offer = Offer::find($id);
            $offer->offerName = Input::get('offerName');
            $offer->subjectLines = Input::get('subjectLines');
            $offer->fromLine = Input::get('fromLine');
            $offer->friendlyFromLines = Input::get('friendlyFromLines');
            $offer->affiliateLink = Input::get('affiliateLink');
            $offer->offerUnsubscribe = Input::get('offerUnsubscribe');
            $offer->network_id = Input::get('network_id');
            $offer->user_id = 3;
            $offer->save();

            Session::flash('message', 'Successfully added Offer');
            return Redirect::to('offers');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        Session::flash('message', 'User has been wiped');
        return Redirect::to('users');
    }

}