<?php

class PageController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        return View::make('pages.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$id = str_replace('/','.',$id);
        return View::make('pages.'.$id);
	}

    public function art($id=NULL){
        $Tags = Tag::orderBy('name')->get();
        return View::make('pages.art')->with('Tags', $Tags);
    }
}
