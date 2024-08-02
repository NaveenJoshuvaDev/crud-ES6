document.addEventListener("DOMContentLoaded", () => {
  const addForm = document.getElementById("add-user-form");
  const showAlert = document.getElementById("showAlert");
  const addModal = new bootstrap.Modal(
    document.getElementById("addNewUserModal")
  );
  const tbody = document.querySelector("tbody");

  if (!addForm || !showAlert || !addModal || !tbody) {
    console.error("One or more elements not found:", {
      addForm,
      showAlert,
      addModal,
      tbody,
    });
    return;
  }
  // Add New User Ajax Request

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
  if (tbody) {
    tbody.addEventListener("click", (e) => {
      console.log("id");
    });
  } else {
    console.error("tbody element not found");
  }
});
