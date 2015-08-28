<?php
$folderString = createFolderString($folderLevel);
echo '
            <div class="navigationBar" style="background: url(\''.$folderString.'images/navbar.png\'); " >


        ';

$count = count($names);
for ($i = 0; $i < $count; $i++) {

    echo '
                <a href="'.$links[$i].'" target="_self"> '.$names[$i].' </a>
            ';
    if ($i != ($count - 1)) {echo '&gt;';}
}

echo '
        <div class="navigationBar-socialMedia">
            <div class="navigationBar-socialMedia-button">
                <a href="https://twitter.com/zooqie_uk" class="twitter-follow-button" data-show-count="false">Follow @zooqie_uk</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
            </div>

            <div class="navigationBar-socialMedia-button">
                <div class="fb-like" data-href="https://www.facebook.com/zooqie" data-width="50" data-layout="button_count" data-show-faces="false" data-send="false"></div>
            </div>

            <div class="navigationBar-socialMedia-button">
                <script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="http://instagramfollowbutton.com/components/instagram/v2/js/ig-follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>
                <span class="ig-follow" data-id="54a009d105" data-count="false" data-size="small" data-username="true"></span>
            </div>
        </div>

    </div>
';
?>