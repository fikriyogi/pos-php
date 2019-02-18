index.php
<?php 
if ($row['banned']==1) { 
	echo "<button class='btn btn-danger btn-sm remove'>Banned</button>"; 
} else { 
	echo "<button class='btn btn-success btn-sm remove'>Aktif</button>"; 
} 
?>


<!-- Ajax Delete -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
	  $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'banned-users.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });

</script>



banned-user.php
<?php
$mysqli = new mysqli("localhost", "root", "", "user-management");
// $id = $_POST['user_id'];
//echo $music_number;

if(isset($_GET['id']))
{
     $sql = "UPDATE `users` SET `banned` = '1' WHERE `users`.`id`=".$_GET['id'];
     $mysqli->query($sql);
	 echo 'Deleted successfully.';
}


