<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td>johndoe@example.com</td>
                <td>1234567890</td>
                <td>2024-06-24</td>
                <td>
                    <a href="#" id="1" class="btn btn-success btn-sm rounded-pill py-0 editLink">Edit</a>
                    <a href="#" id="1" class="btn btn-danger btn-sm rounded-pill py-0">Delete</a>
                </td>
            </tr>
            <!-- More rows -->
        </tbody>
    </table>
    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tbody = document.querySelector("tbody");
            if (tbody) {
                tbody.addEventListener("click", (e) => {
                    console.log("id");
                });
            } else {
                console.error("tbody element not found");
            }
        });
    </script>
</body>
</html>
