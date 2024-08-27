<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Horizon/Assets/style/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title><?= $title; ?></title>
  </head>
  <body>
    <!-- ukuran nav -->
    <!-- ukuran nav -->
  <?= $this->renderSection('header'); ?>
    <!-- ukuran nav -->
    <!-- ukuran nav -->
    

    
    <?php if(!logged_in()): ?>
       
      <?= $this->include('user/layout-navbar-visitor'); ?>

    <?php else: ?>

        <?php if($role == 'admin') : ?>

          <?= $this->include('user/layout-navbar-admin'); ?>

        <?php else: ?>

          <?= $this->include('user/layout-navbar-user'); ?>

        <?php endif; ?>


    <?php endif; ?>
  
        
        


    <!-- lates post -->

    <!-- content isi -->
    <!-- content isi -->
    <!-- content isi -->
    <!-- content isi -->
    <!-- content isi -->
    <?= $this->renderSection('content'); ?>
    <!-- content isi -->
    <!-- content isi -->
    <!-- content isi -->
    <!-- content isi -->
    <!-- content isi -->

  <!--  <a href="https://wa.me/6285954629508  " class="floating" target="_blank">
<i class="fab fa-whatsapp fab-icon"></i>
</a> -->
    <footer>@ Zona Bogor <?= date('Y'); ?> | by YUPI</footer>
    <!-- modal -->
   

    <script>
      window.onload = function () {
        document.getElementById("waterbox").style.display = "none";
        document.getElementById("hillbox").style.display = "none";
      };

      const waterbox = document.getElementById("waterbox");
      const hillbox = document.getElementById("hillbox");

      function handleRadioClick() {
        if (document.getElementById("water").checked) {
          waterbox.style.display = "block";
          hillbox.style.display = "none";
        } else if (document.getElementById("hill").checked) {
          hillbox.style.display = "block";
          waterbox.style.display = "none";
        } else {
          waterbox.style.display = "none";
          hillbox.style.display = "none";
        }
      }

      const radioButtons = document.querySelectorAll('input[name="filterradio"]');
      radioButtons.forEach((radio) => {
        radio.addEventListener("click", handleRadioClick);
      });
    </script>

      <!-- midtrans -->
      <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-vhiX5Ca1FtWkzsls"></script>
      <script>
        $('#pay-button').click(function(e) {
          e.preventDefault();
          alert('test');
        })
      </script>

        <script> 
            function alertLogin() { 
                alert("Login Terlebih Dahulu\n "); 
            } 
        </script> 

<script>
    let sortBtn = document.querySelector(".filter-menu").children;
    let sortItem = document.querySelector(".filter-item").children;

    for (let i = 0; i < sortBtn.length; i++) {
      sortBtn[i].addEventListener("click", function () {
        for (let j = 0; j < sortBtn.length; j++) {
          sortBtn[j].classList.remove("current");
        }

        this.classList.add("current");

        let targetData = this.getAttribute("data-target");

        for (let k = 0; k < sortItem.length; k++) {
          sortItem[k].classList.remove("active");
          sortItem[k].classList.add("delete");

          if (sortItem[k].getAttribute("data-item") == targetData || targetData == "all") {
            sortItem[k].classList.remove("delete");
            sortItem[k].classList.add("active");
          }
        }
      });
    }
  </script>
      
  </body>
</html>
