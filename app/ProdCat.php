<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProdCat extends Model
{
    use Sluggable;
    protected  $table = "prod_cats";
    protected $fillable = ['title'];

    public  function products(){

        return $this->hasMany("App\Product");
    }

    public static function add($fields)
    {
        $cat = new static;
        $cat->fill($fields);
        $cat->save();
        return $cat;
    }
    public function removeImage()
    {
        if($this->img != null)Storage::delete('/uploads/product_cats/' . $this->img);
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $pat = public_path().'/uploads/product_cats/'.$filename;
        ini_set('memory_limit', '256M');
        $img = Image::make($image);
        $img->backup();
        $img->fit(65,82)->save($pat,100);
        $img->reset();
        $image->storeAs('/uploads', $filename);
        $this->img = $filename;
        $this->save();
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return '/uploads/product_cats/no-image.jpg';
        }

        return '/uploads/product_cats/' . $this->img;

    }


    public static function getCategory()
    {
        $cat = self::all();
        return $cat;
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
