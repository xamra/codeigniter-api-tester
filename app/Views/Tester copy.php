<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Tester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-primary bg-gradient text-dark bg-opacity-10">

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h1>API Tester</h1>

                <form>
                    <div class="mb-3">
                        <label for="dataSelect" class="form-label">Data</label>
                        <select id="dataSelect" class="form-select" aria-label="Default select example">
                            <option selected>Please Choose</option>
                            <option value="Cars">Cars</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="httpSelect" class="form-label">HTTP Method</label>
                        <select id="httpSelect" class="form-select" aria-label="Default select example">
                            <option selected>Please Choose</option>
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="PATCH">PATCH</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="endpointInput" class="form-label">Endpoint</label>
                        <input type="email" class="form-control" id="endpointInput" placeholder="/cars/12">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>