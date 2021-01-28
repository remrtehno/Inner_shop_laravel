<?php



namespace App\Http\Controllers\Profile;

use App\Shops;
use App\User;
use App\ProdCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shops = Shops::where('user_id', '=', Auth::id())->get();
        return view("profile.shops.index", compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = ProdCat::getCategory();
        return view("profile.shops.create",compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' =>'required',
        ]);

        $prod = Shops::add($request->all());
        $prod->uploadImage($request->file('img'));

       

        return redirect()->route('seller-shops.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {

        $shops = Shops::with(['products'])->withCount('products')->where('user_id', '=', $user_id)->get();
        return view('profile.shops.index',compact('shops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $sl = Shops::where([
            ['user_id', '=', Auth::id()],
            ['id', '=', $id],
        ])->first();

        if( $sl ) 
           return view('profile.shops.edit',compact('sl'));
        else 
           return $this->index();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shops $shops, $id)
    {
        $this->validate($request, [
            'title' =>'required',
        ]);

        $post = Shops::find($id);
        $post->edit($request->all());
        $post->uploadImage($request->file('img'));


        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $shop = Shops::find($id);



        $shop->delete();
        return $this->index();
    }
}
