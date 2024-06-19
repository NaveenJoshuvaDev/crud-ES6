<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- Add new user modal start -->
  <div class="modal fade" tabindex="-1" id="addNewUserModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="add-user-form" class="p-2" novalidate>
               <div class="row mb-3 gx-3">
                <div class="col">
                    <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                    <div class="invalid-feedback">First name is required!</div>
                </div>
                <div class="col">
                    <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                    <div class="invalid-feedback">Last name is required!</div>
                </div>

            </div>
            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                <div class="invalid-feedback">E-mail is required!</div>
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone number" required>
                <div class="invalid-feedback">Phone is required!</div>
            </div>

            <div class="mb-3">
            
                <input type="submit" value="Add User" class="btn btn-primary w-100 btn-lg" id="add-user-btn">

            </div>
       </form>
      </div>
      
    </div>
  </div>
</div>
 <!-- Add new user modal end -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All users in the database!</h4>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add New User</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Josh</td>
                                <td>Hazle</td>
                                <td>josh@gmail.com</td>
                                <td>6788206321</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm rounded-pill py-0">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm rounded-pill py-0">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>