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
            <input class="number-box" type="text">
        </div>
    </div>

    <button class="btn-scan" onclick="giveHint()">
        check
    </button>
</div>

</body>