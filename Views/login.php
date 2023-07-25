<h1>Login</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="firstName" class="form-label">FirstName</label>
        <input type="text" name="firstName" class="form-control" id="firstName">
        <div id="firstNameHelp" class="form-text">Should not be Empty</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        <div id="passwordHelp" class="form-text">....</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form><?php
