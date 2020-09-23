<?php    

require 'database.php';

if(!empty($_GET['id']))

{
   $id = checkInput($_GET['id']);
    
    
}

$db = Database::connect();
$statement = $db->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ? ");


$statement->execute(array($id));
$item = $statement->fetch();


Database::disconnect();
    
    
    
    
 function checkInput($data)
 {
 $data = trim($data);  
 $data = stripslashes($data);      
 $data = htmlspecialchars($data);   
 return $data;
 }



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
          <div class="col-sm-6 col-md-6">
          <h1><strong>Voir un item  </strong></h1>
          <br>
            <form>
              <div class="from-group">
                 <label>Nom :</label><?php  echo ' ' . $item['name']; ?>    
             </div> 
               <div class="from-group">
                 <label>Description :</label><?php  echo ' ' . $item['description']; ?>    
             </div>  
                <div class="from-group">
                 <label>Prix :</label><?php  echo ' ' . $item['price'] .' €'; ?>    
             </div> 
                <div class="from-group">
                 <label>Image :</label><?php  echo ' ' . $item['image']; ?>    
             </div>   
         </form>  
              <div class="form-actions">
              
                <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
              
              </div>
          </div>
          <div class="col-sm-6 col-md-6">
           <div class="thumbnail">
               <img src="<?php echo '../images/' . $item['image'] ; ?>" alt="...">
                 <div class="caption">
                 <h4><?php echo $item['name'] ; ?></h4>
                 <p><?php echo $item['description'] ; ?></p>
                 </div>
                 <div class="price"><?php echo $item['price'] ; ?></div>
             </div>
          </div>
      </div>
    </div> 
 
    
    
    
    
</body>
</html>



                