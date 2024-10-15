<?php 
require_once 'dbConfig.php';

function insertIntoSoftwareEngineerRegistration($pdo, $full_name, $email_address, $phone_number, $certifications, $software_skills, $years_in_industry) { 
    $sql = "INSERT INTO SoftwareEngineerRegistration (full_name, email_address, phone_number, certifications, software_skills, years_in_industry) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$full_name, $email_address, $phone_number, $certifications, $software_skills, $years_in_industry]); 
    if ($executeQuery) {
        return true;    
    }
}

function seeAllSoftwareEngineerRegistrations($pdo) {
    $sql = "SELECT * FROM SoftwareEngineerRegistration";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getSoftwareEngineerRegistrationByID($pdo, $id) {
    $sql = "SELECT * FROM SoftwareEngineerRegistration WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        return $stmt->fetch();
    }
}

function updateSoftwareEngineerRegistration($pdo, $id, $full_name, $email_address, $phone_number, $certifications, $software_skills, $years_in_industry) {
    $sql = "UPDATE SoftwareEngineerRegistration SET full_name = ?, email_address = ?, phone_number = ?, certifications = ?, software_skills = ?, years_in_industry = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$full_name, $email_address, $phone_number, $certifications, $software_skills, $years_in_industry, $id]);
    if ($executeQuery) {
        return true;
    }
}

function deleteSoftwareEngineerRegistration($pdo, $id) {
    $sql = "DELETE FROM SoftwareEngineerRegistration WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);
    if ($executeQuery) {
        return true;
    }
}
?>
