<!DOCTYPE html>
<html>
<head>
    <title>Job Application Upload</title>
</head>
<body>
    <h2>Upload Resume and Photograph</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Resume (PDF/DOC, max 500KB):</label>
        <input type="file" name="resume" required><br><br>

        <label>Photograph (JPG/JPEG, max 1MB):</label>
        <input type="file" name="photo" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
