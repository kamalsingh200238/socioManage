<x-app-layout>
    <div>Home page</div>
    @if(auth()->user())
        <form action="{{route('logout')}}" method="post">
            @csrf
            <sl-button variant="primary" size="small" type="submit">Logout</sl-button>
        </form>
    @else
        <sl-button href="{{route('login')}}">Login</sl-button>
        <sl-button href="{{route('register')}}">Register</sl-button>
    @endif
</x-app-layout>
