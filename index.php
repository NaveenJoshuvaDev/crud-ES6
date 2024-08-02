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
       <input type="hidden" name="submit" value="submit">
               <div class="row mb-3 gx-3">
                <div class="col">
                    <input type="text" name="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                    <div class="invalid-feedback">First name is required!</div>
                </div>
                <div class="col">
                    <input type="text" name="lname"  class="form-control form-control-lg" placeholder="Enter Last Name" required>
                    <div class="invalid-feedback">Last name is required!</div>
                </div>

            </div>
            <div class="mb-3">
                <input type="email" name="email"  class="form-control form-control-lg" placeholder="Enter E-mail" required>
                <div class="invalid-feedback">E-mail is required!</div>
            </div>
            <div class="mb-3">
                <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Enter Phone number" required>
                <div class="invalid-feedback">Phone is required!</div>
            </div>

            <div class="mb-3">
            
                <input type="submit" name="submit" value="Add User" class="btn btn-primary w-100 btn-lg" id="add-user-btn">

            </div>
       </form>
      </div>
      
    </div>
  </div>
  </div>
 <!-- Add new user modal end -->
  <!-- Edit User Modal starts -->
  <div class="modal fade" tabindex="-1" id="editUserModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit This User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="edit-user-form" class="p-2" novalidate>
       <input type="hidden" name="id" id="id">
       <input type="hidden" name="submit" value="submit">
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
            
                <input type="submit" name="submit" value="Update User" class="btn btn-success w-100 btn-lg" id="edit-user-btn">

            </div>
       </form>
      </div>
      
    </div>
  </div>
  </div>
  <!-- Edit User Modal Ends -->
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
                <div id="showAlert">
                    
                </div>
            </div>
         </div>
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
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script src="main.js"></script>  -->
    <script>
      
  const addForm = document.getElementById("add-user-form");
  const updateForm = document.getElementById("edit-user-form");
  const showAlert = document.getElementById("showAlert");
  const addModal = new bootstrap.Modal(
    document.getElementById("addNewUserModal")
  );
  const editModal = new bootstrap.Modal(
    document.getElementById("editUserModal")
  );
  const tbody = document.querySelector("tbody");


  // Add New User Ajax Request

  // addForm.addEventListener("submit", async (e) => {
  //   e.preventDefault();

  //   const formData = new FormData(updateForm);
  //   formData.append("update", 1);

  //   if (updateForm.checkValidity() === false) {
  //     e.preventDefault();
  //     e.stopPropagation();
  //     updateForm.classList.add("was-validated");
  //     return false;
  //   } else {
  //     document.getElementById("edit-user-btn").value = "Please Wait...";
  //     const data = await fetch("action.php", {
  //       method: "POST",
  //       body: formData,
  //     });
  //     const response = await data.text();
  //     console.log(response);
  //     showAlert.innerHTML = response;
  //     document.getElementById("edit-user-btn").value = "Add UsEr";
  //     updateForm.reset();
  //     updateForm.classList.remove("was-validated");
  //     editModal.hide();
  //     fetchAllUsers();
  //   }
  // });
  addForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(addForm);
    formData.append("add", 1);

    if (addForm.checkValidity() === false) {
      e.preventDefault();
      e.stopPropagation();
      addForm.classList.add("was-validated");
      return false;
    } else {
      document.getElementById("add-user-btn").value = "Please Wait...";
      const data = await fetch("action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
      //console.log(response);
      showAlert.innerHTML = response;
      document.getElementById("add-user-btn").value = "Add UsEr";
      addForm.reset();
      addForm.classList.remove("was-validated");
      addModal.hide();
      fetchAllUsers();
    }
  });

  // Fetch All Users Ajax Request
  const fetchAllUsers = async () => {
    const data = await fetch("action.php?read=1", {
      method: "GET",
    });
    const response = await data.text();
    tbody.innerHTML = response;
    // console.log(response);
  };
  fetchAllUsers();

  //Edit User Ajax Request
  // if (tbody) {
  //   tbody.addEventListener("click", (e) => {
  //     console.log("id");
  //   });
  // } else {
  //   console.error("tbody element not found");
  // }
   tbody.addEventListener('click', (e) => {
          if(e.target && e.target.matches('a.editLink')){
            e.preventDefault();
            let id = e.target.getAttribute("id");
            //console.log(id);
            editUser(id);
          }
   });
    //  const editUser = async (id) => {
    //   const data = await fetch(`action.php?edit=1&id=${id}`,{
    //     method: "GET",

    //   });
    //   const response = await data.json();
    //   console.log(response);
    const editUser = async (id) => {
    try {
        const data = await fetch(`action.php?edit=1&id=${id}`, {
            method: "GET",
        });
        const response = await data.json();
        //console.log(response);
        document.getElementById('id').value = response.id;
        document.getElementById('fname').value = response.first_name;
        document.getElementById('lname').value = response.last_name;
        document.getElementById('email').value = response.email;
        document.getElementById('phone').value = response.phone;
    } catch (error) {
        console.error('Error:', error);
    }
};

  //Update UserAjax Request

     

  
  updateForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(updateForm);
    formData.append("update", 1);

    if (updateForm.checkValidity() === false) {
      e.preventDefault();
      e.stopPropagation();
      updateForm.classList.add("was-validated");
      return false;
    } else {
      document.getElementById("edit-user-btn").value = "Please Wait...";
      const data = await fetch("action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
      //console.log(response);
      showAlert.innerHTML = response;
      document.getElementById("edit-user-btn").value = "Add UsEr";
      updateForm.reset();
      updateForm.classList.remove("was-validated");
      editModal.hide();
      fetchAllUsers();
    }
  });
 //Delete User Ajax Request
  tbody.addEventListener('click', (e) => {
          if(e.target && e.target.matches('a.deleteLink')){
            e.preventDefault();
            let id = e.target.getAttribute("id");
            //console.log(id);
            deleteUser(id);
          }
   });
   const deleteUser = async(id) => {
    const data = await fetch(`action.php?delete=1&id=${id}`,{
      method: "GET",
    });
     const response = await data.text();
     //console.log(response);
     showAlert.innerHTML =response;
     fetchAllUsers();
    };
     </script>
</body>
</html>