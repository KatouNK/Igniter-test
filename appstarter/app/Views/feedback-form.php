<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Give Us Your Feedback</h1>
        <form method="post" action="feedback/submitFeedback">
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="comments" class="form-label">Give us your Feedback about this Event</label>
        <textarea name="comments" class="form-control" id="comments" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

</body>

</html>