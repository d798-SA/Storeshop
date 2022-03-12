<?php
$title = 'المستخدمين';

require_once __DIR__. '../../template/header.php'; 

$users = $conn->query('select * from users order by id')->fetch_all(MYSQLI_ASSOC);
?>
<p>المستخدمين : <?php echo count($users); ?></p>
<br>
<div class="content_admin">

<table class="table">
  <thead class="thead-table">
    
      
    <tr>
      <th>id</th>
      <th>username</th>
      <th>email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($users as $user){ ?>
    <tr>
      <td><?php echo $user['id']; ?></td>
      <td><?php echo $user['username']; ?></td>
      <td><?php echo $user['email']; ?></td>
      <td>
      <a style="background-color:rgba(135, 177, 39, 0.863)" class="btn-a" href="">Edit</a> 
      <br>
      <br>
     
          <a style="background-color:rgba(192, 37, 37, 0.836)" class="btn-a" href="">delete</a>
      </td>
    </tr>

    <?php } ?>
  </tbody>
</table>
</div>
<?php
require_once __DIR__. '../../template/footer.php';



