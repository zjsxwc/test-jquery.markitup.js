<?php

//echo "dddddddiiii" | xclip -r -selection clipboard
//exec('echo "dddddddiiiiddddff" | xclip -r -selection clipboard');

if (isset($_POST["content"])) {
    $c = $_POST["content"];
    file_put_contents("/tmp/vboxhostclipboard.data", $c);
    exec('xclip -r /tmp/vboxhostclipboard.data -selection clipboard');
    echo "OK";
} else {
    echo <<<HTML
<html>
<script src="https://s2.pstatp.com/cdn/expire-1-M/jquery/2.1.1/jquery.js"></script>
<script src="https://s3.pstatp.com/cdn/expire-1-M/jquery.markitup/1.1.15/jquery.markitup.js"></script>
<script type="text/javascript" src="https://s3.pstatp.com/cdn/expire-1-M/jquery.markitup/1.1.15/sets/default/set.js"></script>
<link rel="stylesheet" type="text/css" href="https://s0.pstatp.com/cdn/expire-1-M/jquery.markitup/1.1.15/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="https://s0.pstatp.com/cdn/expire-1-M/jquery.markitup/1.1.15/sets/default/style.css" />

<form method="post" action="/">
<textarea name="content" id="content">

</textarea>
<button id="sb" type="button">submit</button>
</form>

<script type="text/javascript" >
var oldContent = "";
var \$c = $("#content");
function upload() {
    var content = \$c.val();
    if (oldContent === content) {
        return ;
    }
    oldContent = content;
    console.log(content)
    \$c.val("");
    $.post("/", {content: content},function (r) {
        \$c.val("");
    });
}

$(document).ready(function() {
    \$c.markItUp(mySettings).keyup(function (){
        upload();
    });
    $("#sb").click(function () {
        upload();
    });
});
</script>
</html>
HTML;


}





