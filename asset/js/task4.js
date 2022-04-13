
document.forms.idstud.addEventListener('submit', function (e) {
    e.preventDefault();
    document.querySelector('.tabble').innerHTML=` `;
    fetch('/table4-post', {
        method: 'post',
        body: new FormData(this)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.length!=0) {
                let tittle = document.createElement('h1');
                tittle.innerText = "Список студентов выполняющих задания"
                let container = document.querySelector('.tabble')
                container.append(tittle)
                let table = document.createElement('table');
                table.setAttribute("class", "table table-striped")
                table.innerHTML = `
                 <thead>
                 <tr>
                 <th scope="col">№</th>              
                 <th scope="col">Имя</th>
                  <th scope="col">фамилия</th>
                  <th scope="col">Отчество</th>
                  <th scope="col">Номер группы</th>
                  <th scope="col">Состояние</th>
                </tr>
             </thead>
             `;
                let string = document.createElement('tbody')
                for (let i = 0; i < data.length; i++) {

                    let elem = document.createElement('tr');
                    elem.innerHTML = `
                <th scope="col">${i + 1}</th> 
                 <th scope="col">${data[i].name}</th>
                   <th scope="col">${data[i].surname}</th>
                   <th scope="col">${data[i].patronymic}</th>
                    <th scope="col">${data[i].group_number}</th>    
                `
                    let th=document.createElement("th");
                    if(data[i].stat==1){
                        th.innerText='Принято'
                        th.setAttribute('class','text-success')
                    }else {
                        th.innerText='Не принято'
                        th.setAttribute('class','text-danger')
                    }
                    elem.append(th)
                    string.append(elem);
                }
                table.append(string);
                container.append(table);
            }
        })
});
