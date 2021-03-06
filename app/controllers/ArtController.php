<?php

class ArtController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $Tags = Tag::orderBy('name')->get();
        $Gallery = Art::orderBy('id', 'DESC')->simplePaginate(9);
        return View::make('pages.art')
            ->with('Tags', $Tags)
            ->with('Gallery', $Gallery)
            ->with('active', null);
    }

    public function getTag($id)
    {
        $Tags = Tag::orderBy('name')->get();
        $ActiveTag = Tag::with('images')->findOrFail($id);
        $Gallery = $ActiveTag->images()->simplePaginate(9);
        return View::make('pages.art')->with('Tags', $Tags)
            ->with('Tags', $Tags)
            ->with('Gallery', $Gallery)
            ->with('active', $ActiveTag->id);
    }

    public function getImage($id){
        return Redirect::to('/#'.$id);
    }
}
