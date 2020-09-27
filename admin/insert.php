<?php  

require "database.php";

?>

<!DOCTYPE html>
<html>
<head>
<title> My_cosmetic</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     	
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<link rel ="stylesheet" href="../CSS/style.css" >

</head>
    
 <body>
    
  <div class="logo">
   <img src="../images/logo.png"  alt="logo" width="100px" height="64px">
</div>
   <div class="container view">
      <div class="row">
          <h1><strong>Ajouter un item  </strong></h1>
          <br>
            <form class="form" action="insert.php" method="post" enctype="multipart/form-data" >
              <div class="from-group">
                 <label for="name">Nom :</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="nom" value="<?php echo $name ; ?>">
                  <span class="help-inline"<?php echo $nameError ; ?>></span>
             </div> 
               <div class="from-group">
                   <label for="description">Description :</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="description" value="<?php echo $description ; ?>">
                  <span class="help-inline"<?php echo $descriptionError ; ?>></span>
             </div>  
                <div class="from-group">
               <label for="price">Prix :</label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="prix" value="<?php echo $price .'€' ?>">
                  <span class="help-inline"<?php echo $priceError ; ?>></span>
                    
             </div> 
                <div class="from-group">
               <label for="category">Catégorie :</label>
                 <select class="form-control" id="category" name="category">
                    <?php
                     
                     $db = Dtabase::connect();
                     foreach($db->query('SELECT * FROM categories') as $row)
                     {
                         
                         echo '<option value= "' . $row['id'] . ' ">' . $row['name'] . '</option>';
                         
                         
                     }
                     
                     Database::disconnect();
                     ?>
                    
                    </select>
             </div> 
                 <div class="from-group">
               <label for="category">Image :</label>
                  <input type="text" class="form-control" id="image" name="image" placeholder="image" value="<?php echo $image ; ?>">
                  <span class="help-inline"<?php echo $imageError ; ?>></span>   
             </div> 
         </form>  
              <div class="form-actions">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
              
              </div>
      </div>
    </div>
</body>
</html>
