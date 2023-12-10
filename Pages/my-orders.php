<?php
    include "../PHP/nabvar.php";
    include "../PHP/footer.php";
    include "../PHP/pop-up-message.php";
    include "../PHP/my-orders-process.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Uptown-Modern | My Orders</title>
        <!-- meta data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- style sheets -->
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/all.min.css">
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/Common/navbar.css">
        <link rel="stylesheet" href="../CSS/Common/pop-up-message.css">
        <link rel="stylesheet" href="../CSS/Common/scrollbar.css">
        <link rel="stylesheet" href="../CSS/Common/search.css">
        <link rel="stylesheet" href="../CSS/Common/user.css">
        <link rel="stylesheet" href="../CSS/Common/shopping-cart.css">
        <link rel="stylesheet" href="../CSS/Common/scroll-to-top.css">
        <link rel="stylesheet" href="../CSS/Common/footer.css">
        <link rel="stylesheet" href="../CSS/Profile/my-orders.css">
        <link rel="icon" href="../Images/logo.svg">
        <!-- scripts -->
        <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
        <script src="../JS/nav.js"></script>
        <script src="../JS/scrollTop.js"></script>
    </head>
    <body>
        <?php
            popUpMessage();
            sideNav("../","../Pages/");
        ?>
        <div class="header-background">
            <?php
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $parts = parse_url($url);
                $page="../Pages/my-orders.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/my-orders.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">My Orders</h1>
            </div>
        </div>
        <div class="table-container">
            <h2>Orders</h2>
            <table>
                <thead class="theader">
                    <tr>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Order Date</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        getOrders();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form-container">
            <h2>Refund Request</h2>
            <form action="../PHP/refund-process.php" method="post" class="refund-form">
                <label class="id-label" for="p-id">Order ID:</label>
                <select class="select-id" id="p-id" name="product-id" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    <?php
                        getProductsID();
                    ?>
                </select>
                <input name="description" class="short-refund-des"  type="text" maxlength="200" placeholder="Short Description" required>
                <input name="refund-request" class="refund-button" type="Submit" value="Submit">
            </form>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>