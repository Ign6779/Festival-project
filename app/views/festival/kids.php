<?php
include __DIR__ . '/../header.php';

function floatToRight($count)
{
    $floatToRight = "";
    if (fmod($count, 2) == 0) {
        $floatToRight = "justify-content-end";
    }
    return $floatToRight;
}

function returnBackground($count)
{
    $backgroundColor = "";
    if (fmod($count, 3) == 0) {
        $backgroundColor = "background-green";
    } elseif (fmod($count, 2) == 0) {
        $backgroundColor = "background-darkpurpule";
    } else {
        $backgroundColor = "background-lightpurpule";
    }
    return $backgroundColor;
}

?>
<div class="flex">
    <h1 class="h1-kids ">The Secret of Professor Teyler</h1>
    <img src="/img/Kids-meusum.png" alt="kids-meusum" class="img-responsive">

</div>

<div class="kids-intro">
    This event will be held from 28 to 31 July. It’s specially made for kids by Teyler
    museum.
    Here kids will be
    tasked to solve the Teyler’s mystery, to do that they will need to solve six challenges that are fun and
    intellectual. If you want your child to be safe and have a good time for free, join us!
</div>

<div class="container-xxl">
    <?

    $count = 1;
    foreach ($kidsActivities as $kidsActivity) {
        ?>
        <div class="row mb-5 <? echo floatToRight($count); ?>">
            <div class="col-7 activity <? echo returnBackground($count);
            $count++; ?>">
                <p style="padding: 20px;">
                    <span class="activity-title-size activity-title-font">
                        <?
                        echo (array_search($kidsActivity, $kidsActivities) + 1) . '-) ' . $kidsActivity->getActivityTitle(); ?>
                    </span> <br />
                    <br>
                    <span class="activity-paragraph-size activity-paragraph-font">
                        <? echo $kidsActivity->getActivityDescription(); ?>
                    </span>
                </p>
                <img src="/img/<? echo $kidsActivity->getImage(); ?>" alt=" <? echo $kidsActivity->getImage(); ?>">

            </div>
        </div>
    <?
    }
    ?>
</div>

<div class="qrCode-map">
    <div class="flex">
        <img src="/img/qrCodeKids.png" alt="qrCodeKids">
        <p><span style="font-family: 'Baloo Chettan';
                                      font-style: normal;
                                      font-weight: 400;
                                      font-size: 40px;
                                      line-height: 28px;">
                Visit us on mobile.</span> <br>
            Scan the qr code with your phone, to download our app.
        </p>
    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.4373439418973!2d4.637868015802284!3d52.38062167978804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5ef691268e66d%3A0xfa51f5aae7c4d62d!2sTeylers%20Museum!5e0!3m2!1snl!2snl!4v1677013723273!5m2!1snl!2snl"
            width="500px" height="500px" style="border:2px solid black; margin-right:2%;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p>e-mail:
            info@teyeler.nl <br>
            phone:
            023 - 517 58 50 (office)<br>
            <b>open from 10.00 - 17.00 </b>
        </p>
    </div>

</div>





<?php
include __DIR__ . '/../footer.php';
?>