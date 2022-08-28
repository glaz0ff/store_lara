@php
    /** @var App\Models\StoreProduct $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{$item->title}}"
                                   type="text"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{$item->slug}}"
                                   type="text"
                                   id="slug"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id==$item->category_id) selected @endif>
                                       {{$categoryOption->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Цена</label>
                            <input name="price" value="{{$item->price}}"
                                   type="int"
                                   id="price"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description" class="form-control" rows="3">
                                {{old('description', $item->description)}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
