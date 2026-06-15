<div>
    <form action="/register" method="POST">
        @csrf
        <label for="name">Name</label><br>
        <input type="text" name="name" placeholder="Username"><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="submit">Register</button>
    </form>
</div>
