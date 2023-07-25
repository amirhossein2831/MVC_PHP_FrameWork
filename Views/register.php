<h1>Register a new Account</h1>
<form action="" method="post">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="firstName" class="form-label">FirstName</label>
                <input type="text" name="firstName" class="form-control" id="firstName">
                <div id="firstNameHelp" class="form-text">Should not be Empty</div>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="lastName" class="form-label">LastName</label>
                <input type="text" name="lastName" class="form-control" id="lastName">
                <div id="lastNameHelp" class="form-text">Should not be Empty</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <div id="passwordHelp" class="form-text">....</div>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                <div id="confirmPasswordHelp" class="form-text">....</div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <div class="col">
            <a href="/" class="btn btn-primary">Go Back to Home</a>
        </div>
    </div>
</form><?php
