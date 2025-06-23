<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /Projet_Stage_CIM_V2/Login/login.html');
    exit();
}

// Role-specific checks
$current_path = $_SERVER['PHP_SELF'];

// Check for student access
if (strpos($current_path, '/Etudiants_vue/') !== false) {
    if ($_SESSION['user']['role'] !== 'etudiant') {
        header('Location: /Projet_Stage_CIM_V2/Login/login.html');
        exit();
    }
}

// Check for teacher access
if (strpos($current_path, '/Enseignants/') !== false || 
    strpos($current_path, '/Soutenances/') !== false || 
    strpos($current_path, '/Soutenances_3/') !== false || 
    strpos($current_path, '/Salles/') !== false) {
    if ($_SESSION['user']['role'] !== 'enseignant') {
        header('Location: /Projet_Stage_CIM_V2/Login/login.html');
        exit();
    }
}
?>