const tbody = document.getElementById('tbody');
// console.log(tbody);

function setEmployeeEmail(_employee) {
    // Prénom Nom --> p.nom@email.com
    let firstname = _employee.employee_name.charAt(0);
    let lastname = _employee.employee_name.substring(_employee.employee_name.indexOf(" ") + 1);
    _employee.email = firstname + "." + lastname + "@email.com";
    _employee.email = _employee.email.toLowerCase();
    console.log(_employee);
}

function setEmployeeSalary(_employee) {
    // salaire annuel --> salaire mensuel
    _employee.MonthlySalary = Math.round(_employee.employee_salary / 12, 2) + " €";
}

function setEmployeeBirthYear(_employee) {
    today = new Date();
    today = today.getFullYear();
    _employee.birthyear = today - _employee.employee_age;
}


function addEmployeeToTable(_employee) {

    const tableRow = document.createElement('tr');

    const tdId = document.createElement('td');
    const tdFullName = document.createElement('td');
    const tdEmail = document.createElement('td');
    const tdSalary = document.createElement('td');
    const tdBirthYear = document.createElement('td');
    const tdAction = document.createElement()

    tdId.textContent = _employee.id;
    tdFullName.textContent = _employee.employee_name;
    tdEmail.textContent = _employee.email;
    tdSalary.textContent = _employee.MonthlySalary;
    tdBirthYear.textContent = _employee.birthyear;

    tableRow.appendChild(tdId)
    tableRow.appendChild(tdFullName)
    tableRow.appendChild(tdEmail)
    tableRow.appendChild(tdSalary)
    tableRow.appendChild(tdBirthYear);

    const buttons='<button class="duplicate"><i class="fa fa-files-0"></i>Duplicate</button>'
    buttons+='<button class="delete"><i class="fa fa-trash"></i> Delete</button>';

    tbody.appendChild(tableRow);
}

fetch('employees.json', { method: "GET" })
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(json => { // data ok
        const employees = json.data;
        console.log(employees);

        for (let i = 0; i < employees.length; i++) {

            setEmployeeEmail(employees[i]);
            setEmployeeSalary(employees[i]);
            setEmployeeBirthYear(employees[i]);

            addEmployeeToTable(employees[i]);

            console.log(employees[i]);
        }
    });