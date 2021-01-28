<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Logo extends Model
{

    protected $table = "logos";
    protected $fillable = ['id'];

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function removeImage()
    {
        if($this->img != null)Storage::delete('/uploads/logo/' . $this->img);

    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = 'logo.png';//str_random(10) . '.' . $image->extension();
        $pat = public_path().'/uploads/logo/'.$filename;

        $img = Image::make($image);
        $img->backup();

        $img->reset();

        $img->fit(70,50)->save($pat,100);
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

        return '/uploads/logo/' . $this->img;

    }


}
