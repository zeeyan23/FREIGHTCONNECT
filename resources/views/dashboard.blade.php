<h1>Welcome to FreightConnect</h1>

<p>You are successfully logged in.</p>

<form action="{{ route('freightconnect.logout') }}" method="POST">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>