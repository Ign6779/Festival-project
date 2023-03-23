<? include __DIR__ . '/../adminheader.php' ?>
<a href="/artist" class="btn btn-primary">Back</a>
<form method="POST" action="/artist/addArtist" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistname">Artist name</label>
            <input type="text" class="form-control" id="artistname" name="artistname" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistdescription">Artist description</label>
            <textarea id="artistdescription" class="form-control" name="artistdescription" required></textarea>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistSong">Artist Song</label>
            <textarea id="artistSong" class="form-control" name="artistSong" required></textarea>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artisttopsong">Artist Top song</label>
            <input type="text" class="form-control" id="artisttopsong" name="artisttopsong" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artisttopsong">Images</label>
            <input multiple="true" type="file" name="images[]" accept=".jpg, .jpeg, .png" onchange="validateFiles(this)"
                required />
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="addartist">Add</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>


<script>
    function validateFiles(input) {
        if (input.files.length != 3) {
            input.value = "";
            document.getElementById("errormessage").style.color = 'red';
            document.getElementById("errormessage").style.textAlign = 'center';
            document.getElementById("errormessage").className = "mt-5";
            document.getElementById("errormessage").innerHTML = "You need to upload 3 pictures.";
        }
        else {
            document.getElementById("errormessage").innerHTML = "";
        }
    }
</script>