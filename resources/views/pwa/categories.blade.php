<div class="categories">
    @foreach ($categories as $category)
        <div id="cats">
            <div></div>
            <a href="#">{{$category->name}}</a>
        </div>
    @endforeach
</div>
