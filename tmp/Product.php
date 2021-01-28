<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Product extends Model
{
use Sluggable;
    protected  $table = "products";
    protected $fillable =['title','anonce','text','created_at','meta_desc','meta_key'];

    public  function category(){

        return $this->belongsTo("App\ProdCat",'cat_id','id');
    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->cat_id = $id;
        $this->save();
    }

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
        if($this->img != null)Storage::delete('/uploads/products/small/' . $this->img);
        if($this->img != "") Storage::delete('/uploads/products/prev/' . $this->img);
        if($this->img != "") Storage::delete('/uploads/products/home/' . $this->img);
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $pat = public_path().'/uploads/products/small/'.$filename;
        $pat2 = public_path().'/uploads/products/prev/'.$filename;
        $pat3 = public_path().'/uploads/products/home/'.$filename;
        ini_set('memory_limit', '256M');
        $img = Image::make($image);
        $img->backup();
        $img->fit(160,214)->save($pat,100);
        $img->reset();
        $img->backup();
        $img->fit(314,287)->save($pat2,100);
        $img->reset();
        $img->backup();

        $width = 600; // your max width
        $height = 600; // your max height

        $img->height() > $img->width() ? $width=null : $height=null;
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });


        $img->save($pat3,100);
        $img->reset();
        //$image->storeAs(public_path().'/uploads/products/', $filename);
        $this->img = $filename;
        $this->save();
    }

    public function getImage($size = 'small')
    {
        if($this->img == null)
        {
            return '/img/no-image.png';
        }

        return "/uploads/products/$size/" . $this->img;

    }

    public function getImagePrev()
    {
        if($this->img == null)
        {
            return '/uploads/products/prev/no-image.jpg';
        }

        return '/uploads/products/prev/' . $this->img;

    }
    public function getImageHome()
    {
        if($this->img == null)
        {
            return '/uploads/products/home/no-image.jpg';
        }

        return '/uploads/products/home/' . $this->img;

    }

    public static function getProducts(){
        $products =  self::all();
        return $products;
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
