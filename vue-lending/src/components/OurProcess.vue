<template>
  <div class="container">
    <section class="process" id="process">
      <h2 class="process__title title">
        {{ $t("titleProcess") }}
      </h2>
      <div class="process__cards" data-aos="fade-right">
        <base-card-process :title="$t('cardTitle_1')" number="01">
          <li
            class="process__item"
            v-for="itemLi in listItems.prototype"
            :key="itemLi"
          >
            — {{ $t(itemLi) }}
          </li>
        </base-card-process>
        <base-card-process :title="$t('cardTitle_2')" number="02">
          <li
            class="process__item"
            v-for="itemLi in listItems.study"
            :key="itemLi"
          >
            — {{ $t(itemLi) }}
          </li>
        </base-card-process>
      </div>
      <div
        class="process__cards process__cards--second-row"
        data-aos="fade-left"
      >
        <base-card-process :title="$t('cardTitle_3')" number="03">
          <li
            class="process__item"
            v-for="itemLi in listItems.design"
            :key="itemLi"
          >
            — {{ $t(itemLi) }}
          </li>
        </base-card-process>
        <base-card-process :title="$t('cardTitle_4')" number="04">
          <li
            class="process__item"
            v-for="itemLi in listItems.responsiveness"
            :key="itemLi"
          >
            — {{ $t(itemLi) }}
          </li>
        </base-card-process>
      </div>
      <div
        class="light-pink-spot"
        data-aos="fade-right"
        data-aos-duration="2000"
      ></div>
    </section>
    <h3 class="process__quote">
      {{ $t("quote") }}
    </h3>
  </div>
</template>

<script>
import baseCardProcess from "./regular/baseCardProcess";

export default {
  components: { baseCardProcess },
  data() {
    return {
      listItems: {
        prototype: ["prototypeItem_1", "prototypeItem_2", "prototypeItem_3"],
        study: ["researchItem_1", "researchItem_2", "researchItem_3"],
        design: ["designItem_1", "designItem_2", "designItem_3"],
        responsiveness: ["adaptivItem_1", "adaptivItem_2"]
      }
    };
  }
};
</script>

<style lang="scss">
.process {
  position: relative;
  &__title {
    margin-bottom: 100px;
    @include for-tablet {
      margin-bottom: 30px;
    }
    @include for-mobile {
      margin-bottom: 0px;
    }
  }
  &__cards {
    display: flex;

    @include for-min-desctop {
      margin-right: -30px;
    }
    @include for-tablet {
      flex-wrap: wrap;
      margin-right: 0px;
    }
    @include for-mobile {
      margin-top: 75px;
    }
  }
  &__item {
    margin-bottom: 10px;
    font-weight: 300;
    letter-spacing: 0.015em;
  }
  &__cards--second-row {
    justify-content: center;
    margin-left: 150px;
    position: relative;
    z-index: 2;
    @include for-min-desctop {
      justify-content: flex-start;
      margin-left: 0px;
    }
    @include for-tablet {
      justify-content: flex-start;
      margin-left: 0px;
    }
    @include for-mobile {
      margin-top: 0px;
    }
  }
  &__quote {
    margin: 200px 0px;
    text-align: center;
    font-weight: 700;
    font-size: 40px;
    line-height: 49px;
    text-align: center;
    @include for-tablet {
      margin: 100px 0px 140px 0px;
      font-size: 24px;
      line-height: 29px;
    }
  }
}

.light-pink-spot {
  position: absolute;
  right: -120px;
  bottom: -100px;
  width: 261px;
  height: 261px;
  background: #edd6ff;
  -webkit-filter: blur(60px);
  filter: blur(60px);
  opacity: 0.7;
}
</style>
