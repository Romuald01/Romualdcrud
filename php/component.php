<?php
    function inputElement($icon,$placeholder,$name,$value){
        $ele="
         
         <div class=\"input-group mb-2\">
            <div class=\"input-group-prepend\">
                <div class=\"input-group-text bg-warning\">$icon</div>
            </div>
            <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control input-width\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
            </div>
        
            ";
    echo $ele;   
}

 
function buttonElement($btnid,$stylesheet,$text,$name,$attr){
$btn="
<button name=\"$name\" class=\"$stylesheet\" id=\"$btnid\">$text</button>
";
echo $btn;
}
?>
