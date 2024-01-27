<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemgroup;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class DashboardController extends Controller
{
    // --->> auth
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }
    // --->> display items for control panel
    public function DisplayItems()
    {
        $data= DB::table('itemgroups')
        ->join('items' , 'itemgroups.id' , '=' , 'items.itemgroupno')
        ->get();

        return view('dashboard.controlpanel', ['data'=>$data]);
    }

    // --->> item groups 
    public function SaveGrItem(Request $request)
    {
        $data=Itemgroup::create([
            'itemgroupsname'=>$request->itemgroupsname
        ]);

        $data->save();
        return redirect('addgitem');
    }
    public function Displayadditemsgroup()
    {
        $data = Itemgroup::All();
        
        return view('dashboard.addgroupsitem', ['data'=>$data]);
    }
    public function Del($x)
    {
        $item=Itemgroup::find($x);
        $item->delete();

        return redirect('addgitem');
    }
    public function Edit($x)
    {
        $item=Itemgroup::where('id', $x)
        ->first();

        return view('dashboard.editgroupitem', ['item'=>$item]);
    }
    public function Update(Request $request)
    {
        $item=Itemgroup::find($request->id);
        $item->itemgroupsname = $request->itemgroupsname;
        $item->save();

        return redirect('addgitem');
    }
    //-------------

    // --->> items
    public function SaveItem(Request $request)
    {
        $data=Items::create([
            'itemname'=>$request->itemname,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'type'=>$request->type,
            'itemgroupno'=>$request->itemgroupno
        ]);

        $data->save();
        return redirect('additem');
    }
    public function Displayitem()
    {
        $data = Items::All();
        
        return view('dashboard.additems', ['data'=>$data]);
    }

    public function DelItem($x)
    {
        $item=Items::find($x);
        $item->delete();

        return redirect('additem');
    }

    public function EditItem($x)
    {
        $item=Items::where('id', $x)
        ->first();

        return view('dashboard.edititems', ['item'=>$item]);
    }
    public function UpdateItem(Request $request)
    {
        $item=Items::find($request->id);
        $item->itemname = $request->itemname;
        $item->price = $request->price;
        $item->qty = $request->qty;
        $item->type = $request->type;
        $item->itemgroupno = $request->itemgroupno;

        $item->save();

        return redirect('additem');
    }


    public function Bills()
    {
        $data = DB::table('cart')
        ->get();
        $items = Items::All();

        return view('dashboard.bills', ['data'=>$data, 'item'=>$items]);
    }
}
