<?php
session_start();
require '../db.php'; // Adjust the path if needed

// Function to fetch a single blog post by ID
function getBlogById($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM blog WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update a blog post
function updateBlog($pdo, $id, $title, $category, $description, $image) {
    $stmt = $pdo->prepare('UPDATE blog SET title = :title, category = :category, description = :description, image = :image WHERE id = :id');
    $stmt->execute([
        'id' => $id,
        'title' => $title,
        'category' => $category,
        'description' => $description,
        'image' => $image
    ]);
    $_SESSION['message'] = "Blog post updated successfully!";
    header("Location: ../dashboard.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    updateBlog($pdo, $id, $title, $category, $description, $image);
}

// Fetch the blog post to be edited
if (isset($_GET['id'])) {
    $blog = getBlogById($pdo, $_GET['id']);
} else {
    header("Location: fetch_blogs.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Blog Post</h2>
        
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($blog['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($blog['category']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($blog['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($blog['image']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Blog Post</button>
        </form>
    </div>
</body>
</html>