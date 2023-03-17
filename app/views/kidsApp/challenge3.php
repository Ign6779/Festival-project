<? include __DIR__ . '/appHeader.php' ?>

<div class="challenge-container">
    <h1 class="h1-challenge">Dr. Teyelers</h1>

    <div id="" class="challenges">
        <div class="challengeBox challenge-opened">
            1
        </div>

        <div class="challengeBox challenge-opened">
            2
        </div>

        <div class="challengeBox challenge-ongoing">
            3
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
line-height: 37px;">The lost calculator</span>
        <span style="font-family: 'Corben';
font-style: normal;
font-weight: 400;
font-size: 18px;
">Challenge 3</span>
    </div>

    <div class="challenge-instruction sans-pro-font">
        Go to oval room “6”.
    </div>

    <div>
        <img class="challenge-map" src="/img/challenge3-map.png" alt="challenge2-map">
    </div>

    <div class="challenge-story sans-pro-font">
        Fill in the equation with the proper numbers, that can be found in oval room. </div>

    <div class="flex flex-col hints">
        <div>
            <input class="number-box" type="text">
            +
            <input class="number-box" type="text">
            -
            <input class="number-box" type="text">
            +
            <input class="number-box" type="text">
            -
            <input class="number-box" type="text">
        </div>

        <div>
            =
        </div>

        <div>
            <input id="final-number" class="number-box" type="text">
        </div>
    </div>

    <div id="congratulations-msg" class="container w-80 congratulations-msg d-none">
        <div class="row justify-content-end ">
            <button class="col-2 btn-close-conmsg" onclick="close()">
                X
            </button>
        </div>

        <div class="row justify-content-center">
            <img class="col-3 " src="/img/correct-icon.png" alt="correct-icon.png">
        </div>

        <div class="row justify-content-center">
            <p class="col">Congratulations you got the math problem correct. It was right because
                you
                added and subtracted
                correctly.
            </p>
        </div>

        <div class="row justify-content-center">
            <p class="col text-center">Click on the lamp to get some awesome mathematical facts. </p>
        </div>
    </div>
    <button id="btn-check" class="btn-scan-check" style="display: none;">
        Next
    </button>

</div>
<script>

    const numbers = ["5", "7", "18", "92", "32", "54"];
    var inputs = document.querySelectorAll("input").forEach(input => {
        input.addEventListener("input", event => {
            input.className = "";
            if (numbers.includes(input.value)) {
                input.classList.add("number-box-correct");
                if (input.id == "final-number") {
                    document.getElementById("congratulations-msg").classList.remove("d-none");
                    document.getElementById("congratulations-msg").classList.add("d-block");
                }
            }
            else if (input.value == "") {
                input.classList.add("number-box");
            }
            else {
                input.classList.add("number-box-wrong");
            }
        })
    });

    function close() {
        document.getElementById("congratulations-msg").classList.remove("d-block");
        document.getElementById("congratulations-msg").classList.add("d-none");
        document.getElementById("btn-check").style.display = "block";
    }
</script>
</body>