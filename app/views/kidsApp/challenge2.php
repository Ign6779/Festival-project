<? include __DIR__ . '/appHeader.php' ?>

<div class="challenge-container">
    <h1 class="h1-challenge">Dr. Teyelers</h1>

    <div id="" class="challenges">
        <div class="challengeBox challenge-opened">
            1
        </div>

        <div class="challengeBox challenge-ongoing">
            2
        </div>

        <div class="challengeBox challenge-locked">
            <img src="/img/lock-icon.png" alt="lock-icon">
        </div>

        <div class="challengeBox challenge-locked">
            <img src="/img/lock-icon.png" alt="lock-icon">
        </div>

        <div class="challengeBox challenge-locked">
            <img src="/img/lock-icon.png" alt="lock-icon">
        </div>

        <div class="challengeBox challenge-locked">
            <img src="/img/lock-icon.png" alt="lock-icon">
        </div>
    </div>

    <div class="h2-challenge-container">
        <span style="font-family: 'Corben';
font-style: normal;
font-weight: 700;
font-size: 20px;
line-height: 37px;">Egg problem</span>
        <span style="font-family: 'Corben';
font-style: normal;
font-weight: 400;
font-size: 18px;
">Challenge 2</span>
    </div>

    <div class="challenge-instruction sans-pro-font">
        Go to instrument room “3”.
    </div>

    <div>
        <img class="challenge-map" src="/img/challenge2-map.png" alt="challenge2-map">
    </div>

    <div class="challenge-story sans-pro-font">
        Help Professor Tyler to solve the egg problem. Try to differentiatie between fresh and spoiled eggs.
    </div>

    <div class="flex flex-col hints">
        <div class="flex flex-row row-hints">
            <div id="hint1" class="hint">

            </div>

            <div id="hint2" class="hint">

            </div>

            <div id="hint3" class="hint">

            </div>

            <div id="hint4" class="hint">

            </div>

        </div>

        <div style="margin-top: 2%;" class="flex flex-row row-hints">
            <div id="hint5" class="hint">

            </div>

            <div id="hint6" class="hint">

            </div>

            <div id="hint7" class="hint">

            </div>

            <div id="hint8" class="hint">

            </div>
        </div>
    </div>

    <button class="btn-scan" onclick="giveHint()">
        Scan
    </button>
</div>

</body>

<script>
    var count = 0;
    function giveHint() {
        if (count==8) {
            window.location = "/mobile/challenge3";
        }
        else {
            const hints = ["put", "egg", "in", "water", "the one", "floats", "is", "good"];
            var hint = hints[count];
            count++;
            document.getElementById("hint" + count).innerText = hint;
        }

    }
</script>