<? include __DIR__ . '/../adminheader.php' ?>

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
            <input multiple="true" type="file" name="images[]" required />
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="addartist">Add</button>
    </div>
</form>


<script>

</script>