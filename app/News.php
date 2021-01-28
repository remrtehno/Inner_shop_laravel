<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class News extends Model
{

    use Sluggable;
    protected  $table = "news";
    protected $fillable = ['title','anonce','text','slug','meta_desc','meta_key'];



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
        if($this->img != null)
        {
            Storage::delete('/uploads/news/small/' . $this->img);
            Storage::delete('/uploads/news/big/' . $this->img);
        }
    }
    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $pat = public_path().'/uploads/news/small/'.$filename;
        $pat2 = public_path().'/uploads/news/big/'.$filename;
        $img = Image::make($image);
        $img->backup();



        $img->fit(250,141)->save($pat,100);

        $img->reset();
        $img->backup();

        $img->fit(750,422)->save($pat2,100);
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

        return '/uploads/news/small/' . $this->img;

    }
    public function getImageBig()
    {
        if($this->img == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/news/big/' . $this->img;

    }

    public static function getNews(){
        $news =  self::orderBy('created_at','desc')->take(4)->get();
        return $news;
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
