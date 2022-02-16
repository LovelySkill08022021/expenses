<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expenses Tracker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">
        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            /* .card {
                border: 1px solid #ddd;
            }
            .row {
                display: flex;
                width: 100%;
            }

            .col {
                display: block;
            }

            .w-100 {
                width: 100%;
            }
            .w-50 {
                width: 50%;
            }
            .w-75 {
                width: 75%;
            }
            .w-25 {
                width: 25%;
            }
            .w-60 {
                width: 60%;
            }
            .w-20 {
                width: 20%;
            }
            .w-10 {
                width: 10%;
            }

            .blue {
                background-color: blue;
            }
            .red {
                background-color: red;
            }

            .p- */
        </style>

        <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <script>
            $(() =>{
                show_table();
            });

            function save_expenses(){

                var data = $('#expenses_form').serializeArray();

                $.post('/save_expenses', data, function(response){
                    show_table();
                });
                
            }
            
            function show_table(){

                var data = {
                    _token: '{{csrf_token()}}'
                };

                $.post('/show_table', data, function(response){
                    $('#table_container').html(response);
                });
                
            }
        </script>
    </head>
    <body class="">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="card p-3 mt-5">
                    <h5 class="mb-3">Log your expenses</h5>
                    <form id="expenses_form">
                        @csrf
                        <label for="description">Description</label>
                        <input class="form-control" id="description" name="description" type="text" placeholder="Description">
                        
                        <div class="mb-3"></div>
                        
                        <label for="amount">Amount</label>
                        <input class="form-control" id="amount" name="amount" type="number" placeholder="Amount">
                        
                        <div class="mb-3"></div>
                    </form>

                    <div class="text-end">
                        <button onclick="save_expenses();" class="btn btn-primary px-3"><i class="bi bi-save"></i> Save</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 mt-5">
                    <h5 class="mb-3">Expenses History</h5>
                    <div id="table_container"></div>
                </div>        
            </div>
        </div>
    </body>
</html>
