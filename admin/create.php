<?php
session_start();
require '../db.php'; // Adjust the path to db.php if needed

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image'];
    
    // Image Upload Handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);
    move_uploaded_file($image["tmp_name"], $target_file);
    
    // Insert into database
    $stmt = $pdo->prepare('INSERT INTO blog (title, category, description, image) VALUES (:title, :category, :description, :image)');
    $stmt->execute([
        'title' => $title,
        'category' => $category,
        'description' => $description,
        'image' => $target_file
    ]);
    
    $_SESSION['message'] = "Blog post created successfully!";
    header("Location: ../dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Create Blog Post</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="card p-4 shadow-lg">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select" required>
                <option value="World">World</option>
                <option value="Design">Design</option>
                <option value="Technology">Technology</option>
                <option value="Business">Business</option>
                <option value="Health & Wellness">Health & Wellness</option>
                <option value="Lifestyle">Lifestyle</option>
                <option value="Education">Education</option>
                <option value="Science">Science</option>
                <option value="Finance">Finance</option>
                <option value="Entertainment">Entertainment</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</body>
</html>