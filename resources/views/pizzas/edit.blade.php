<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pizza') }}
        </h2>
    </x-slot>

    <form action="{{ route('pizzas.update',$pizza) }}" method="POST" enctype="multipart/form-data">@csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name Of Pizza</label>
            <input type="text" name="name" class="form-control" placeholder="Name of pizza" value="{{ $pizza->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="3">{{ $pizza->description }}</textarea>
        </div>
        <div class="form-inline">
            <label for="price">Pizza Price ($)</label>
            <input type="number" name="small_pizza_price" class="form-control" placeholder="Small pizza price" value="{{ $pizza->small_pizza_price }}">
            <input type="number" name="medium_pizza_price" class="form-control" placeholder="Meduim pizza price" value="{{ $pizza->medium_pizza_price }}">
            <input type="number" name="large_pizza_price" class="form-control" placeholder="Large pizza price" value="{{ $pizza->large_pizza_price }}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="" class="form-select">
                <option value="{{ $pizza->category }}">{{ $pizza->category }}</option>
                <option value="vegtarian">Vegtarian</option>
                <option value="nonvegtarian">Non vegtarian</option>
                <option value="traditional">Traditional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ Storage::url($pizza->image) }}" alt="" width="80" height="80">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-4">Save</button>
        </div>
    </form>

</x-app-layout>