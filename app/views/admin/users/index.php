<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-1 "><a href="/user/addUserForm" class="btn btn-primary">Add an user
        </a>
    </div>
</div>
<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Password</th>
            <th scope="col">Registration</th>
            <th scope="col">Buttons</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
        document.getElementsByTagName("tbody")[0].innerHTML = "";
        fetch('http://localhost/api/user')
            .then(result => result.json())
            .then((data) => {
                console.log(data);
                data.forEach(load)
            }).catch(err => console.error(err));
    }

    function load(userInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");
        tdId = document.createElement("td");
        tdId.innerHTML = userInput.id;

        tdName = document.createElement("td");
        tdName.innerHTML = userInput.username;

        tdRole = document.createElement("td");
        tdRole.innerHTML = userInput.role;

        tdEmail = document.createElement("td");
        tdEmail.innerHTML = userInput.email;

        tdAddress = document.createElement("td");
        tdAddress.innerHTML = userInput.address;

        tdPhone = document.createElement("td");
        tdPhone.innerHTML = userInput.phone;

        tdPassword = document.createElement("td");
        tdPassword.innerHTML = userInput.password;

        tdRegistration = document.createElement("td");
        tdRegistration.innerHTML = userInput.registration;

        tdButtons = document.createElement("td");

        aEdit = document.createElement("a");
        aDelete = document.createElement("a");
        aEdit.className = "btn btn-warning me-2";
        aDelete.className = "btn btn-danger";
        aEdit.innerHTML = "Edit";
        aDelete.innerHTML = "Delete";
        aEdit.href = "/user/editUserForm?userId=" + userInput.id;
        aDelete.onclick = function () {
            deleteUser(userInput.id);
        };
        tdButtons.append(aEdit, aDelete);
        tr.append(tdId, tdName, tdRole, tdEmail, tdAddress, tdPhone, tdPassword, tdRegistration, tdButtons)
        tbody.appendChild(tr);
    }

    function deleteUser(id) {
        fetch('http://localhost/api/user/deleteUser?userid=' + id, {
            method: 'GET'
        })
            .then(result => {
                console.log(result)
            })
            .catch(error => console.log(error));

        refresh();
    }
</script>