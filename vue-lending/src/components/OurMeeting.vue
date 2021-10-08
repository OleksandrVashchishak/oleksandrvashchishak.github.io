<template>
  <div class="container">
    <div class="meeting">
      <div class="meeting__column">
        <h2 class="meeting__title title">
          {{ $t("titleMeet") }}
        </h2>
        <img class="meeting__img" src="@/assets/images/arrow.svg" alt="" />
      </div>
      <div class="meeting__column">
        <p class="meeting__text">
          <strong> {{ $t("meetStrong_1") }}</strong> {{ $t("meetText_1") }}
        </p>
        <strong>{{ $t("meetStrong_2") }}</strong>
        <ol class="meeting__list">
          <li>{{ $t("meetTextList_1") }}</li>
          <li>{{ $t("meetTextList_2") }}</li>
          <li>{{ $t("meetTextList_3") }}</li>
          <li>{{ $t("meetTextList_4") }}</li>
        </ol>
        <p class="meeting__line">{{ $t("meetText_2") }}</p>
        <strong>{{ $t("meetStrong_3") }}</strong>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.meeting {
  padding-bottom: 200px;
  display: flex;
  @include for-tablet {
    flex-direction: column;
    padding-bottom: 40px;
  }
  &__img {
    width: 140px;
    height: 102px;
  }

  &__column {
    width: 50%;
    @include for-tablet {
      width: 100%;
      margin-bottom: 100px;
    }
    img {
      margin-top: 40px;
    }
  }

  &__title {
    font-size: 60px;
    line-height: 72px;
  }

  &__text {
    margin-bottom: 25px;
    letter-spacing: 0.015em;
  }
}
</style>
