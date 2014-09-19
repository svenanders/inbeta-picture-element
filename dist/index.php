<!DOCTYPE html>
<head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Picture Element Demo</title>
    <link href="css/style.min.css" type="text/css">
</head>

<body>
<?php
function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
$ip = getUserIP();
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
//echo "{$details->city}, {$details->country}";
echo "<!--"; var_dump($details); echo "-->";

?>
<div class="container">
    <div class="col-md-12">
        <h1>Picture element demo</h1>


        <?php if ($details->country === "NO") { ?>
            <p>
                Fra en bloggartikkel på Inbeta.no
            </p>
            <p>
                Hvis du ser bildet med SMALL printet øverst til høyre, støtter ikke din nettleser det nye
                picture-elementet. Dersom du ser HIRES eller MEDIUM, så skaler websiden opp eller ned for å se at den
                endrer seg dynamisk. Dette er ikke gjort i CSS, men innenfor rammene til det nye elementet i
                HTML-standarden.
            </p>

        <?php } else { ?>

            <p>This demo shows you whether your browser supports the new <em>picture</em>-element, and will show
                you either a <strong>SMALL</strong>, <strong>MEDIUM</strong> or <strong>HIRES</strong> version
                of Rembrandt's self portrait (image released with Creative Commons license).</p>

            <p>If you see the <strong>SMALL</strong> image, your browser doesn't support the element yet. If you
                see any of the others, try scaling the page up or down to see the image change dynamically.
                This is not done with CSS & media queries, but is done within the confines of the new element.</p>

        <?php } ?>

        <picture>
            <source media="(min-width: 45em)" srcset="img/large.jpg">
            <source media="(min-width: 32em)" srcset="img/med.jpg">
            <img src="img/small.jpg" width="300" height="363" alt="Rembrandt - selvportrett.">
        </picture>

        <p><strong>Kode:</strong></p>
<pre>
&lt;picture&gt; 
&lt;source media=&quot;(min-width: 45em)&quot; srcset=&quot;img/large.jpg&quot;&gt; 
&lt;source media=&quot;(min-width: 32em)&quot; srcset=&quot;img/med.jpg&quot;&gt; 
&lt;img src=&quot;img/small.jpg&quot; width=&quot;300&quot; height=&quot;363&quot; alt=&quot;Rembrandt - selvportrett.&quot;&gt; 
&lt;/picture&gt;
</pre>

        <p>Note: This demo is based on a blog article found at
            <a href="http://www.inbeta.no/?p=928">Inbeta.no</a></p>

    </div>
</div>

<!-- /div.container -->

</body>
<!-- Contains jQuery, React and various plugins -->
<script type="text/javascript" src="./js/libs.min.js"></script>
<!-- Contains compiled js (included jsx) -->
<script type="text/javascript" src="./js/scripts.min.js"></script>
