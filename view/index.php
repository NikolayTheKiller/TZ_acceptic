<?php include_once 'view/template/header.php'; ?>

<div id="main">
    <div id="news">
        <h2 class="heading">Новости</h2>
        <div style="clear: both"><br></div>
        <!-- статья -->
        <?php for($i=0; $i<6; $i++):
        echo '<div class="article">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Languages_in_Ukraine2.png/300px-Languages_in_Ukraine2.png" alt="test">
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed consectetur adipiscing elit</span>
        </div>';       
        endfor; ?>
        <a href="#" title="больше" class="main">
            <div class="btn">читать всю статью</div>
        </a> 
    </div>
</div>
<aside>
    <div id="courses">
        <h2 class="heading">Спорт</h2>
         <div style="clear: both"><br></div>
         <!-- курс -->
         <?php for($i=0; $i<4; $i++):
        echo '<div class="course">
            <img src="https://www.acquia.com/sites/acquia.com/files/styles/hero_carousel_1x/public/images/2017-12/powdr4.png?itok=bWvC7Zry" alt="test">
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
             sed consectetur adipiscing elit</span>
        </div> <div style="clear: both"><br></div> ' ;       
        endfor; ?>
         <a href="#" title="больше" class="main">
            <div class="btn">читать всю статью</div>
        </a>
    </div>
 <div style="clear: both"><br></div>    
</aside>


<?php include_once 'view/template/footer.php'; ?>
        
        