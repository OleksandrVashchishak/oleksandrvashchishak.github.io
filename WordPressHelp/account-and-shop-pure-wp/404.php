<?php get_header() ?>
<div class="card not_found" style="background-image: url(<?=get_home_url()?>/wp-content/uploads/2019/08/top-image-min.jpg);">
    <div class="card-img-overlay">
        <div class="text-box text-center">
            <div class="number">
                404
            </div>
            <div class="title">
                PAGE NON TROUVÉE
            </div>
            <div class="content">
                Que ce soit à cause d'un lien invalide ou d'une mauvaise URL, vous pouvez revenir à l'accueil en cliquant sur le bouton ci-dessous :
            </div>
            <div class="btn_not_found">
                <a href="/">Retourner à l'accueil</a>
            </div>
        </div>
    </div>
</div>
<?php
?>
<style>
/*404*/
header {
    position: fixed!important;
    top: 0!important;
}
.not_found {
  height: 100vh;
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
}
.card-img-overlay {
    display: flex;
    align-items: center;
}
.not_found .text-box {
  width: 930px;
  height: 420px;
  margin: 0 auto;
  margin-top: 120px;
  background-color: white;
  opacity: 0.9;
  padding: 50px;
}
.not_found .text-box .number{
  line-height: normal;
  font-size: 120px;
  text-align: center;
  text-transform: uppercase;
  color: #000000;
}
.not_found .text-box .title{
  line-height: normal;
  font-size: 20px;
  text-transform: uppercase;

}
.not_found .text-box .content{
  line-height: 24px;
  font-size: 16px;
  max-width: 610px;
  margin: 0 auto;
  padding: 32px 0 50px 0;
  text-align: left;
  color: #000000;
}
.not_found .text-box .btn_not_found a{
  line-height: normal;
  font-size: 16px;
  text-align: center;
  text-transform: uppercase;
  color: #FFFFFF;
  background-color: black;
  padding: 11px 16px;
  text-decoration: none;
  border: 1px solid transparent;
  transition: 0.8s;
}
.not_found .text-box .btn_not_found:hover a{
  color: black;
  background-color: #fff;
  border: 1px solid black;
}


@media (min-width: 2560px) and (max-width: 4096px) {
  .not_found .text-box {
    width: 1000px;
    height: 800px;
    padding: 100px;
    margin: 300px auto;
  }
  .not_found {
    height: 1400px;
  }
  .not_found .text-box .number {
    font-size: 240px;
  }
  .not_found .text-box .title {
    font-size: 20px;
  }
  .not_found .text-box .content {
    line-height: 28px;
    font-size: 20px;
    padding: 60px 0 60px 0;
  }
  .not_found .text-box .btn_not_found a {
    font-size: 16px;
  }
}

@media (min-width: 590px) and (max-width: 991px) {
  .not_found .text-box {
    width: 530px;
    height: 460px;
  }
}
@media (min-width: 481px) and (max-width: 589px) {
  .not_found .text-box {
    width: 400px;
    height: 480px;
  }
  .not_found {
    height: 800px;
  }
}
@media (min-width: 320px) and (max-width: 480px) {
  .not_found .text-box {
    width: 270px;
    height: 380px;
    padding: 25px;
  }
  .not_found {
    height: 700px;
  }
  .not_found .text-box .number {
    font-size: 80px;
  }
  .not_found .text-box .title {
    font-size: 14px;
  }
  .not_found .text-box .content {
    line-height: 18px;
    font-size: 13px;
    padding: 32px 0 32px 0;
  }
  .not_found .text-box .btn_not_found a {
    font-size: 12px;
  }
}

</style>
<?php get_footer() ?>
