
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="row">
        <h3>Categories</h3>
        @foreach($categories as $category)
        <div class="col-2 mb-4">
            <div class="card h-100">
                <img src="{{ $category['image'] }}" class="card-img-top" alt="{{ $category['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $category['name'] }}</h5>
                    <p class="card-text">{{ $category['description'] }}</p>
                    <a href="/category/{{ $category['slug'] }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <x-card />
    <x-alert />
    <!-- <x-products /> -->
    


</x-layout>
