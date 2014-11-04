<?php

class Tag extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';
    protected $fillable = array('name');
    public $timestamps = false;

    public function images()
    {
        return $this->belongsToMany('Art', 'tagged', 'tag_id', 'image_id');
    }
}
