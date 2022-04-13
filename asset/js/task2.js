
document.forms.idtask.addEventListener('submit', function (e) {
    e.preventDefault();
    document.querySelector('.tabble').innerHTML=` `;
    fetch('/table2-post', {
        method: 'post',
        body: new FormData(this)
    })
        .then(response => response.json())
        .then(data => {
            if(data.length!=0) {
                let tittle = document.createElement('h1');
                tittle.innerText = "Группы прикрепленные к заданию"
                let container = document.querySelector('.tabble')
                container.append(tittle)
                let table = document.createElement('table');
                table.setAttribute("class", "table table-striped")
                table.innerHTML = `
                 <thead>
                 <tr>
                 <th scope="col">№</th>
                 <th scope="col">Группа</th>
                 <th scope="col">Количество студентов</th>
                </tr>
             </thead>
             `;
                let string = document.createElement('tbody')
                for (let i = 0; i < data.length; i++) {
                    let elem = document.createElement('tr');
                    elem.innerHTML = `
                <th scope="col">${i + 1}</th>
                <th scope="col">${data[i].group_number}</th>
                 <th scope="col">${data[i].grup_num}</th>
                `
                    string.append(elem);
                }
                table.append(string);
                container.append(table);
            }
        })
});
