<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Faculty of Computing and Informatics">
        <meta name="keywords" content="Faculty of Computing and Informatics, FKI, FCI, UMS">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        
        <!--------------- tab icon --------------->
        <link rel="icon" href="<?=base_url()?>public/img/fki-logo.png">
        
        <!---------------icons---------------->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/26a60321dc.js" crossorigin="anonymous"></script> 
        <!-- ^^^ stefanie's fontawesome link ^^^ -->

        <!---------------- CSS --------------->
       <link rel="stylesheet" href="<?=base_url()?>public\css\styles.css">
    </head>
    <body>
         <!-- Page Preloader-->
        <!-- <div id="preloader">
            <div class="loader">
                <div class="loader --4">
                </div>
            </div>
        </div> -->
        <!------------- header section ------------->
        <header class="header" id="header">
            <nav class="nav nav-container">
            <a href="#" class="nav-logo"><img src="<?=base_url()?>public/img/long-logo.png" alt="logo"></a>

            <div class="nav-menu" id="nav-menu">
            <ul class="nav-list">
            <li class="nav-item"><a href="<?=base_url()?>studLogged/#home" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studLogged/#about" class="nav-link">ABOUT</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studLogged/#academic" class="nav-link">ACADEMIC</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studLogged/#event" class="nav-link">EVENT</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studLogged/#faqs" class="nav-link">FAQs</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studLogged/#contact" class="nav-link">CONTACT</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studProfile" class="nav-link">PROFILE</a></li>
                <li class="nav-item"><a href="<?=base_url()?>studLogout" class="nav-link">LOGOUT</a></li>
            </ul>
        
            <!-- close nav button -->
            <div class="nav-close" id="nav-close">
                <i class="ri-close-line"></i>
            </div>
            </div>
            <!-- burger -->
            <div class="nav-toggle" id="nav-toggle">
                <i class="ri-menu-line"></i> 
            </div>
            </nav>
        </header>
    </body>

