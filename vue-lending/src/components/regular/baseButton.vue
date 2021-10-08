<template>
  <div class="button-wrap">
    <button class="button" @click="$emit('showModal')">
      <slot>
        {{ title }}
      </slot>
    </button>
  </div>
</template>

<script>
export default {
  name: "BaseButton",
  props: {
    title: String
  }
};
</script>

<style lang="scss">
.button {
  background-color: $yellow;
  font-size: 16px;
  line-height: 19px;
  padding: 16px 42px;
  min-width: 240px;
  transition: all 0.3s ease 0s;
  &:hover {
    filter: drop-shadow(0px 4px 20px rgba(0, 0, 0, 0.2));
  }
}
</style>
