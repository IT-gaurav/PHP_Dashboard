<?php 
    require_once "../model/User.php";
    session_start();
    $user = $_SESSION['user']; 
    $email = $user->getEmail();

?>

<form action="../controller/main.php" method="post">
    <input type="file" name="file" accept=".xlsx, .xls">
    <button type="submit" name="save">Save</button>
</form>
<button id="fetch">Fetch</button>

<h1>Table</h1>
<label for="search">Search</label>
<input type="search" name="search" >
<button>ASC</button>
<button>DSC</button>
<table>
    <thead>
        <tr></tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    const searchBar = document.querySelector('input[type="search"]');
    const btnFetch = document.querySelector("#fetch");
    const thead = document.querySelector("table thead tr");
    const tbody = document.querySelector("table tbody");

    const createTable = (data) => {

        console.log(data);

        let th = '<th>Serial no.</th>';
        let tr = '';
        let columns = Object.keys(data[0]);

        columns.forEach(c=> th += `<th>${c}</th>`);
        thead.innerHTML = th;

        data.forEach((d,i)=>{
            tr += `<tr><td>${i+1}</td>`;
            columns.forEach(c=> tr += `<td>${d[c]}</td>`);
            tr += '</tr>';
        })
        tbody.innerHTML = tr;
    }

    const getData = () => {
        let file = null;
        fetch("../api/user.php?email=<?php echo $email; ?>")
        .then((res)=>res.json())
        .then((data)=> {
            let json  = JSON.parse(data.file)
            createTable(json)
        })
        .catch(({message})=>console.log(message));
    }
   
    searchBar.onkeyup = e => {
        console.log(e.target.value);

        
    };

    btnFetch.onclick = getData;

</script>