<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user = $this->session->user;
$niveau = $user->niveau_poste;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commercial</title>
	<link rel="stylesheet" href="<?= base_url('assets\css\style.css') ?>">
</head>
<body>
    <header>
        <p class="header-content">
        <?= $user->nom_emp ?> - <strong><?= $user->nom_poste ?></strong> 
        </p>
        <headIcon>
          <img src="<?= base_url("assets\icons\icons8-notification-48.png") ?>" alt="">
          <img src="<?= base_url("assets\icons\icons8-message-48.png") ?>" alt="" srcset="">
          <a href="<?= site_url("Deconnection") ?>"><img src="<?=  base_url("assets\icons\icons8-user-48.png")?>" alt="" srcset=""></a>
        </headIcon>
    </header>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
            <a class="nav-link " href="#">
              <i class="bi bi-grid"></i>
              <span class="titre">Commerce</span>
            </a>
          </li>
    
        <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" href="<?= site_url('besoinAchat\creerBesoinAchat') ?>">
              <i class="bi bi-grid"></i>
              <span> Creation de besoin d'achat</span>
            </a>
          </li>
          <?php if($niveau >= 111) { ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="<?= site_url('besoinAchat\toValidationBesoin') ?>">
              <i class="bi bi-grid"></i>
              
              <span>Validation de besoin </span>
              
            </a>
          </li>
          <?php } ?>
    
          <?php if($user->id_dept== 3) { ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="<?= site_url('besoinAchat\toListeBesoinGrpParArticle') ?>">
              <i class="bi bi-grid"></i>
              <span>Liste des besoins d'achat</span>
            </a>
          </li>
          <?php } ?>
          
          <?php if($user->id_dept== 3) { ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="<?= site_url("besoinAchat/toSelectBesoin") ?>">
              <i class="bi bi-grid"></i>
              <span>Selection des besoins</span>
            </a>
          </li>
          <?php } ?>

          <?php if($user->id_dept== 3) { ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Liste des demandes proforma</span>
            </a>
          </li>
          <?php } ?>

          <?php if($user->id_dept== 3) { ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Liste de bon de commande</span>
            </a>
          </li>
          <?php } ?>
    
        </ul>
      </aside>