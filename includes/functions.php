<?php
    function validateForm($formData)
    {
        $formData = trim( stripcslashes( htmlspecialchars( strip_tags( str_replace(array('(',')'),'',$formData), ENT_QUOTES))));

        return $formData;

    }
?>