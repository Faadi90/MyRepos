<h1>Profile Page</h1>
<h3>Hi, {{ session('userinfo')?session('userinfo'):'Unknown' }}</h3>
<a href="{{ URL::to('logout') }}" title="Logout">Logout</a>
