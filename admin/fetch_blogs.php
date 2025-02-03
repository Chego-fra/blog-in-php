<?php
session_start();
require '../db.php'; // Adjust the path if needed

// Function to fetch all blogs
function getAllBlogs($pdo) {
    $stmt = $pdo->prepare('SELECT * FROM blog ORDER BY id DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a blog post
function deleteBlog($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM blog WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $_SESSION['message'] = "Blog post deleted successfully!";
    header("Location: fetch_blogs.php");
    exit;
}

// Handle delete request
if (isset($_GET['delete_id'])) {
    deleteBlog($pdo, $_GET['delete_id']);
}

// Fetch blogs from the database
$blogs = getAllBlogs($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            background: #fff;
        }
        th {
            background: #007bff;
            color: #fff;
            text-align: center;
        }
        td {
            vertical-align: middle;
        }
        img {
            border-radius: 5px;
            object-fit: cover;
        }
        .btn-sm {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">All Blog Posts</h2>
        
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-success text-center">
                <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($blog['id']); ?></td>
                        <td><?php echo htmlspecialchars($blog['title']); ?></td>
                        <td><?php echo htmlspecialchars($blog['category']); ?></td>
                        <td><?php echo htmlspecialchars($blog['description']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($blog['image']); ?>" width="100" height="60" alt="Blog Image"></td>
                        <td>
                            <a href="edit.php?id=<?php echo $blog['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="fetch_blogs.php?delete_id=<?php echo $blog['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>