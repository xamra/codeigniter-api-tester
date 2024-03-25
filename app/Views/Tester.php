<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Tester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-primary bg-gradient text-dark bg-opacity-10" x-init="initApiTester" x-data="ApiTester">

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1 class="display-3 mb-3">API Tester</h1>

                <form id="request-form" x-on:submit.prevent="executeRequest">
                    <div class="input-group mb-3">
                        <select id="http-method" class="form-select" x-on:change="toggleRawDataField($el)" name="http-method" x-model="httpMethod">
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="PATCH">PATCH</option>
                            <option value="DELETE">DELETE</option>
                        </select>

                        <input type="text" id="url" class="form-control" placeholder="http://www.boredapi.com/api/activity/" name="url" value="" x-model="url">

                        <button class="btn btn-success btn-sm" type="submit">Send</button>
                    </div>


                    <div class="mb-3">
                        <label for="param" class="form-label">Query Parameter</label>
                        <button class="btn btn-primary btn-sm" type="button" x-on:click="addParameter">Add</button>
                        <template x-for="(value, index) in queryParameter" :key="index">
                            <div x-bind:id="value.id" class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Key" x-bind:name="value.keyName" x-bind:value="value.key">
                                <input type="text" class="form-control" placeholder="Value" x-bind:name="value.valueName" x-bind:value="value.value">
                                <button class="btn btn-danger btn-sm" type="button" x-on:click="deleteParameter(index)">Delete</button>
                            </div>
                        </template>
                    </div>

                    <div class="mb-3" x-show="showFormTypes" x-cloak>
                        <h2 class="h4">Body</h2>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="form-type" id="form-type-none" value="none" x-model="formTypes" checked>
                                <label class="form-check-label" for="form-type-none">none</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="form-type" id="form-type-raw" value="raw" x-model="formTypes">
                                <label class="form-check-label" for="form-type-raw">raw</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="form-type" id="form-type-form-data" value="form-data" x-model="formTypes" disabled>
                                <label class="form-check-label" for="form-type-form-data">form-data</label>
                            </div>
                        </div>

                        <div class="mb-3" x-show="formTypes == 'raw' ">
                            <label for="data-type" class="form-label">Data type</label>
                            <select id="data-type" class="form-select" name="data-type" x-model="dataType">
                                <option value="" selected>please choose</option>
                                <option value="json">json</option>
                                <option value="text" disabled>text</option>
                                <option value="xml" disabled>xml</option>
                            </select>
                        </div>

                        <div class="mb-3" x-show="formTypes == 'raw' ">
                            <label for="body-data" class="form-label">Body data</label>
                            <textarea class="form-control" id="body-data" name="body-data" rows="6" x-model="bodyData"></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-warning btn-sm" type="reset">Reset form</button>
                    </div>

                    <hr class="border border-primary border-1 opacity-75 my-2">

                    <div class="mb-3" x-show="showResponse" x-cloak>

                        <label class="form-label">Response</label>
                        <div class="card" id="response-container">
                            <div class="card-body">

                                <pre><code id="response-code"></code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3" x-show="showResponse" x-cloak>

                        <label class="form-label">Response Object</label>
                        <div class="card" id="response-object-container">
                            <div class="card-body">
                                <pre><code id="response-object-code"></code></pre>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>