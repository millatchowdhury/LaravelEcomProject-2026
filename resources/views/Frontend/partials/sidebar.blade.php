





<div class="sidebar">
    <ul class="list-group">


        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
        <a href="#main-{{$parent->id}}" data-bs-toggle="collapse" class="list-group-item list-group-item-action">
            <img src="{{ asset('images/categories/'.$parent->image) }}" alt="{{ $parent->name }}" width="50"> {{ $parent->name }}
        </a>
        
        <div class="collapse
        
        @if (Route::is('categories.show'))

            @if (App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
                show
            @endif
            
        @endif
        
        category-child" id="main-{{$parent->id}}">
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                <a href="{{ route('categories.show', $child->id) }}" class="list-group-item list-group-item-action
                    @if (Route::is('categories.show'))
                        @if ($child->id == $category->id)
                            active
                        @endif
                        
                    @endif
                    
                    ">
                    <img src="{{ asset('images/categories/'.$child->image) }}" alt="" width="50"> {{ $child->name }}
                </a>
            @endforeach
            

        </div>

        @endforeach



    </ul>
</div>



