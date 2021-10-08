<template>
  <footer class="footer section" id="contacts">
    <div class="container">
      <div class="footer__wrap">
        <div class="footer__column">
          <p class="footer__title">
            {{ $t("footerFormTitle") }}
            <base-form class="footer__form" :title="$t('footerBtn')" />
          </p>
        </div>
        <div class="footer__column">
          <p class="footer__title title-margin">
            {{ $t("footerOnline_1") }}<span>{{ $t("always") }}</span>
            {{ $t("footerOnline_2") }}
          </p>
          <a href="tel:++380639999999" class="footer__contacts">
            +38 (063) 999 99 99
          </a>
          <a href="mailto:soft.boost@gmail.com" class="footer__contacts">
            soft.boost@gmail.com
          </a>
        </div>
      </div>
      <div class="footer__links">
        <a href="#" class="footer__link">{{ $t("footerPrivacy") }}</a>
        <a href="#" class="footer__link">{{ $t("footerReserved") }}</a>
      </div>
    </div>
  </footer>
</template>

<script>
import baseForm from "./regular/baseForm";
export default {
  components: { baseForm }
};
</script>

<style lang="scss">
.footer {
  padding: 60px 80px;
  background-color: $blue;
  background-image: url("../assets/images/bg-spot-2.png"),
    url("../assets/images/bg-spot-3.png");
  background-repeat: no-repeat;
  background-size: contain, 271px 304px;
  background-position: left top 35px, right bottom;
  @include for-tablet {
    padding: 50px 20px;
    background-image: url("../assets/images/bg-spot-2.png"),
      url("../assets/images/mobile-spot.png");
    background-size: 350px 400px, 271px 304px;
    background-position: left bottom, right -120px top;
  }
  @include for-mobile {
    padding: 50px 0px;
  }
  &__wrap {
    display: flex;
    justify-content: space-between;
    @include for-min-desctop {
      flex-direction: column;
    }
  }
  &__form {
    margin-top: 60px;
  }
  &__column {
    @include for-tablet {
      margin-bottom: 80px;
    }
    @include for-min-desctop {
      margin-bottom: 20px;
    }
  }

  &__title {
    color: #fff;
    font-weight: 600;
    font-size: 24px;
    line-height: 29px;
    span {
      color: $yellow;
    }
  }

  &__contacts {
    color: #fff;
    font-size: 40px;
    line-height: 49px;
    margin-bottom: 10px;
    font-weight: 300;
    display: block;
    @include for-tablet {
      font-size: 30px;
      line-height: 37px;
    }
    @include for-mobile {
      font-size: 26px;
      line-height: 32px;
    }
  }

  &__links {
    display: flex;
    justify-content: space-between;
    margin-top: 140px;
    @include for-tablet {
      flex-direction: column;
      margin-bottom: 20px;
      margin-top: 0px;
    }
  }

  &__link {
    color: #fff;
    font-weight: 300;
    font-size: 16px;
    line-height: 20px;

    letter-spacing: 0.015em;
    @include for-tablet {
      margin-bottom: 20px;
    }
  }
}
.title-margin {
  margin-bottom: 60px;
}
</style>
