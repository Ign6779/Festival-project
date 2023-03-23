<? include __DIR__ . '/../adminheader.php' ?>

<form method="POST" action="/artist/updateArtist?artistid=<? echo $artist->getId(); ?>" class="container "
    enctype="multipart/form-data">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistname">Artist name</label>
            <input type="text" class="form-control" id="artistname" name="artistname"
                value="<? echo $artist->getName(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistdescription">Artist description</label>
            <textarea id="artistdescription" class="form-control" name="artistdescription"
                required><? echo $artist->getDescription(); ?></textarea>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistSong">Artist Song</label>
            <textarea id="artistSong" class="form-control" name="artistSong"
                required><? echo $artist->getSong(); ?></textarea>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artisttopsong">Artist Top song</label>
            <input type="text" class="form-control" id="artisttopsong" name="artisttopsong"
                value="<? echo $artist->getTopSong(); ?>" required>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="artistImages">Images</label>
            <input multiple="true" type="file" name="imagesup[]" accept=".jpg, .jpeg, .png"
                onchange="validateFiles(this)" required />
            <p>Note the old pictures will be delted when updated. So please chose pictures.
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateartist">Update</button>
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