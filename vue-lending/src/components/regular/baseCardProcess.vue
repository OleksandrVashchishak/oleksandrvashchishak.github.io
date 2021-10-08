<template>
  <div class="card">
    <div class="card__number">{{ number }}</div>
    <div class="card__number card__number--mobile">{{ number }}</div>
    <p class="card__title">{{ title }}</p>
    <ul class="card__list">
      <slot></slot>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    title: {
      type: String,
      default: "Процесс"
    },
    number: {
      type: String,
      default: "01"
    },
    list: {
      type: Object,
      default() {
        return {};
      }
    }
  }
};
</script>

<style lang="scss">
.card {
  flex: 0 1 420px;
  border: 1px solid $blue;
  position: relative;
  padding: 30px 70px 20px 40px;
  margin-bottom: 30px;
  margin-right: 30px;
  @include for-min-desctop {
    flex: 0 1 50%;
    width: calc(50% - 30px);
  }
  @include for-tablet {
    flex: 1 1 auto;
    width: 100%;
    margin-right: 0px;
    margin-bottom: 40px;
  }
  @include for-mobile {
    margin-bottom: 75px;
  }

  &__number {
    position: absolute;
    right: 35px;
    top: 27px;
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: $yellow;
    border: 1px solid $blue;
    border-radius: 50%;
    @include for-tablet {
      font-size: 20px;
      line-height: 24px;
    }
    @include for-mobile {
      top: -50px;
      left: 0px;
    }
  }

  &__title {
    font-size: 24px;
    line-height: 29px;
    font-weight: 700;
    margin-bottom: 20px;
  }

  &__list {
  }
}
</style>
