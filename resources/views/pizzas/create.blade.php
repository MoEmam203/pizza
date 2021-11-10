<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizzas') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="py-12 col-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul class="list-group">
                            <a href="" class="list-group-item list-group-item-action">View</a>
                            <a href="" class="list-group-item list-group-item-action">Add</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12 col-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route("pizzas.store") }}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="name">Name Of Pizza</label>
                                <input type="text" name="name" class="form-control"  placeholder="Name of pizza">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-inline">
                                <label for="price">Pizza Price ($)</label>
                                <input type="number" name="small_pizza_price" class="form-control" placeholder="Small pizza price">
                                <input type="number" name="medium_pizza_price" class="form-control" placeholder="Meduim pizza price">
                                <input type="number" name="large_pizza_price" class="form-control" placeholder="Large pizza price">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="" class="form-select">
                                    <option value=""></option>
                                    <option value="vegtarian">Vegtarian</option>
                                    <option value="nonvegtarian">Non vegtarian</option>
                                    <option value="traditional">Traditional</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>