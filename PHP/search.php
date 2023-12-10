<?php
    if (isset($_POST["se-submit"]))
    {
        header("Location: ../Pages/Store.php?searchKey=".$_POST["search-field"]."");
    }
?>