<h1>contact</h1>
<form action="" method="post">

    <div class="mb-3">
        <label for="subjectInput" class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" id="subjectInput">
        <div id="subjectHelp" class="form-text">Enter the Subject of your Contact.</div>
    </div>

    <div class="mb-3">
        <label for="descriptionTextArea" class="form-label">Description</label>
        <textarea style="resize: none" name="description" class="form-control" ></textarea>
        <div id="descriptionHelp" class="form-text">Enter the Description for your Contact.</div>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>