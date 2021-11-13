<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All User Orders') }}
        </h2>
    </x-slot>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Email/phone</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Pizza</th>
                <th scope="col">S.Pizza</th>
                <th scope="col">M.Pizza</th>
                <th scope="col">L.Pizza</th>
                <th scope="col">Total</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Change Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order )
            <tr>
                <th scope="row">{{ $order->user->name }}</th>
                <td>{{ $order->user->email }} / {{ $order->phone }}</td>
                <td>{{ $order->date }} / {{ $order->time }}</td>
                <td>{{ $order->pizza->name }}</td>
                <td>{{ $order->small_pizza_count }}</td>
                <td>{{ $order->medium_pizza_count }}</td>
                <td>{{ $order->large_pizza_count }}</td>
                <td>${{ $order->total }}</td>
                <td>{{ $order->body }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="{{ route('order.change',$order) }}" method="post">@csrf
                        <input type="submit" name="status" value="accept" class="btn btn-success btn-sm ">
                        <input type="submit" name="status" value="reject" class="btn btn-danger btn-sm ">
                        <input type="submit" name="status" value="complete" class="btn btn-primary btn-sm ">
                    </form>
                </td>
            </tr>
            @empty
            <p>No orders Yet</p>
            @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}

</x-app-layout>