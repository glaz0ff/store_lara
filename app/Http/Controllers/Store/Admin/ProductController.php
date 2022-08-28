<?php

namespace App\Http\Controllers\Store\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Models\StoreProduct;
use App\Repositories\StoreCategoryRepository;
use App\Repositories\StoreProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends BaseController
{

    /**
     * @var StoreProductRepository
     */
    private $storeProductRepository;
    private $storeCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->storeProductRepository = app(StoreProductRepository::class);
        $this->storeCategoryRepository = app(StoreCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->storeProductRepository->getAllWithPaginate();
        return view('store.admin.product.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new StoreProduct();
        $categoryList = $this
            ->storeCategoryRepository->getForComboBox();

        return view('store.admin.product.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        if (empty($data['slug']))
        {
            $data['slug'] = str::slug($data['title']);
        }

        $item = (new StoreProduct())->create($data);
        if($item)
        {
            return redirect()->route('store.admin.product.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else
        {
            return back()->withErrors(['msg'=>'Ошибка сохранения'])
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
    public function edit($id,StoreProductRepository $productRepository)
    {
        $item = $this->storeProductRepository->getEdit($id);
        if(empty($item))
        {
            abort(404);
        }
        $categoryList = $this->storeCategoryRepository->getForComboBox();

        return view('store.admin.product.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $item = $this->storeProductRepository->getEdit($id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg'=>"Запись id = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        if(empty($data['slug'])){
            $data['slug'] = str::slug($data['title']);
        }

        $result = $item->update($data);

        if($result)
        {
            return redirect()
                ->route('store.admin.product.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else{
            return back()->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }

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
