<?php

namespace App\Http\Controllers\Store\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\StoreCategory;
use App\Repositories\StoreCategoryRepository;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * @var StoreCategoryRepository
     */
    private $storeCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->storeCategoryRepository = app(StoreCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $paginator = $this->storeCategoryRepository->getAllWithPaginate(5);
        return view('store.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new StoreCategory();
        $categoryList = $this
            ->storeCategoryRepository->getForComboBox();

        return view('store.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug']))
        {
            $data['slug'] = str::slug($data['title']);
        }

        $item = (new StoreCategory())->create($data);
        if($item)
        {
            return redirect()->route('store.admin.category.edit', $item->id)
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
    public function edit($id, StoreCategoryRepository $categoryRepository)
    {

        $item = $categoryRepository->getEdit($id);
        if(empty($item))
        {
            abort(404);
        }
        $categoryList = $categoryRepository->getForComboBox();

        return view('store.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $item = $this->storeCategoryRepository->getEdit($id);
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
                ->route('store.admin.category.edit', $item->id)
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
