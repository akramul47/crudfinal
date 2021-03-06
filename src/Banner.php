<?php

namespace Bitm;

use PDO;

class Banner
{
    public function index()
    {
        session_start();
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `banner`";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();

        return $banners;
    }

    public function show()
    {
        $_id = $_GET['id'];

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam('id', $_id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();

        return $banner;
    }

    public function store()
    {
        session_start();

        $approot = $_SERVER['DOCUMENT_ROOT'] . '/CRUD/';
        //working with file

        $filename = 'IMG_' . time() . '_' . $_FILES['picture']['name'];
        $target = $_FILES['picture']['tmp_name'];
        $destination = $approot . 'uploads/' . $filename;

        $isFileMoved = move_uploaded_file($target, $destination);

        if ($isFileMoved) {
            $_picture = $filename;
        } else {
            $_picture = null;
        }

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_draft', $_POST)) {
            $_is_draft = $_POST['is_draft'];
        } else {
            $_is_draft = 0;
        }



        $_title = $_POST['title'];
        $_link = $_POST['link'];
        $_promotional_message = $_POST['promotional_message'];
        $_html_banner = $_POST['html_banner'];
        $_created_at = date('Y-m-d h:i:s', time());

        echo "<pre>";
        print_r($_title);
        echo "</pre>";
        //connect to database

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = " INSERT INTO `banner` (`title`,`link`, `promotional_message`, `html_banner`, `is_active`, `is_draft`, `picture`, `created_at`) VALUES (:title, :link, :promotional_message, :html_banner, :is_active, :is_draft, :picture, :created_at);";

        $stmt = $conn->prepare($query);
        //$stmt->bindParam('title', $_title);
        $result = $stmt->execute(array(
            ':title' => $_title,
            ':link' => $_link,
            ':promotional_message' => $_promotional_message,
            ':html_banner' => $_html_banner,
            ':is_active' => $_is_active,
            ':is_draft' => $_is_draft,
            ':picture' => $_picture,
            ':created_at' => $_created_at
        ));
        if ($result) {
            $_SESSION['message'] = "banner is added successfully.";
        } else {
            $_SESSION['message'] = "banner is not added";
        }
        //var_dump($result);
        header("location:index.php");
    }
    public function update()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . '/CRUD/';
        session_start();
        if ($_FILES['picture']['name'] != "") {
            $filename = 'IMG_' . time() . '_' . $_FILES['picture']['name'];
            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot . 'uploads/' . $filename;

            $isFileMoved = move_uploaded_file($target, $destination);

            if ($isFileMoved) {
                $_picture = $filename;
            } else {
                $_picture = null;
            }
        } else {
            $_picture = $_POST['old_picture'];
        }

        $_id = $_POST['id'];
        $_title = $_POST['title'];
        $_link = $_POST['link'];

        $_promotional_message = $_POST['promotional_message'];
        $_html_banner = $_POST['html_banner'];


        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_draft', $_POST)) {
            $_is_draft = $_POST['is_draft'];
        } else {
            $_is_draft = 0;
        }

        $_modified_at = date('Y-m-d h:i:s', time());
        echo "<pre>";
        //print_r($_title);
        echo "</pre>";
        //connect to database

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE `banner` SET `title` = :title, `link` = :link, `promotional_message` = :promotional_message, `html_banner` = :html_banner, `is_active` = :is_active, `is_draft` = :is_draft, `picture` = :picture, `modified_at` = :modified_at WHERE `banner`.`id` = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam('id', $_id);
        $stmt->bindParam('title', $_title);
        $stmt->bindParam('link', $_link);
        $stmt->bindParam('promotional_message', $_promotional_message);
        $stmt->bindParam('html_banner', $_html_banner);
        $stmt->bindParam('is_active', $_is_active);
        $stmt->bindParam('is_draft', $_is_draft);
        $stmt->bindParam('picture', $_picture);
        $stmt->bindParam('modified_at', $_modified_at);
        $result = $stmt->execute();

        //var_dump($result);

        if ($result) {
            $_SESSION['message'] = "Banner is updated successfully.";
        } else {
            $_SESSION['message'] = "Banner is not updated";
        }

        header("location:index.php");
    }

    public function edit()
    {
        $_id = $_GET['id'];

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();

        return $banner;
    }

    public function delete()
    {
        session_start();
        $_id = $_GET['id'];
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "DELETE FROM `banner` WHERE `banner`.`id` = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['message'] = "Banner is deleted successfully.";
        } else {
            $_SESSION['message'] = "Banner is not deleted";
        }
        //var_dump($result);
        header("location:index.php");
    }
}
