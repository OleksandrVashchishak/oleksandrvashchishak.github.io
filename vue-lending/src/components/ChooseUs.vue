<template>
  <div class="container">
    <div class="choose" id="choose">
      <div class="choose__column choose__column--title">
        <h2 class="choose__title title">
          {{ $t("chooseTitle") }}
        </h2>
        <img class="choose__check" src="@/assets/images/checkmark.svg" alt="" />
        <div
          data-aos="zoom-in"
          data-aos-duration="2000"
          data-aos-offset="200"
          class="pink-spot"
        ></div>
        <div
          data-aos="zoom-out-up"
          data-aos-duration="4000"
          data-aos-offset="200"
          class="blue-spot"
        ></div>
      </div>
      <div class="choose__column advantages">
        <div class="advantages__item">
          <img src="@/assets/images/date.svg" alt="Точно в срок" />
          <div class="advantages__info">
            <h4 class="advantages__title">{{ $t("chooseTitle_1") }}</h4>
            <p class="advantages__text">
              {{ $t("chooseText_1") }}
              <strong>{{ $t("chooseTextStrong_1") }}</strong>
            </p>
          </div>
        </div>
        <div class="advantages__item">
          <img src="@/assets/images/message.svg" alt="Всегда на связи" />
          <div class="advantages__info">
            <h4 class="advantages__title">{{ $t("chooseTitle_2") }}</h4>
            <p class="advantages__text">
              {{ $t("chooseText_2") }}
              <strong>{{ $t("chooseTextStrong_2") }}</strong
              >, {{ $t("chooseText_2_2") }}
            </p>
          </div>
        </div>
        <div class="advantages__item">
          <img src="@/assets/images/happy.svg" alt="Сотрудничество" />
          <div class="advantages__info">
            <h4 class="advantages__title">{{ $t("chooseTitle_3") }}</h4>
            <p class="advantages__text">
              {{ $t("chooseText_3") }}<strong> {{ $t("chooseStrong") }}</strong>
            </p>
          </div>
        </div>
        <div class="advantages__item">
          <img src="@/assets/images/flag.svg" alt="Ваши достижения" />
          <div class="advantages__info">
            <h4 class="advantages__title">{{ $t("chooseTitle_4") }}</h4>
            <p class="advantages__text">
              {{ $t("chooseText_4") }}
              <strong>{{ $t("chooseTextStrong_4") }}</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
.choose {
  display: flex;
  @include for-tablet {
    flex-direction: column;
  }
  &__column {
    width: 50%;
    &--title {
      position: relative;
      margin-bottom: 67px;
    }
    @include for-tablet {
      width: 100%;
    }
  }
  &__check {
    position: relative;
    z-index: 2;
  }
  &__title {
    margin-bottom: 40px;
  }
}

.advantages {
  &__item {
    display: flex;
    margin-bottom: 50px;
    align-items: flex-start;
    img {
      margin-top: -7px;
    }
  }

  &__info {
    margin-left: 35px;
    @include for-tablet {
      margin-left: 25px;
    }
  }

  &__title {
    font-weight: 700;
    font-size: 24px;
    line-height: 29px;
    margin-bottom: 10px;
    @include for-tablet {
      font-size: 24px;
      line-height: 29px;
    }
  }

  &__text {
    letter-spacing: 0.015em;
    font-weight: 300;
  }
}

.pink-spot {
  width: 124px;
  height: 124px;
  background: #dd4df5;
  -webkit-filter: blur(55px);
  filter: blur(55px);
  margin: 10px 0px 0px 188px;
  opacity: 0.5;
  @include for-tablet {
    position: absolute;
    bottom: 20px;
    right: 0;
    z-index: 1;
    opacity: 0.3;
  }
}

.blue-spot {
  width: 124px;
  height: 124px;
  background: #6764ff;
  -webkit-filter: blur(55px);
  filter: blur(55px);
  margin-left: 60px;
  opacity: 0.5;
  @include for-tablet {
    position: absolute;
    bottom: 0;
    right: 20%;
    z-index: 1;
    opacity: 0.3;
  }
}
</style>
