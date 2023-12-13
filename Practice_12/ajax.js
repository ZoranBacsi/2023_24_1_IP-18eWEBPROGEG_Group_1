const refreshButton = document.querySelector('#refresh')
const table = document.querySelector('table')
const filterInput = document.querySelector('#filter')

async function refreshTable(){
    let resp = await fetch('table.php?filter=' + filterInput.value)
    let data = await resp.json()

    table.innerHTML = "<tr><th>Tárgykód</th><th>Tárgy neve</th><th>Oktató</th><th>Kredit</th><th>Osztályzat</th></tr>"

    data.foreach(function(row){
        let tr = document.createElement('tr');

        for(field in row){
            let td = document.createElement('td')
            td.innerHTML = row[field]
            tr.appendChild(td)
        }
        
        table.appendChild(tr)
    });
}

refreshButton.addEventListener('click',refreshTable)
filterInput.addEventListener('input',refreshTable)