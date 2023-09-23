<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
    rel="stylesheet"
    />
    <title>FACULTY INFORMATION</title>
</head>
<body>

<!-- Insert Faculty Info -->
<div class="container">
    <h1 class="text-center pt-3 pd-2" stlye="">FACULTY PORTAL</h1>
    <form action="<?=base_url()?>welcome/save" method="POST">
    <div class="row">
        <div class="col-lg-12">
            <label for="">Faculty ID</label>
            <input type="text" placeholder="Enter Faculty ID" name="facultyID" class="form-control">
            <span class="text-danger"><?=form_error("facultyID")?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label for="">Name</label>
            <input type="text" placeholder="Enter Name" name="name" class="form-control">
            <span class="text-danger"><?=form_error("name")?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label for="">Address</label>
            <input type="text" placeholder="Enter Address" name="address" class="form-control">
            <span class="text-danger"><?=form_error("address")?></span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <button class="btn btn-success">Insert</button>
        </div>
    </div>
    </form>


<!-- Display Faculty Info -->
    <div class="row mt-5 border border-primary rounded p-2 m-2">
    <h1 class="text-center" stlye="">VIEW FACULTY PORTAL</h1>

        <div class="col-lg-12">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Faculty ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  <?php foreach($display as $row){ ?>
    <tr>
        <td><?=$row["facultyID"]?></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["address"]?></td>
        <td>
            <!-- Update Faculty Info -->
            <button class="btn btn-info mx-1 update-btn">Update</button>
            <!-- Delete Faculty Info -->
            <a href="<?=base_url()?>welcome/delete/<?=$row["id"]?>" onclick="return confirm('Are you sure want to Delete this Record?')" class="btn btn-danger mx-1">Delete</a></td>           
            <div class="update-inputs" style="display: none; padding:20px;">
                <form action="<?=base_url()?>welcome/save_update/<?=$row["id"]?>" method="POST">
                    <div class="row">
                        <h3>UPDATE</h3>
                        <div class="col-lg-12">
                            <label for="">First Name</label>
                            <input type="text" name="facultyID" class="form-control" value="<?=$row["facultyID"]?>">
                            <span class="text-danger"><?=form_error("facultyID")?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Middle Name</label>
                            <input type="text" name="name" class="form-control" value="<?=$row["name"]?>">
                            <span class="text-danger"><?=form_error("name")?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Last Name</label>
                            <input type="text" name="address" class="form-control" value="<?=$row["address"]?>">
                            <span class="text-danger"><?=form_error("address")?></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <button class="btn btn-success update-save-btn">Update</button>
                            <button class="btn btn-danger close-btn">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </td>
    </tr>
<?php } ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const updateButtons = document.querySelectorAll('.update-btn');
    const updateInputs = document.querySelectorAll('.update-inputs');
    const updateSaveButtons = document.querySelectorAll('.update-save-btn'); // Add this line
    const closeButtons = document.querySelectorAll('.close-btn');

    updateButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            updateInputs[index].style.display = 'block';
            button.style.display = 'none';
        });

        updateSaveButtons[index].addEventListener('click', function() {
            // Get the updated values from the input fields
            const firstName = updateInputs[index].querySelectorAll('input')[0].value;
            const middleName = updateInputs[index].querySelectorAll('input')[1].value;
            const lastName = updateInputs[index].querySelectorAll('input')[2].value;

            // You can now send these updated values to your server using AJAX or another method
            // For simplicity, we'll just display the values here
            console.log('Updated values:', firstName, middleName, lastName);

            // Hide the input fields and show the "Update" button again
            updateInputs[index].style.display = 'none';
            button.style.display = 'block';
        });

        // Add event listener for the "Close" button
        closeButtons[index].addEventListener('click', function() {
            updateInputs[index].style.display = 'none'; // Hide the input fields
            button.style.display = 'block'; // Show the "Update" button again
        });
    });
});
</script>

  </tbody>
</table>
        </div>
    </div>
</div>
</body>
</html>
