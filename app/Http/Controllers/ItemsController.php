<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class ItemsController extends Controller
{
    public function testapi()
    {
        // $response=Http::get('https://api.sampleapis.com/coffee/hot');
        // $data=$response->object();

        $apiurl='https://v1.baseball.api-sports.io/status';
        $header=[
            'content-type'=>'application-json',
            'X-RapidAPI-Key'=>'24c939c2ba293c859d5ecd476932d293'
        ];
        $response=Http::withheaders($header)->get($apiurl);
        $data=$response->json();
        dd($data);
        return view('cafe', ['data'=>$data]);
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }
    
    public function ShowItemGroup()
    {
        $data=Itemgroup::All();
        $count=$data->count();
        return view('welcome', ['data'=>$data, 'count'=>$count]);
    }

    // --> below for display
    public function GetItemGroup()
    {
        $data = Itemgroup::All();
        $issave=true;
        return view('itemgroup', ['data' => $data, 'issave'=>$issave]);
    }

    public function GetItems()
    {
        $data = Items::All();
        $issave=true;
        return view('item', ['data' => $data, 'issave'=>$issave]);
    }

    // --->> showproduct
    public function Showproduct($id)
    {
        $data = Items::where('itemgroupno', $id)
        ->get();
        Session::put('id', $id);

        $grname = Itemgroup::where('id', $id)
        ->get();

        return view('showproduct', ['data'=>$data, 'grname'=>$grname]);
    }

    public function Addtocartitem($id)
    {
        DB::table('cart')
        ->insert(['itemid' => $id]);

        $count=DB::table('cart')-> get()->count();
        Session::put('countitem', $count);

        return redirect('item');
    }

    public function Addtocart($id)
    {
        DB::table('cart')
        ->insert(['itemid' => $id]);

        $idgroup=Session::get('id');

        $count=DB::table('cart')-> get()->count();

        Session::put('countitem', $count);
        
        return redirect('showproduct/'. $idgroup);
    }
    
    public function Deleteitem($id)
    {
        $data = DB::table('cart')
        ->delete($id, 'id');


        return redirect('checkout');
    }

    public function Checkout()
    {       

        $data = DB::table('cart')
        ->get();

        $items = Items::All();

        return view('checkout', ['data'=>$data, 'item'=>$items]);
    }

    public function Payment()
    {
        $data = DB::table('cart')
        ->get();
        $items = Items::All();

        return view('payment', ['data'=>$data, 'item'=>$items]);
       
    }

    public function Empty()
    {
        $data = DB::table('cart')
        ->delete();

        $data=Itemgroup::All();
        $count=0;
        Session::put('countitem', $count);

        return view('welcome', ['data'=>$data, 'count'=>$count]);
    }
    
}
