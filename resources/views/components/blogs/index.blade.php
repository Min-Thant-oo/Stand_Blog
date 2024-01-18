@props(['blogs', 'siteconfig'])
{{-- @dd($blogs) --}}

<x-ccomponents.layout :blog="$blogs" >
    <x-ccomponents.carousel :randomBlogs="$randomBlogs" />
    <x-ccomponents.main-wrapper>
        <x-ccomponents.single-wrapper>
            

            <div  class="col-lg-12 filter-div">

                @if (request('category'))
                    <h5 class="filter-h5">Filtered by <span class="filter-key-word">"{{ucwords(request('category'))}}"</span> category.</h5>
                @endif

                @if (request('tag'))
                    <h5 class="filter-h5">Filtered by <span class="filter-key-word">"{{ucwords(request('tag'))}}"</span> tag.</h5>
                @endif

                @if (request('search'))
                    <h5 class="filter-h5">Filtered by <span class="filter-key-word">"{{request('search')}}"</span> search keyword.</h5>
                @endif

                @if(request('category') || request('tag') || request('search'))
                    <a class="filter-clear" href="/">Clear filters</a>
                @endif

                
            </div>



            @forelse ($blogs as $blog)

                <x-ccomponents.blogcard 
                    :blog="$blog" 
                    :siteconfig="$siteconfig" 
                />

                @empty
                <h3>No Blogs found...</h3>

            @endforelse

            <div class="col-lg-12">
                {{$blogs->links('vendor.pagination.custom-pagination')}}
            </div>


        </x-ccomponents.single-wrapper>

        <x-ccomponents.sidebar-wrapper>
            <x-ccomponents.search />
            <x-ccomponents.recent :blogs="$randomBlogs" />
            <x-ccomponents.category-list />
            <x-ccomponents.tag-list />
        </x-ccomponents.sidebar-wrapper>
    </x-ccomponents.main-wrapper> 
    
</x-ccomponents.layout>