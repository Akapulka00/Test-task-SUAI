
document.forms.nagr.addEventListener('submit', function (e) {
    e.preventDefault();
    document.querySelector('.tabble').innerHTML=` `;
    fetch('/table5-post', {
        method: 'post',
        body: new FormData(this)
    })
        .then(response => response.json())
        .then(data => {
            if(data.length!=0) {
                data.sort(function (a, b) {
                    if (a.summ > b.summ) {
                        return -1;
                    }
                    if (a.summ < b.summ) {
                        return 1;
                    }
                    // a должно быть равным b
                    return 0;
                });
                console.log(data)
                let tittle = document.createElement('h1');
                tittle.innerText = "Список заданий по нагруженности"
                let container = document.querySelector('.tabble')
                container.append(tittle)
                let table = document.createElement('table');
                table.setAttribute("class", "table table-striped")
                table.innerHTML = `
                 <thead>
                 <tr>
                 <th scope="col">№</th>
                 <th scope="col">Задание</th>
                 <th scope="col">Осталось выполнить</th>
                  <th scope="col">Всего заданий</th>
                </tr>
             </thead>
             `;
                let string = document.createElement('tbody')
                for (let i = 0; i < data.length; i++) {
                    let elem = document.createElement('tr');
                    elem.innerHTML = `
                <th scope="col">${i + 1}</th>
                <th scope="col">${data[i].title}</th>
                <th scope="col">${data[i].stat}</th>
                 <th scope="col">${data[i].summ}</th>
                  
                `
                    string.append(elem);
                }
                table.append(string);
                container.append(table);
            }
        })
});
