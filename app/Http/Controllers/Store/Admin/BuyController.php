<?php

namespace App\Http\Controllers\Store\Admin;

use App\Models\StoreBuy;
use App\Models\StoreProduct;
use App\Repositories\StoreBuyRepository;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;

class BuyController extends BaseController
{
    private $storeBuyRepository;
    private $storeProductRepository;

    public function __construct()
    {
        parent::__construct();
        $this->storeBuyRepository = app(StoreBuyRepository::class);
        $this->storeProductRepository = app(StoreProductRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->storeBuyRepository->getAllWithPaginate();

        return view('store.admin.buys.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $items = $request->id;

        $item = new StoreBuy();
        return view('store.admin.buys.confirm', compact('item', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'product_id' => $request->id,
        ];
        $item = (new StoreBuy())->create($data);
        if($item)
        {
            return redirect()->route('store.products.index')
                ->with(['success'=>'Покупка совершена']);
        }
        else
        {
            return back()->withErrors(['msg'=>'Отвал'])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
