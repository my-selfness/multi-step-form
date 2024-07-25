

<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    if(isset($_POST["submit-form-data"])){
        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $myfile = fopen("details.txt", "w");
        fwrite($myfile, $name."\n".$email."\n".$password."\n");
        fclose($myfile);
    }
}


?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi Step Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .field-container.current{
            display: block;
        }
        .field-container{
            display: none;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center" style="height:100vh">
    <div class="card" style="width:20rem;">
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="field-container mb-3 current" data-step="1">
                    <label for="for-name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="for-name" placeholder="Raghav Jadhav">
                    <button type="button" data-set-step="2" class="btn btn-info my-3 float-end">Next</button>
                </div>
                <div class="field-container mb-3" data-step="2">
                    <label for="for-email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="for-email"  placeholder="raghav@gmail.com">
                    <button type="button" class="btn btn-secondary my-3 float-start" data-set-step="1">Back</button>
                    <button type="button" class="btn btn-info my-3 float-end" data-set-step="3">Next</button>
                </div>
                <div class="field-container mb-3" data-step="3">
                    <label for="for-password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="for-password" placeholder="#$%^&#$%^&*">
                    <button type="button" class="btn btn-secondary my-3 float-start" data-set-step="2">Back</button>
                    <button type="submit" class="btn btn-info my-3 float-end" name="submit-form-data" >Submit</button>
                </div>
                <div class="field-container mb-3" data-step="4">
                    <h3>You Data is Saved Successfully.</h3>
                </div>
            </form>
        </div>

    </div>




    <script>

        const setStep = step => {
            // setting style to the step-content display none for all
            document.querySelectorAll(".field-container").forEach(element => element.style.display = "none");
            // select that which had set data step is equal to step display block
            document.querySelector("[data-step='" + step + "']").style.display = "block";
        };
        /*
        This code selects all elements with the data-set-step attribute.
        For each of these elements (usually buttons or links):
        It attaches an onclick event handler.
        When clicked, it prevents the default behavior (e.g., form submission or link navigation).
        Calls the setStep function with the step number specified in the data-set-step attribute.*/

        document.querySelectorAll("[data-set-step]")
            .forEach(element => {
                element.onclick = event => {
                    event.preventDefault();
                    setStep(parseInt(element.dataset.setStep));
                };
            });

        <?php if (!empty($_POST)): ?>
            setStep(4);
        <?php endif; ?>

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>