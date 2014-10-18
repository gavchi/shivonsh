<?php

class Image extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';
    protected $fillable = array('file');
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany('Tag', 'tagged', 'image_id', 'tag_id');
    }
}
