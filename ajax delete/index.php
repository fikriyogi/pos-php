index.php
<table id="datatables-buttons" class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Banned</th>
        <th>Start date</th>
        <th>Salary</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $a="SELECT * FROM  dps";
        $b=mysqli_query($connect,$a);
        while($row=mysqli_fetch_array($b)){
        @$nomor++;
      ?>
      <tr id="<?= $row['id_dps']; ?>" style="background-color: <?php if ($row['tps'==1]) { echo "#fff"; } else { echo "#fff"; }?> ">
        <td><a href="php/cetak/cetak-kartu-identitas-user.php?id_dps=<?= $row['id_dps']?>"><?= $row['nama']?></a></td>
        <td>System Architect</td>
        <td>Edinburgh</td>
        <td>61</td>
        <td></td>
        <td> <button class="btn btn-danger btn-sm remove">Delete</button></td>
      </tr>
    <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
      </tr>
    </tfoot>
  </table>
  
<!-- Ajax Delete -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
	 $(".remove").click(function(){
        var id_dps = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete-data.php',
               type: 'GET',
               data: {id_dps: id_dps},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id_dps).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
</script>


