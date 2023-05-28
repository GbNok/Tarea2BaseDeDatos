<?php

foreach($ratings as &$rating){
    echo "<p>$rating[0]</p>";
    echo $rating[1]["comentario"];
}