

<?php
include('../include/connect.php');

//select products

$select_product="select * from products";
$result_query=$conn->query($select_product);

if($result_query)
{
echo "<center><table border='2' cellspacing='5' cellpadding='5' width=70%>
<tr bgcolor='pink' align='center'>
<th>product_id</th>
<th>product_title</th>
<th>product_price</th>
<th>product_image1</th>
<th>EDIT</th>
</tr>";
if($result_query->num_rows>0)
while($row=$result_query->fetch_array())
{
echo "<tr align='center'>
   <td>$row[0]</td>
   <td>$row[1]</td>
   <td>$row[7]</td>
   <td><img height='100' width='100' src='./product_images/$row[4]'> </td>
   <td>
<div class='d-flex'>
<input type='submit' name='remove_cart' value='Remove product' 
class='bg-info px-3 py-3 mx-3 border-light'>

</div>
</td>
</tr>";
 
}
echo "</table></center>";
 
}

else
echo "cannot execute sql";
$conn->close();

?>
</body>
</html>


<?php
function remove_cart_item()
  {
    global $conn;
    if(isset($_POST['remove_cart']))
    {
      foreach($_POST['removeitem'] as $remove_id )
      {
        echo $remove_id;
        $delete_query="Delete from products where product_id='$remove_id'";
        $run_delete=mysqli_query($conn,$delete_query);
        if($run_delete)
        {
          echo "<script>window.open('update_product.php','_self')</script>";
        }
      }
    }

  }
echo $remove_item=remove_cart_item();


?>