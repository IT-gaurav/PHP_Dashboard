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
    <form action="../controller/main.php" method="post">
        <input type="file" name="file" accept=".xlsx, .xls">
        <button type="submit" name="save">Save</button>
    </form>
    <button id="fetch">Fetch</button>

    <h1>Table</h1>
    <label for="search">Search</label>
    <input type="search" name="search" >
    <button class='asc'>ASC</button>
    <button class='dsc'>DSC</button>
    <table>
        <thead>
            <tr></tr>
        </thead>
        <tbody></tbody>
    </table>
</body>

<script>
    const searchBar = document.querySelector('input[type="search"]');
    const btnFetch = document.querySelector("#fetch");
    const thead = document.querySelector("table thead tr");
    const tbody = document.querySelector("table tbody");
    const asc = document.querySelector(".asc");
    const dsc = document.querySelector(".dsc");

    const createTable = (data) => {
        let th = '<th>Serial no.</th>';
        let tr = '';
        let columns = Object.keys(data[0]);

        columns.forEach(c=> {
            if(c==='id') return
            th += `<th>${c}</th>`
        });

        thead.innerHTML = th;

        data.forEach((d,i)=>{
            tr += `<tr><td>${d.id}</td>`;
            columns.forEach(c=> {
                if(c==='id') return
                tr += `<td>${d[c]}</td>`
            });
            tr += '</tr>';
        })
        tbody.innerHTML = tr;
    }

    const getData = (str,fn) => {
        let file = null;
        fetch("../api/user.php?email=<?php echo $email; ?>")
        .then((res)=>res.json())
        .then((data)=> {
            let json  = JSON.parse(data.file)
            json = json.map((j,i)=>({...j,id:i+1}));
            console.log(json);
            if (str) json = json.filter(j=> Object.values(j).includes(str))
            if(fn) json.sort(fn);
            createTable(json)
        })
        .catch(({message})=>console.log(message));
    }
   
    searchBar.onkeyup = e => getData(e.target.value,null);
    btnFetch.onclick = e => getData();
    asc.onclick = e => getData("",(a,b)=>a.id-b.id);
    dsc.onclick = e => getData("",(a,b)=>b.id-a.id);


</script>

</html>
