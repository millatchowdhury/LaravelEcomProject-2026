





<div class="sidebar">
    <ul class="list-group">


        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
        <a href="#main-{{$parent->id}}" data-bs-toggle="collapse" class="list-group-item list-group-item-action">
            <img src="{{ asset('images/categories/'.$parent->image) }}" alt="{{ $parent->name }}" width="50"> {{ $parent->name }}
        </a>
        
        <div class="collapse category-child" id="main-{{$parent->id}}">
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                <a href="" class="list-group-item list-group-item-action">
                    <img src="{{ asset('images/categories/'.$child->image) }}" alt="" width="50"> {{ $child->name }}
                </a>
            @endforeach
            

        </div>

        @endforeach



    </ul>
</div>



