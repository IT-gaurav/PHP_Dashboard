<?php
require_once "../model/User.php";
session_start();
$user = $_SESSION['user'];
$email = $user->getEmail();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <br>
    <center>
        <h1>Dashboard</h1>
    </center>
    <br><br>
    <form action="../controller/main.php" method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="file" accept=".xlsx, .xls" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            <div class="input-group-append" id="button-addon4">
                <button class="btn btn-outline-primary" name="save" type="submit">Save</button>
                <button id='fetch' class="btn btn-outline-primary" type="button">Fetch</button>
            </div>
        </div>
    </form>


    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon4">
        <div class="input-group-append" id="button-addon4">
            <button class="asc btn btn-outline-primary" type="button">ASC</button>
            <button class="dsc btn btn-outline-primary" type="button">DSC</button>
        </div>
    </div>
    <br>
    <br>
    <div class="dropdown-divider"></div>

    <br>
    <br>
    <center>
        <h1>Table</h1>
    </center>
    <table class="table">
        <thead class="thead-dark">
            <tr></tr>
        </thead>
        <tbody></tbody>
    </table>
</body>

<script>
    // declaring variables
    const searchBar = document.querySelector('input[type="text"]');
    const btnFetch = document.querySelector("#fetch");
    const thead = document.querySelector("table thead tr");
    const tbody = document.querySelector("table tbody");
    const asc = document.querySelector(".asc");
    const dsc = document.querySelector(".dsc");

    // creating table 
    const createTable = (data) => {
        let th = '<th scope="col">No.</th>';
        let tr = '';
        let columns = Object.keys(data[0]);

        // table header
        columns.forEach(c => {
            if (c === 'id') return
            th += `<th scope="col">${c}</th>`
        });

        thead.innerHTML = th;

        // table rows
        data.forEach((d, i) => {
            tr += `<tr><td>${d.id}</td>`;
            columns.forEach(c => {
                if (c === 'id') return
                tr += `<td>${d[c]}</td>`
            });
            tr += '</tr>';
        })
        tbody.innerHTML = tr;
    }

    // getting data from api
    const getData = (str, fn) => {
        let file = null;
        fetch("../api/user.php?email=<?php echo $email; ?>")
            .then((res) => res.json())
            .then((data) => {
                let json = JSON.parse(data.file)
                json = json.map((j, i) => ({
                    ...j,
                    id: i + 1
                }));

                if (str) json = json
                    .filter(j => Object.values(j)
                        .toString()
                        .toUpperCase()
                        .includes(str.toUpperCase()));

                if (fn) json.sort(fn);
                createTable(json)
            })
            .catch(({
                message
            }) => console.log(message));
    }

    // search bar functionality
    searchBar.onkeyup = e => getData(e.target.value, null);

    // fetching data from api
    btnFetch.onclick = e => {
        e.preventDefault();
        getData()
    };
    // asceding order of table
    asc.onclick = e => getData("", (a, b) => a.id - b.id);

    // descending order of table
    dsc.onclick = e => getData("", (a, b) => b.id - a.id);
</script>

</html>