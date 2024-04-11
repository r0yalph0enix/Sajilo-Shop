<!DOCTYPE html>
<html>
<head>
    <title>Basic Form Validation</title>
    <script>
        function validateForm() {
            var name = document.forms["myForm"]["name"].value;
            var email = document.forms["myForm"]["email"].value;

            if (name === "" || email === "") {
                alert("Both name and email are required.");
                return false;
            }

            if (!isValidName(name)) {
                alert("Invalid name format. Name can only contain letters.");
                return false;
            }

            if (!isValidEmail(email)) {
                alert("Invalid email format.");
                return false;
            }
        }

        function isValidName(name) {
            var nameRegex = /^[a-zA-Z]+$/;
            return nameRegex.test(name);
        }

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</head>
<body>
    <form name="myForm" onsubmit="return validateForm();" method="post" action="submit.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
