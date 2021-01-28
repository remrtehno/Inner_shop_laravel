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
    protected $fillable =['title','article','batch','is_sample','qty','sklad','buy_price','supplier','user_id','anonce','price','label','text','created_at','meta_desc','meta_key'];

    public  function category(){

        return $this->belongsTo("App\ProdCat",'cat_id','id');
    }

    public  function shop(){

        return $this->belongsTo("App\Shops",'shop_id','id');
    }


    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->cat_id = $id;
        $this->save();
    }
    
    public function getShop() {
    	
    	if(Shops::find($this->shop_id)) return Shops::find($this->shop_id)->title;
    }

    public function setShop($id)
    {
        if($id == null) {return;}
        $this->shop_id = $id;
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
        $img = Image::make($image);
        $img->backup();
        $img->fit(305,268)->save($pat,100);
        $img->reset();
        $img->backup();
        $img->fit(152,152)->save($pat2,100);
        $img->reset();
        $img->backup();
        $img->fit(400,400)->save($pat3,100);
        $img->reset();
        //$image->storeAs('/uploads', $filename);
        $this->img = $filename;
        $this->save();
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return '/uploads/no-image.jpg';
        }

        return '/uploads/products/small/' . $this->img;

    }

    public function getImagePrev()
    {
        if($this->img == null)
        {
            return '/uploads/no-image.jpg';
        }

        return '/uploads/products/prev/' . $this->img;

    }
    public function getImageHome()
    {
        if($this->img == null)
        {
            return '/uploads/no-image.jpg';
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
                'source' => 'article'
            ]
        ];
    }
}
