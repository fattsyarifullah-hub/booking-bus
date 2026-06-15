<div>
    <form action="/login" method="POST">
        @csrf 
        <label for="name">name</label>
        <input type="text" name="name" placeholder="username anda"><br><br> 
        <label for="password">password</label>
        <input type="password" name="password" placeholder="password anda"><br><br>
        <button type="submit" name="submit">login</button>
    </form>
</div>
