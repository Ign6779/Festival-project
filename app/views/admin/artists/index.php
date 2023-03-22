<? include __DIR__ . '/../adminheader.php' ?>

<div class="row justify-content-end mt-5">
    <div class="col-md-2 "><a href="/artist/addArtistForm" class="btn btn-primary">Add a artist
    </a>
    </div>
</div>

<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Song</th>
            <th scope="col">Top song</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    window.onload = refresh();

    function refresh() {
        document.getElementsByTagName("tbody")[0].innerHTML = "";
        fetch('http://localhost/api/artist')
            .then(result => result.json())
            .then((data) => {
                console.log(data);
                data.forEach(load)
            }).catch(err => console.error(err));
    }

    function load(artistInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");
        tdId = document.createElement("td");
        tdId.innerHTML = artistInput.id;
        tdName = document.createElement("td");
        tdName.innerHTML = artistInput.name;
        tdDescription = document.createElement("td");
        tdDescription.innerHTML = artistInput.description;
        tdSong = document.createElement("td");
        tdSong.innerHTML = artistInput.song;
        tdTopSong = document.createElement("td");
        tdTopSong.innerHTML = artistInput.topSong;
        tdButtons = document.createElement("td");
        aEdit = document.createElement("a");
        aDelete = document.createElement("a");
        aEdit.className = "btn btn-warning me-2";
        aDelete.className = "btn btn-danger";
        aEdit.innerHTML = "Edit";
        aDelete.innerHTML = "Delete";
        aEdit.href = "/artist/editArtistForm?artistId=" + artistInput.id;
        aDelete.onclick = function () {
            deleteArtist(artistInput.id);
        };
        tdButtons.append(aEdit, aDelete);
        tr.append(tdId, tdName, tdDescription, tdSong, tdTopSong, tdButtons)
        tbody.appendChild(tr);
    }

    function deleteArtist(id) {
        fetch('http://localhost/api/artist/deleteArtist?artistid=' + id, {
            method: 'GET'
        })
            .then(result => {
                console.log(result)
            })
            .catch(error => console.log(error));

        refresh();
    }
</script>