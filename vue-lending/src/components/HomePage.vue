<template>
  <section class="home-wrap" id="home">
    <base-modal v-if="isFormPopupVisible" @closePopup="closePopup"></base-modal>
    <div class="container">
      <div class="home">
        <div class="home__logo">
          <div class="logo-wrapper">
            <img
              class="home__logo--img"
              src="@/assets/images/logo.svg"
              alt="Soft Boost"
            />
            <input type="checkbox" class="switch-logo" id="switch" /><label
              class="switch-label"
              for="switch"
              >Toggle</label
            >
          </div>
          <div
            class="spot-yellow"
            data-aos="zoom-in"
            data-aos-offset="0"
            data-aos-duration="2000"
          ></div>
        </div>
        <div class="home__info">
          <h1 class="home__title">
            {{ $t("mainTitle_1") }} <br /><span>{{ $t("mainTitle_2") }}</span>
          </h1>
          <p class="home__text">
            {{ $t("mainText") }}
          </p>
          <base-button @showModal="showModal">{{ $t("btnHome") }}</base-button>
        </div>
      </div>
    </div>
    <marquee-text :repeat="10">
      <p>Design</p>
      <p>Development</p>
      <p>Testing</p>
      <p>Management</p>
      <p>Analytics</p>
    </marquee-text>
  </section>
</template>

<script>
import baseButton from "./regular/baseButton";
import BaseModal from "./regular/baseModal";
import MarqueeText from "vue-marquee-text-component";

export default {
  components: { baseButton, BaseModal, MarqueeText },
  data() {
    return {
      isFormPopupVisible: false
    };
  },
  mounted() {
    const switchItem = document.querySelector(".switch-label");

    switchItem.onmouseenter = function() {
      document.getElementById("switch").checked = true;
    };

    switchItem.onmouseleave = function() {
      setTimeout(
        function() {
          document.getElementById("switch").checked = false;
        }.bind(this),
        1000
      );
    };
  },
  methods: {
    showModal() {
      this.isFormPopupVisible = true;
    },
    closePopup() {
      this.isFormPopupVisible = false;
    }
  }
};
</script>

<style lang="scss">
.logo-wrapper {
  position: relative;
  max-width: 500px;
  @include for-tablet {
    max-width: 100%;
  }
}
.switch-label {
  cursor: pointer;
  text-indent: -9999px;
  width: 224px;
  height: 117px;
  background: grey;
  display: block;
  border-radius: 100px;
  position: absolute;
  bottom: 25px;
  left: 117px;
  // opacity: 0.5;
  @include for-min-desctop {
    width: 21vw;
    height: 112px;
    bottom: 33px;
    left: 109px;
  }
  @media screen and (max-width: 965px) {
    display: none;
  }
  &::after {
    content: "";
    position: absolute;
    top: 14px;
    left: 15px;
    width: 87px;
    height: 87px;
    background: #fff;
    border-radius: 90px;
    transition: 0.5s;
    @include for-min-desctop {
      top: 10px;
    }
  }
}

.switch-logo {
  height: 0;
  width: 0;
  visibility: hidden;
  appearance: none;
  &:checked + label {
    background: $yellow;
  }
}

.switch-logo:checked + .switch-label:after {
  left: calc(100% - 15px);
  transform: translateX(-100%);
}

.switch-label:active:after {
  width: 130px;
}

.home-wrap .container {
  margin-bottom: 106px;
}
.marquee-text-wrap {
  max-width: 100%;
  width: 110vw;
  padding: 25px 0px;
  background-color: $blue;
  overflow: hidden;
  transform: rotate(4deg);
  margin-top: 60px;
}

.marquee-text-text {
  display: flex;
  p {
    margin-right: 26px;
    font-family: "Zilla Slab", serif;
    font-weight: 700;
    font-size: 40px;
    line-height: 48px;
    color: #fff;
    white-space: nowrap;
  }
}

.home {
  display: flex;
  padding-top: 226px;
  margin-bottom: 60px;
  padding: 226px 50px 0px 50px;

  @include for-tablet {
    flex-direction: column;
    padding-top: 150px;
  }
  @include for-min-desctop {
    padding: 0px 50px;
    padding-top: 150px;
  }
  &-wrap {
    margin: 0px -50px;
    @include for-tablet {
      margin: 0px -30px;
    }
  }

  &__logo {
    width: 50%;
    position: relative;
    margin-right: 20px;
    &--img {
      // max-width: 500px;
      height: 300px;
      position: relative;
    }

    @include for-tablet {
      img {
        width: 100%;
        height: 175px;
      }
      margin-bottom: 76px;
      width: 100%;
    }
  }

  &__text {
    margin-bottom: 22px;
    max-width: 505px;
    @include for-tablet {
      margin-bottom: 30px;
    }
  }
  &__info {
    @include for-min-desctop {
      flex: 1 1 50%;
      margin-left: 20px;
    }
    @include for-mobile {
      margin-left: 0px;
    }
  }

  &__title {
    font-size: 60px;
    line-height: 72px;
    color: $blue;
    margin-bottom: 20px;
    @include for-min-desctop {
      font-size: 45px;
      line-height: 55px;

      br {
        display: none;
      }
    }
    @include for-mobile {
      font-size: 30px;
      line-height: 37px;
    }
    span {
      color: $yellow;
    }
  }
}

.spot-yellow {
  width: 70px;
  height: 70px;
  position: absolute;
  right: 11%;
  bottom: -124px;
  background-color: $yellow;
  -webkit-filter: blur(40px);
  filter: blur(40px);
  opacity: 0.7;
  @include for-mobile {
    display: none;
  }
}
</style>
