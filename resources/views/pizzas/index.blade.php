<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Pizzas') }}
        </h2>
    </x-slot>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">S.Price</th>
                <th scope="col">M.Price</th>
                <th scope="col">L.Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pizzas as $key => $pizza )
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><img src="{{ Storage::url($pizza->image) }}" width="80" height="50"></td>
                    <td>{{ $pizza->name }}</td>
                    <td>{{ $pizza->description }}</td>
                    <td>{{ $pizza->category }}</td>
                    <td>{{ $pizza->small_pizza_price }}</td>
                    <td>{{ $pizza->medium_pizza_price }}</td>
                    <td>{{ $pizza->large_pizza_price }}</td>
                    <td><a href="{{ route('pizzas.edit',$pizza) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('pizzas.destroy',$pizza) }}" method="post">@csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>No Pizzas Yet</p>
            @endforelse
        </tbody>
    </table>    

</x-app-layout>