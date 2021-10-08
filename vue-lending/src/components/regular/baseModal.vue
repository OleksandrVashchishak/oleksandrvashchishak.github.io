<template>
  <transition name="fade">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <img
            class="modal-close"
            src="@/assets/images/close.svg"
            alt="Close"
            @click="closePopup"
          />
          <p class="modal-header">
            {{ $t("modalHeader") }}
          </p>
          <div class="modal-body">
            <slot name="body">
              <form class="modal-form" @submit.prevent="onSubmit">
                <input
                  type="text"
                  class="modal-form__input"
                  :placeholder="$t('formPlaceholderName')"
                  v-model="name"
                />
                <input
                  type="email"
                  class="modal-form__input"
                  :placeholder="$t('email')"
                  v-model="email"
                />
                <input
                  type="number"
                  class="modal-form__input"
                  :placeholder="$t('formPlaceholderMobile')"
                  v-model="mobile"
                />
                <button class="modal-button" @click="resetValue()">
                  {{ $t("modalBtn") }}
                </button>
              </form>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "baseModal",
  data() {
    return {
      name: "",
      mobile: "",
      email: ""
    };
  },
  methods: {
    closePopup() {
      this.$emit("closePopup");
    },
    onSubmit() {
      const formData = {
        name: this.name,
        mobile: this.mobile,
        email: this.email
      };
      console.log(formData);
    },
    resetValue() {
      (this.name = ""), (this.mobile = ""), (this.email = "");
    }
  }
};
</script>

<style lang="scss">
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.header {
  font-weight: 300;
  font-size: 24px;
  line-height: 29px;
}

.modal-form {
  display: flex;
  flex-direction: column;
  &__input {
    border: 0;
    border-bottom: 1px solid #374567;
    padding: 5px 0px;
    color: $blue;
    margin-bottom: 40px;
    font-size: 16px;
    line-height: 20px;
    &:focus {
      outline: none;
    }
    &::placeholder {
      font-size: 16px;
      line-height: 20px;
      color: $blue;
    }
  }
}

.modal-header {
  text-align: center;
  color: #000;
  font-weight: 300;
  font-size: 24px;
  line-height: 29px;
  margin-bottom: 50px;
  margin: 0 auto;
  max-width: 277px;
}

.modal-button {
  margin-top: 10px;
  background-color: $yellow;
  font-size: 16px;
  line-height: 19px;
  padding: 16px 42px;
  min-width: 240px;
  transition: all 0.3s ease 0s;
  align-self: center;
  &:hover {
    filter: drop-shadow(0px 4px 20px rgba(0, 0, 0, 0.2));
  }
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  transition: opacity 0.3s ease;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-close {
  position: absolute;
  top: 15px;
  right: 15px;
  cursor: pointer;
  @include for-mobile {
    top: 25px;
    right: 25px;
  }
}

.modal-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: all 0.3s ease 0s;
}

.modal-container {
  width: 645px;
  margin: 0px auto;
  padding: 60px 115px;
  background-color: #fff;
  transition: all 0.3s ease;
  position: relative;
  @include for-tablet {
    width: 450px;
  }
  @include for-mobile {
    width: 100vw;
    padding: 60px 10px;
  }
}

.modal-body {
  margin: 20px 0;
}
</style>
