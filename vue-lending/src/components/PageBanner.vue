<template>
  <div class="banner">
    <div class="container">
      <div class="banner__wrap">
        <div class="banner__column banner__form">
          <h3 class="banner__title">
            {{ $t("titleBanner_1") }} <span>{{ $t("titleBanner_2") }}</span>
          </h3>
          <base-form class="banner__form-wrap" :title="$t('bannerBtn')" />
        </div>
        <div class="banner__column banner__column--img">
          <div class="banner__img">
            <img src="@/assets/images/logo-blue.png" alt="Soft Boost" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import baseForm from "./regular/baseForm";
export default {
  components: { baseForm }
};
</script>

<style lang="scss">
.banner {
  background-color: $blue;
  margin-bottom: 200px;
  padding: 60px 0px;
  background-repeat: no-repeat;
  background-position: left bottom;
  background-image: url("../assets/images/line-bg.png");
  background-repeat: no-repeat;
  background-size: contain;
  @include for-tablet {
    padding: 70px 0px 100px 0px;
    margin-bottom: 140px;
  }
  &__wrap {
    display: flex;
    @include for-tablet {
      flex-direction: column;
    }
  }

  &__title {
    font-weight: 600;
    font-size: 40px;
    line-height: 49px;
    color: #fff;
    @include for-tablet {
      font-size: 30px;
      line-height: 37px;
    }
    span {
      color: $yellow;
    }
  }
  &__form {
    flex: 0 0 auto;
    width: 58.3333333333%;
    @include for-tablet {
      width: 100%;
    }
    &-wrap {
      margin-top: 70px;
    }
  }
  &__img {
    margin-top: -9px;
    position: relative;
    @include for-min-desctop {
      max-width: 50%;
    }
    @include for-tablet {
      margin-top: 80px;
    }
  }

  &__column {
    &--img {
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }
}
</style>
