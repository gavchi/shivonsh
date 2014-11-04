<?php

class AdminController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth', array('only' =>
            array('anyTags', 'anyDeltag', 'anyArt', 'postArtCreate', 'anyDelart')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        if (Auth::check()) {
            return View::make('admin.index');
        }else{
            return Redirect::action('AdminController@anyLogin');
        }
    }

    public function anyLogin()
    {
        /*$User = User::find(1);
        $User->pass = Hash::make(Input::get('pass'));
        $User->save();*/
        if (Auth::attempt(array('login' => Input::get('login'), 'password' => Input::get('password')), $remember = true)) {
            return Redirect::action('AdminController@getIndex');
        }else{
            return View::make('admin.login');
        }
    }

    public function anyLogout(){
        Auth::logout();
        return Redirect::action('AdminController@getIndex');
    }

    public function anyTags(){
        if(Request::isMethod('post')){
            $Tag = new Tag();
            $Tag->name = Input::get('name');
            $Tag->save();
        }
        $Tags = Tag::all();
        return View::make('admin.tags')
            ->with('Tags', $Tags);
    }

    public function anyDeltag(){
        $Tag = Tag::find(Input::get('id'));
        $Pivot = $Tag->images();
        $Pivot->detach();
        $Tag->delete();
        return Redirect::action('AdminController@anyTags');
    }

    public function anyArt(){
        $Gallery = Art::orderBy('id', 'DESC')->with('tags')->get();
        $Tags = Tag::all();
        return View::make('admin.art')
            ->with('Tags', $Tags)
            ->with('Gallery', $Gallery);
    }

    public function postArtCreate(){
        $tags = Input::get('tag');
        $image = Input::file('file');
        $filename = str_random(10).'.'.$image->getClientOriginalExtension();
        //move to original
        $image->move(public_path().'/i/full', $filename);
        // open an image file
        $img = Image::make(public_path().'/i/full/'.$filename);
        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $img->resize(425, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        // save image in desired format
        $img->save(public_path().'/i/'.$filename);

        $Art = new Art();
        $Art->file = $filename;
        $Art->save();
        $Art->tags()->sync($tags);
        return Redirect::action('AdminController@anyArt');
    }

    public function anyDelart(){
        $Art = Art::find(Input::get('id'));
        $Pivot = $Art->tags();
        $Pivot->detach();
        $Art->delete();
        File::delete(public_path().'/i/full/'.$Art->file);
        File::delete(public_path().'/i/'.$Art->file);
        return Redirect::action('AdminController@anyArt');
    }
}
