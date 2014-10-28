<?php

class AdminController extends BaseController {

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
        $Tag->delete();
        $Pivot->detach();
        return Redirect::action('AdminController@anyTags');
    }

    public function anyArt(){
        $Gallery = Image::with('tags')->get();
        $Tags = Tag::all();
        return View::make('admin.art')
            ->with('Tags', $Tags)
            ->with('Gallery', $Gallery);
    }
}
