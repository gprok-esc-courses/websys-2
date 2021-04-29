<?php

// MODELS

class User {
    var $id;
    var $username;
    var $email;
    var $password;

    public function __construct($id, $username, $email, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}

class Image {
    var $id;
    var $image;
    var $legend;
    var $users_id;

    public function __construct($id, $image, $legend, $users_id) {
        $this->id = $id;
        $this->image = $image;
        $this->legend = $legend;
        $this->users_id = $users_id;
    }

}

// REPOSITORIES

class UserRepository {
    var $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findById($id) {

    }

    public function findByUserName($username) {

    }

    public function addNew($username, $password, $email) {

    }

    public function authenticate($username, $password) {
        $result = $this->pdo->query("SELECT * 
                                     FROM users 
                                     WHERE username='$username' AND password='$password'");
        if($row = $result->fetch()) {
            $user = new User($row['id'], $row['username'], $row['email'], $row['password']);
            return $user;
        }
        else {
            return null;
        }
    }
}

class ImageRepository {
    var $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function save($file, $legend, $user_id) {
        $path = 'images/' . $user_id . '/' . $file['name'];
        $image_data = getimagesize($file['tmp_name']);
        if($image_data == false) {
            return "Not an image";
        }
        if($file['size'] > 500000) {
            return "Size above limit";
        }
        if(move_uploaded_file($file['tmp_name'], $path)) {
            // save in db
            $filename = $file['name'];
            $stmt = $this->pdo->prepare("INSERT INTO images (filename, legend, users_id) 
                                         VALUES(?, ?, ?)");
            $stmt->execute([$filename, $legend, $user_id]);
            return "Uploaded";
        }
        else {
            return "Could not save file on the server";
        }
    }

    public function updateLegend($legend, $image_id) {
        $stmt = $this->pdo->prepare("UPDATE images SET legend=? WHERE id=?");
        $stmt->execute([$legend, $image_id]);
    }
}
