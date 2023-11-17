<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="<?= base_url('assets\css\style.css') ?>">
</head>
<body>
    <header>
        <p class="header-content">
        <input type="text" name="" id="" placeholder="Search for ..."><input type="button" value="Search">
        </p>
        <headIcon>
          <img src="<?= base_url("assets\icons\icons8-notification-48.png") ?>" alt="">
          <img src="<?= base_url("assets\icons\icons8-message-48.png") ?>" alt="" srcset="">
          <img src="<?=  base_url("assets\icons\icons8-user-48.png")?>" alt="" srcset="">
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
            <a class="nav-link collapsed" href="<?= site_url('pages\DefinitionBesoinAchat') ?>">
              <i class="bi bi-grid"></i>
              <span> Creation de besoin d'achat</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Validation de besoin </span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Liste des besoins d'achat</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Selection des besoins</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Liste des demandes PF</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#">
              <i class="bi bi-grid"></i>
              <span>Liste de bon d'achat</span>
            </a>
          </li>
    
        </ul>
      </aside>