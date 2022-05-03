

document.forms.idStudent.addEventListener('submit', function (e) {
    e.preventDefault();
    document.querySelector('.tabble').innerHTML=` `;
    fetch('/table1-post', {
        method: 'post',
        body: new FormData(this)
    })
        .then(response => response.json())
        .then(data => {
            if(data.length!==0) {
                let tittle = document.createElement('h1');
                tittle.innerText = "Задания студента"
                let container = document.querySelector('.tabble')
                container.append(tittle)
                let table = document.createElement('table');
                table.setAttribute("class", "table table-striped")
                table.innerHTML = `
                 <thead>
                 <tr>
                 <th scope="col">№</th>
                 <th scope="col">Предмет</th>
                </tr>
             </thead>
             `;
                let string = document.createElement('tbody')
                for (let i = 0; i < data.length; i++) {
                    let elem = document.createElement('tr');
                    elem.innerHTML = `
                <th scope="col">${i + 1}</th>
                <th scope="col">${data[i].title}</th>
                `
                    string.append(elem);
                }
                table.append(string);
                container.append(table);
            }
        })
});
