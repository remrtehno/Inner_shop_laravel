<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Gallery extends Model
{


    protected $table = "galleries";
    protected $fillable = ['title'];



    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();
        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function removeImage()
    {
        if($this->img != null)Storage::delete('/uploads/gallery/small/' . $this->img);
        if($this->img != "") Storage::delete('/uploads/gallery/big/' . $this->img);
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $pat = public_path().'/uploads/gallery/small/'.$filename;
        $pat2 = public_path().'/uploads/gallery/big/'.$filename;
        $img = Image::make($image);
        $img->backup();
        $img->fit(850,550)->save($pat2,100);
        $img->reset();
        $img->backup();
        $img->fit(400,225)->save($pat,100);
        $img->reset();
        //$image->storeAs('/uploads', $filename);
        $this->img = $filename;
        $this->save();
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/gallery/small/' . $this->img;

    }

    public function getImageBig()
    {
        if($this->img == null)
        {
            return '/uploads/gallery/prev/no-image.jpg';
        }

        return '/uploads/gallery/big/' . $this->img;

    }


    public static function getGallery(){
        $gallery =  self::all();
        return $gallery;
    }
}
