<h3 class="text-center text-success">
    All brands
</h3>

<table class="table table-bordered mt-5">

    <thead class="bg-info">
        <tr>
            <th>Slno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody class="bg-secondary text-light">

<?php

$select_cat="SELECT * FROM brands";
$result=mysqli_query($con,$select_cat);

$number=0;

while($row=mysqli_fetch_assoc($result)){

    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];

    $number++;

?>

<tr class="text-center">

    <td><?php echo $number; ?></td>

    <td><?php echo $brand_title; ?></td>

    <td>
        <a href="index.php?edit_brands=<?php echo $brand_id ?>">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </td>

    <td>

        <a href="#"
   data-bs-toggle="modal"
   data-bs-target="#exampleModal<?php echo $brand_id; ?>">

<i class="fa-solid fa-trash"></i>

    </td>

</tr>


<!-- Modal -->

<div class="modal fade"
     id="exampleModal<?php echo $brand_id; ?>"
     tabindex="-1"
     role="dialog">

<div class="modal-dialog" role="document">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">
Delete Brand
</h5>

<button type="button"
        class="close"
        data-dismiss="modal">

<span>&times;</span>

</button>

</div>

<div class="modal-body">

<h4>
Are you sure you want to delete?
</h4>

</div>

<div class="modal-footer">

<button type="button"
        class="btn btn-secondary"
        data-dismiss="modal">

No

</button>

<a href="index.php?delete_brands=<?php echo $brand_id ?>"
   class="btn btn-danger">

Yes

</a>

</div>

</div>

</div>

</div>

<?php } ?>

</tbody>

</table>