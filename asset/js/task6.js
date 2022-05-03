
document.querySelector('.submit').addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('.tabble').innerHTML=` `;
    fetch('/table6-post', {
        method: 'POST',
        body: null
    })
        .then(response => response.json())
        .then(data => {
            if(data.length!=0) {
                data.sort(function (a, b) {
                    if (a.nagr > b.nagr) {
                        return -1;
                    }
                    if (a.nagr < b.nagr) {
                        return 1;
                    }
                    // a должно быть равным b
                    return 0;
                });
                console.log(data)
                let tittle = document.createElement('h1');
                tittle.innerText = "Задания по коэфиценту нагруженности"
                let container = document.querySelector('.tabble')
                container.append(tittle)
                let table = document.createElement('table');
                table.setAttribute("class", "table table-striped")
                table.innerHTML = `
                 <thead>
                 <tr>
                 <th scope="col">№</th>
                 <th scope="col">Название</th>
                 <th scope="col">ID</th>
                  <th scope="col">Коэфицент нагруженности</th>
                </tr>
             </thead>
             `;
                let string = document.createElement('tbody')
                for (let i = 0; i < data.length; i++) {
                    let elem = document.createElement('tr');
                    elem.innerHTML = `
                <th scope="col">${i + 1}</th>
                <th scope="col">${data[i].name}</th>
                <th scope="col">${data[i].ID}</th>
                 <th scope="col">${data[i].nagr}</th>
                  
                `
                    string.append(elem);
                }
                table.append(string);
                container.append(table);
            }
        })
});
