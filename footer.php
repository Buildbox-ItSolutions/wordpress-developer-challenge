<footer>
   <div class="container">
      <div class="footer__logo">
         <a href="<?php bloginfo('url') ?>">
            <svg class="logo-svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
               <path d="M3 22v-20l18 10-18 10z" />
            </svg>
            <?php bloginfo("title"); ?>
         </a>
      </div>
      <div class="footer__copy">
         &copy;
         <?php echo date("Y"); ?>
         &mdash;
         <?php bloginfo("title"); ?>
         &mdash;
         Todos os direitos reservados.
      </div>
   </div>
</footer>
</body>

</html>
