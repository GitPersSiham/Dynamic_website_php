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
   <div class="container admin">
      <div class="row">
          <h1><strong>Liste des items  </strong><a href="insert.php" class="btn btn-light btn-lg"> <span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
          
       <table class="table table-striped table-bordered">
          <thead>
           <tr>
              <th>Nom </th>
              <th>Description</th>
              <th>Prix </th>
              <th>Catégorie</th>
              <th>Actions </th>
            </tr>
           </thead>
          <tbody>
              <?php  
              require 'database.php';
              $db = Database::connect();
              $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
              
              while($item = $statement->fetch())
              {
                  
                       
             echo '<tr>';
             echo '<td>' . $item['name'] .'</td>';
             echo '<td>' . $item['description'] .'</td>';
             echo '<td>' . $item['price'] . '</td>'; 
             echo '<td>' . $item['category'] .'</td>';
             echo '<td width =350>';
             echo '<a type="button" class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
             echo ' ';
             echo '<button type="button" class="btn btn-dark" href="update.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-pencil"></span>Modifier</button>';
             echo ' ';    
             echo '<button type="button" class="btn btn-outline-dark" href="delete.php?id= ' . $item['id'] . '"><span class="glyphicon glyphicon-remove"></span>Supprimer</button>';
             echo '</td>';
             echo '</tr>';
                 
              }
              
              Database::disconnect();
    
              ?>
              
           
           </tbody>
        </table>   
      </div>
    </div> 
 
    
    
    
    
</body>
</html>