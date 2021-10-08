<template>
  <div class="special section" id="about">
    <div class="container">
      <h2 class="special__title title">{{ $t("titleSpecial") }}</h2>
    </div>
    <div class="special__bg">
      <div class="container">
        <div class="special__item">
          <p class="special__number">
            <span>01.</span> {{ $t("specialItem_1") }}
          </p>
          <p class="special__text">
            {{ $t("specialText_1") }}
          </p>
        </div>
      </div>
    </div>
    <div class="special__bg">
      <div class="container">
        <div class="special__item">
          <p class="special__number">
            <span>02.</span> {{ $t("specialItem_2") }}
          </p>
          <p class="special__text">
            {{ $t("specialText_2") }}
          </p>
        </div>
      </div>
    </div>
    <div class="special__bg">
      <div class="container">
        <div class="special__item">
          <p class="special__number">
            <span>03.</span> {{ $t("specialItem_3") }}
          </p>
          <p class="special__text">
            {{ $t("specialText_3") }} <br />
            {{ $t("specialText_3_br") }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.special {
  padding: 200px 0px;
  @include for-desctop {
    padding: 140px 0px;
  }

  &__title {
    margin-bottom: 60px;
  }
  &__bg {
    transition: all 0.3s ease 0s;
    &:hover {
      background-color: $yellow;
    }
  }

  &__item {
    display: flex;
    padding: 40px 0px;
    border-bottom: 1px solid #dddddd;
    @include for-tablet {
      flex-direction: column;
      padding: 30px 0px;
    }
    &:last-child {
      margin-bottom: 0px;
    }
  }

  &__number {
    max-width: 285px;
    font-weight: 700;
    font-size: 24px;
    line-height: 29px;
    display: flex;
    span {
      margin-right: 70px;
      @include for-tablet {
        margin-right: 40px;
      }
    }
    @include for-tablet {
      margin-bottom: 30px;
    }
  }

  &__text {
    margin-left: auto;
    max-width: 533px;
    letter-spacing: 0.015em;
    width: 100%;
  }
}
</style>
