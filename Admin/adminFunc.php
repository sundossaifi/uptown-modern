<?php
   function Users()
   {
      $connection =new mysqli("localhost","root","","uptownmodern");
      $stmt = $connection->prepare("select *from USERS WHERE ACTIVE='y'");
      $stmt->execute();
      $result = $stmt->get_result();

      $codeBlock=
      ' 
         <h1 class="title">Users Information</h1>
         <div class="tableCont">
            <div id="table-scroll">
               <table class="table">
                  <thead>
                     <tr class="theader">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Block</th>
                     </tr>
                  </thead>
                  <tbody>
      ';

      while($row = $result->fetch_assoc())
      {
         $codeBlock=$codeBlock.
         '
            <tr class="row">
               <td class="td">
                  '.$row["USER_ID"].'
               </td>
               <td class="td">
                  '.$row["FIRST_NAME"].'
               </td>
               <td class="td">
                  '.$row["LAST_NAME"].'
               </td>
               <td class="td">
                  '.$row["CITY"].'
               </td>
               <td class="td">
                  '.$row["ADDRESS"].'
               </td>
               <td class="td">
                  '.$row["PHONE_NUMBER"].'
               </td>
               <td class="td">
                  <form class="block-form" action="deleteUser.php" method="post">
                     <button class="block-button" name="block-button" value='.$row["USER_ID"].'>
                        <img src="../Images/remove2.png" class="dashImgs">
                     </button>
                  </form>
               </td>
            </tr>
         ';
      }

      $codeBlock=$codeBlock.
      '
                  </tbody>
               </table>
            </div>
         </div>
      ';

      $connection->commit();
      $connection->close();
      return $codeBlock;
   }

   function Products()
   {
      $connection =new mysqli("localhost","root","","uptownmodern");
      $stmt = $connection->prepare("select *from product");
      $stmt->execute();
      $result = $stmt->get_result();

      $codeBlock=
      ' 
         <h1 class="title">Products Information</h1>
         <div class="tableCont">
            <div id="table-scroll">
               <table class="table" style="width:1150px;">
                  <thead style="width:1150px;">
                     <tr class="theader" style="width:1150px;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Total Sales</th>
                        <th>Available</th>
                        <th>Color</th>
                        <th>Brand</th>
                        <th>Material</th>
                        <th>Set Unavailable</th>
                     </tr>
                  </thead>
                  <tbody>
      ';

      while($row = $result->fetch_assoc())
      {
         $available=($row["AVAILABLE"]=="y")?"Yes":"No";

         $stmt = $connection->prepare("select *from color where COLOR_ID='".$row["COLOR_ID"]."'");
         $stmt->execute();
         $result2 = $stmt->get_result();
         $row2=$result2->fetch_assoc();
         $color=$row2["HEX_CODE"];

         $stmt = $connection->prepare("select *from brand where BRAND_ID='".$row["BRAND_ID"]."'");
         $stmt->execute();
         $result2 = $stmt->get_result();
         $row2=$result2->fetch_assoc();
         $brand=$row2["NAME"];

         $stmt = $connection->prepare("select *from material where MATERIAL_ID='".$row["MATERIAL_ID"]."'");
         $stmt->execute();
         $result2 = $stmt->get_result();
         $row2=$result2->fetch_assoc();
         $material=$row2["NAME"];

         $codeBlock=$codeBlock.
         '
            <tr class="row" style="width:1150px;">
               <td class="td" style="width: 112px;">
                  '.$row["PRODUCT_ID"].'
               </td>
               <td class="td" style="width: 112px;">
                  '.$row["NAME"].'
               </td>
               <td class="td" style="width: 112px;">
                  '.$row["PRICE"].'
               </td>
               <td class="td" style="width: 112px;">
                  '.$row["AMOUNT"].'
               </td>
               <td class="td" style="width: 112px;">
                  '.$row["NUMBER_OF_SALES"].'
               </td>
               <td class="td" style="width: 112px;">
                  '.$available.'
               </td>
               <td class="td" style="width: 112px;">
                  '.$color.'
               </td>
               <td class="td" style="width: 112px;">
                  '.$brand.'
               </td>
               <td class="td" style="width: 112px;">
                  '.$material.'
               </td>
               <td class="td" style="width: 111px;">
                  <form class="set-unavailable-form" action="set-unavailable.php" method="post">
                     <button class="unavailable-button" name="p_id" value="'.$row["PRODUCT_ID"].'">
                        <img src="../Images/remove2.png" class="dashImgs">
                     </button>
                  </form>
               </td>
            </tr>
         ';
      }

      $codeBlock=$codeBlock.
      '
                  </tbody>
               </table>
            </div>
         </div>
         <div class="myCard">
            <a class="cta" href="add-product-screen.php">
               <span>Add Product</span>
               <svg viewBox="0 0 13 10" height="10px" width="15px">
                  <path d="M1,5 L11,5"></path>
                  <polyline points="8 1 12 5 8 9"></polyline>
               </svg>
            </a>
         </div>
      ';

      $connection->commit();
      $connection->close();
      return $codeBlock;
   }

   function addProduct()
   {

      $database = new mysqli('localhost','root','','uptownmodern');
      $query="SELECT * FROM `color`;";
      $result=$database->query($query);
      $color='';
      
      while ($row = mysqli_fetch_assoc($result))
      {
         $color=$color.
         '
            <option value="'.$row["COLOR_ID"].'">'.$row["COLOR_ID"].'-'.$row["HEX_CODE"].'</option>
         ';
      }

      $query="SELECT * FROM `brand`;";
      $result=$database->query($query);
      $brand='';
      
      while ($row = mysqli_fetch_assoc($result))
      {
         $brand=$brand.
         '
            <option value="'.$row["BRAND_ID"].'">'.$row["BRAND_ID"].'-'.$row["NAME"].'</option>
         ';
      }

      $query="SELECT * FROM `material`;";
      $result=$database->query($query);
      $material='';
      
      while ($row = mysqli_fetch_assoc($result))
      {
         $material=$material.
         '
            <option value="'.$row["MATERIAL_ID"].'">'.$row["MATERIAL_ID"].'-'.$row["NAME"].'</option>
         ';
      }

      $database->commit();
      $database->close();

      return
      '
         <div class="addp-fc">
            <h1 class="ap-h1">Add Product</h1>
            <form class="add-product-form" action="add-product.php" method="post" enctype="multipart/form-data">
               <div>
                  <label>Name: </label>
                  <input name="name" class="add-product-fields" type="text" placeholder="Name" required>
               </div>
               <div>
                  <label>Price: </label>
                  <input name="price" class="add-product-fields" type="text" pattern="[0-9]+" placeholder="Price" required>
               </div>
               <div>
                  <label>Amount: </label>
                  <input name="amount" class="add-product-fields" type="text" pattern="[0-9]+" placeholder="Amount" required>
               </div>
               <div>
                  <label>Manufacturer: </label>
                  <input name="manufacturer" class="add-product-fields" type="text" placeholder="Manufacturer" required>
               </div>
               <div>
                  <label>Dimensions: </label>
                  <input name="dimensions" class="add-product-fields" type="text" placeholder="Dimensions" required>
               </div>
               <div>
                  <label>Weight: </label>
                  <input name="weight" class="add-product-fields" type="text" placeholder="Weight" required>
               </div>
               <div>
                  <label>Category: </label>
                  <select class="add-product-select" name="category" required>
                     <option value="Used-Furniture">Used Furniture</option>
                     <option value="Living-Room">Living Room</option>
                     <option value="Future-Collection">Future Collection</option>
                     <option value="Dining-Room">Dining Room</option>
                     <option value="Bedroom">Bedroom</option>
                     <option value="Accessories">Accessories</option>
                  </select>
               </div>
               <div>
                  <label>Require Assembly: </label>
                  <select class="add-product-select" name="assembly" required>
                     <option value="y">Yes</option>
                     <option value="n">No</option>
                  </select>
               </div>
               <div>
                  <label>Color: </label>
                  <select class="add-product-select" name="color" required>
                     '.$color.'
                  </select>
               </div>
               <div>
                  <label>Brand: </label>
                  <select class="add-product-select" name="brand" required>
                     '.$brand.'
                  </select>
               </div>
               <div>
                  <label>Material: </label>
                  <select class="add-product-select" name="material" required>
                     '.$material.'
                  </select>
               </div>
               <div>
                  <label>Pictures: </label>
                  <input type="file" name="imgs[]" class="upload-pi" accept="image/png, image/jpeg" multiple required>
               </div>
               <div>
                  <textarea   placeholder="Short Description..." 
                              rows="100" 
                              name="short-des"
                              cols="100"
                              style="height: 70px;"
                              required></textarea>
               </div>
               <div>
                  <textarea   placeholder="Long Description..." 
                              rows="100" 
                              name="long-des"
                              cols="100"
                              style="height: 70px;"
                              required></textarea>
               </div>
               <div style="border-bottom: none;">
                  <button class="submitButton">
                     <a class="glow-on-hover">Add</a>
                  </button>
               </div>
            </form>
         </div>
      ';
   }

   function sections()
   {
      $database = new mysqli('localhost','root','','uptownmodern');
      $query="SELECT *FROM `product` WHERE AVAILABLE='y' and SALE='n';";
      $result=$database->query($query);
      $saleOptions='';
      $notsaleOptions='';
      
      while ($row = mysqli_fetch_assoc($result))
      {
         $saleOptions=$saleOptions.
         '
            <option value="'.$row["PRODUCT_ID"].'">'.$row["PRODUCT_ID"].'-'.$row["NAME"].'</option>
         ';
      }
      
      $query="SELECT *FROM `sale`;";
      $result=$database->query($query);

      while ($row = mysqli_fetch_assoc($result))
      {
         $query="SELECT *FROM `product` WHERE PRODUCT_ID='".$row["PRO_ID"]."';";
         $result2=$database->query($query);
         $row2 = mysqli_fetch_assoc($result2);

         $notsaleOptions=$notsaleOptions.
         '
            <option value="'.$row["PRO_ID"].'">'.$row["PRO_ID"].'-'.$row2["NAME"].'</option>
         ';
      }

      $database->commit();
      $database->close();

      return
      '
         <div class="sections-container">
            <h1>Product Sections</h1>
            <div class="section">
               <form action="set-on-sale.php" method="post">
                  <h2>Set On Sale</h2>
                  <label>Product ID: </label>
                  <select class="select-pid" name="pid" required>
                        '.$saleOptions.'
                  </select>
                  <label>Price: </label>
                  <input name="price" class="price-field" type="text" pattern="[0-9]+" placeholder="Price" required>
                  <button class="submitButton">
                     <a class="glow-on-hover">Set</a>
                  </button>
               </form>
               <form action="remove-from-sale.php" method="post">
                  <h2>Remove From Sale</h2>
                  <label>Product ID: </label>
                  <select class="select-pid" name="r-pid" required>
                        '.$notsaleOptions.'
                  </select>
                  <button class="submitButton">
                     <a class="glow-on-hover">Set</a>
                  </button>
               </form>
            </div>
            <div class="section">
               <form action="add-color.php" method="post">
                  <h2>Add Color</h2>
                  <label>Color Code: </label>
                  <input name="color" class="color-field" type="text" placeholder="Color Code" required>
                  <button class="submitButton">
                     <a class="glow-on-hover">Add</a>
                  </button>
               </form>
               <form action="add-brand.php" method="post">
                  <h2>Add Brand</h2>
                  <label>Brand Name: </label>
                  <input name="brand" class="brand-field" type="text" placeholder="Brand" required>
                  <button class="submitButton">
                     <a class="glow-on-hover">Add</a>
                  </button>
               </form>
            </div>
            <div class="section">
               <form action="add-material.php" method="post">
                  <h2>Add Material</h2>
                  <label>Material Name: </label>
                  <input name="material" class="material-field" type="text" placeholder="Material" required>
                  <button class="submitButton">
                     <a class="glow-on-hover">Add</a>
                  </button>
               </form>
            </div>
         </div>
      ';
   }

   function orders()
   {
      $connection =new mysqli("localhost","root","","uptownmodern");
      $stmt = $connection->prepare("select *from orders");
      $stmt->execute();
      $result = $stmt->get_result();

      $codeBlock=
      ' 
         <h1 class="title">Orders</h1>
         <div class="tableCont" style="width: 1152px;">
            <div id="table-scroll" style="width: 1152px; overflow-x: hidden;">
               <table class="table">
                  <thead>
                     <tr class="theader" style="width: 1152px;">
                        <th style="width: 128px">Order ID</th>
                        <th style="width: 128px">User ID</th>
                        <th style="width: 128px">Product ID</th>
                        <th style="width: 128px">Order Date</th>
                        <th style="width: 128px">Amount</th>
                        <th style="width: 128px">Price</th>
                        <th style="width: 128px">State</th>
                        <th style="width: 128px">Mark As Delivered</th>
                        <th style="width: 128px">Mark As Refunded</th>
                     </tr>
                  </thead>
                  <tbody>
      ';

      while($row = $result->fetch_assoc())
      {
         $codeBlock=$codeBlock.
         '
            <tr class="row" style="width: 1152px;">
               <td class="td" style="width: 126px">
                  '.$row["ORDER_ID"].'
               </td>
               <td class="td" style="width: 126px">
                  '.$row["U_ID"].'
               </td>
               <td class="td" style="width: 126px">
                  '.$row["P_ID"].'
               </td>
               <td class="td" style="width: 126px">
                  '.$row["ORDER_DATE"].'
               </td>
               <td class="td" style="width: 126px">
                  '.$row["AMOUNT"].'
               </td>
               <td class="td" style="width: 126px">
                  '.$row["PRICE"].'
               </td>
               <td class="td" style="width: 126px">
                  '.$row["STATE"].'
               </td>
               <td class="td">
                  <form class="block-form" action="delievered-process.php" method="post">
                     <button class="block-button" name="d-button" value="'.$row["ORDER_ID"].'">
                        <img src="../Images/check-circle-20.png" class="dashImgs">
                     </button>
                  </form>
               </td>
               <td class="td" style="width: 126px">
                  <form class="block-form" action="refund-process.php" method="post">
                     <button class="block-button" name="r-button" value="'.$row["ORDER_ID"].'">
                        <img src="../Images/remove2.png" class="dashImgs">
                     </button>
                  </form>
               </td>
            </tr>
         ';
      }

      $codeBlock=$codeBlock.
      '
                  </tbody>
               </table>
            </div>
         </div>
      ';

      $connection->commit();
      $connection->close();
      return $codeBlock;
   }

   function NewLetter()
   {
      $codeBlock =
      '
         <h1 style="text-align: center;">NewsLetter</h1>
         <h2 class="letter">Weekly Letter</h2>
         <form action="send-letter.php" method="post">
            <textarea   placeholder="NewsLetter..." 
                        rows="100" 
                        name="newsletter"
                        cols="100"
                        required></textarea>
            <button class="submitButton">
               <a class="glow-on-hover">Send</a>
            </button>
         </form>
      ';
      return $codeBlock;
   }

   function admin()
   {
      $connection =new mysqli("localhost","root","","uptownmodern");
      $stmt = $connection->prepare("select * from admin");
      $stmt->execute();
      $result = $stmt->get_result();

      $codeBlock=
      ' 
         <h1 class="title">Admin Information</h1>
         <div class="tableCont">
            <div id="table-scroll" style="width: 1000px; overflow: hidden;">
               <table class="table" style="width: 1000px;">
                  <thead>
                     <tr class="theader">
                        <th>Admin ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>BIO</th>
                        <th>Email</th>
                     </tr>
                  </thead>
                  <tbody>
      ';

      while($row = $result->fetch_assoc())
      {
         $codeBlock=$codeBlock.
         '
            <tr class="row" style="width: 1050px; font-size: 13px">
               <td class="td" style="width: 200px;">
                  '.$row["ADMIN_ID"].'
               </td>
               <td class="td" style="width: 200px;">
                  '.$row["FIRST_NAME"].'
               </td>
               <td class="td" style="width: 200px;">
                  '.$row["LAST_NAME"].'
               </td>
               <td class="td" style="width: 200px;">
                  '.$row["BIO"].'
               </td>
               <td class="td" style="width: 200px">
                  '.$row["EMAIL"].'
               </td>
            </tr>
         ';
      }

      $codeBlock=$codeBlock.
      '
                  </tbody>
               </table>
            </div>
            <form class="bio-form" action="edit-bio.php" method="post">
               <div>
                  <label>ID: </label>
                  <select class="select-aid" name="aid" required>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                  </select>
                  <label>Bio: </label>
                  <input name="bio" class="bio-field" type="text" placeholder="Bio" required>
               </div>
               <div>
                  <button class="submitButton">
                     <a class="glow-on-hover">Update</a>
                  </button>
               </div>
            </form>
         </div>
      ';

      $connection->commit();
      $connection->close();
      return $codeBlock;
   }

   function article()
   {
      $connection =new mysqli("localhost","root","","uptownmodern");
      $stmt = $connection->prepare("select * from article");
      $stmt->execute();
      $result = $stmt->get_result();

      $codeBlock=
      ' 
         <h1 class="title">Article Information</h1>
         <div class="tableCont">
            <div id="table-scroll">
               <table class="table">
                  <thead>
                     <tr class="theader">
                        <th>Article ID</th>
                        <th>Title</th>
                        <th>Post Date</th>
                        <th>Category</th>
                        <th>Author ID</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
      ';

      while($row = $result->fetch_assoc())
      {
         $codeBlock=$codeBlock.
         '
            <tr class="row">
               <td class="td" style="width:129.33px;">
                  '.$row["ARTICLE_ID"].'
               </td>
               <td class="td" style="width:129.33px;">
                  '.$row["TITLE"].'
               </td>
               <td class="td" style="width:129.33px;">
                  '.$row["POST_DATE"].'
               </td>
               <td class="td" style="width:129.33px;">
                  '.$row["CATEGORY"].'
               </td>
               <td class="td" style="width:129.33px;">
                  '.$row["AUTHOR_ID"].'
               </td>
               <td class="td" style="width:129.33px;">
                  <form class="delete-article-form" action="delete-article.php" method="post">
                     <button class="block-button" name="delete-article-button" value='.$row["ARTICLE_ID"].'>
                        <img src="../Images/remove2.png" class="dashImgs">
                     </button>
                  </form>
               </td>
            </tr>
         ';
      }

      $codeBlock=$codeBlock.
      '
                  </tbody>
               </table>
            </div>
         </div>
         <div class="myCard">
            <a class="cta" href="add-article-screen.php">
               <span>Add Article</span>
               <svg viewBox="0 0 13 10" height="10px" width="15px">
                  <path d="M1,5 L11,5"></path>
                  <polyline points="8 1 12 5 8 9"></polyline>
               </svg>
            </a>
         </div>
      ';

      $connection->commit();
      $connection->close();
      return $codeBlock;
   }

   function addArticle()
   {
      return
      '
         <form enctype="multipart/form-data" action="add-article.php" method="post" class="add-article-form">
            <h1>Add Article</h1>
            <div>
               <label>Title: </label>
               <input name="title" class="title-field" type="text" placeholder="Title" required>
            </div>
            <div>
               <label>Category: </label>
               <select class="select-cat" name="category" required>
                  <option value="Reviews">Reviews</option>
                  <option value="Advice">Advice</option>
                  <option value="Trends">Trends</option>
               </select>
            </div>
            <div>
               <label>Picture: </label>
               <input class="file-p" type="file" name="article-picture" accept="image/png, image/jpeg" required>
            </div>
            <div>
               <textarea   placeholder="Article Content..." 
                           rows="100" 
                           name="article-content"
                           cols="100"
                           required></textarea>
            </div>
            <div>
            <button class="submitButton">
               <a class="glow-on-hover">Add</a>
            </button>
            </div>
         </form>
      ';
   }

   function instagram()
   {
      $database = new mysqli('localhost','root','','uptownmodern');
      $query="SELECT * FROM `instagram_posts`;";
      $result=$database->query($query);
      $options='';
      
      while ($row = mysqli_fetch_assoc($result))
      {
         $options=$options.
         '
            <option value="'.$row["URL"].'">'.$row["URL"].'</option>
         ';
      }

      $database->commit();
      $database->close();

      return
      '
         <h1 class="h1-i">Instagram Posts</h1>
         <div class="position-container">
            <form class="add-ipost" action="add-ipost.php" method="post">
               <h2>Add Post</h2>
               <div>
                  <label>Link: </label>
                  <input name="url" class="url-field" type="text" placeholder="URL" required>
                  <button class="submitButton">
                     <a class="glow-on-hover">Add</a>
                  </button>
               </div>
            </form>
            <form class="delete-ipost" action="delete-ipost.php" method="post">
               <h2>Delete Post</h2>
               <div>
                  <label>Link: </label>
                  <select class="select-link" name="re-link" required>
                     '.$options.'
                  </select>
                  <button class="submitButton">
                     <a class="glow-on-hover">Remove</a>
                  </button>
               </div>
            </form>
         </div>
      ';
   }
?>