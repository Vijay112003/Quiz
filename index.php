<!DOCTYPE html>
<html lang="en">
<head>
<title>Examination Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
.already{
color:blue;
}
</style>
</head>
<body>
<div class="container mt-5 col-5">
<div class="card">
<h5 class="card-title m-3">Registration for examination</h5>
<div class="card-body">
<form action="landpage.php" method="POST">
<label for="name" class="form-label">Name</label>
<input type="text" placeholder="Your name" name="name" class="form-control mb-3" required>
<label class="form-label" for="typePhone">Phone number</label>
<input id="phonenum" name="num" placeholder="Your number" type="tel" class="form-control mb-3" required
>
<label for="email" class="form-label">E-mail</label>
<input type="text" placeholder="Your E-mail" name="email" class="form-control mb-3" required>
<label for="pass" class="form-label">Password</label>
<input type="password" placeholder="Your password" name="pass" class="form-control mb-3" required>
<label for="pass" class="form-label">Confirm-Password</label>
<input type="password" placeholder="Your password" name="cpass" class="form-control mb-3" required>
<div class="d-grid gap-2 col-4 mx-auto">
<input type="submit" class="btn btn-primary" name="Register" Value="Register">
</div>
</form>
</div>
<div class="card-body">
<form action="login.php" method="POST">
<div class="d-grid gap-2 col-4 mx-auto">
<label for="name" class="form-label"><span class="already">Already registered?</span></label>
<input type="submit" class="btn btn-primary" name="Login" Value="Login">
</div>
</form>
</div>
</div>
</div>
</body>
</html>