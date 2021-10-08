<template>
  <header class="header">
    <div class="header-cnt">
      <div class="header__logo">
        <img src="@/assets/images/logo.png" alt="Soft Boost" />
      </div>
      <div
        class="header__burger"
        @click="show = !show"
        :class="{ burgerActive: show }"
      >
        <span></span>
      </div>
      <div class="header__wrapper" v-show="show || !isMobile">
        <nav class="header__nav header-nav">
          <a
            class="header-nav__link"
            id="home-nav"
            href="#"
            @click="closeMobileMenu('#home')"
            >{{ $t("menuHome") }}</a
          >
          <a
            class="header-nav__link"
            id="about-nav"
            href="#"
            v-scroll-to="{
              el: '#about',
              offset: -50
            }"
            @click="closeMobileMenu('#about')"
            >{{ $t("menuAbout") }}</a
          >
          <a
            class="header-nav__link"
            id="choose-nav"
            href="#"
            @click="closeMobileMenu('#choose')"
            >{{ $t("menuServices") }}</a
          >
          <a
            class="header-nav__link"
            id="process-nav"
            href="#"
            @click="closeMobileMenu('#process')"
            >{{ $t("menuHow") }}</a
          >
          <a
            class="header-nav__link"
            id="contacts-nav"
            href="#"
            @click="closeMobileMenu('#contacts')"
            >{{ $t("menuContacts") }}</a
          >
        </nav>
        <div class="header__switcher">
          <button
            class="header__lang"
            :class="{ activeLang: isActive }"
            @click="setLocale('ru')"
            @click.prevent="isActive = !isActive"
          >
            ru
          </button>
          <button
            class="header__lang"
            :class="{ activeLang: !isActive }"
            @click="setLocale('en')"
            @click.prevent="isActive = !isActive"
          >
            eng
          </button>
        </div>
        <base-button class="header__btn" @showModal="showModal">{{
          $t("btnMenu")
        }}</base-button>
      </div>
    </div>
    <base-modal v-if="isFormPopupVisible" @closePopup="closePopup"></base-modal>
  </header>
</template>

<script>
import baseButton from "./baseButton";
import baseModal from "./baseModal";
import navObserver from "../../plugins/navObserver";
import { sectionsMap } from "../../constants/sectionsMap";

export default {
  components: { baseButton, baseModal },
  data() {
    return {
      isFormPopupVisible: false,
      isActive: false,
      show: false,
      mobileView: true,
      isMobile: false
    };
  },
  mounted() {
    navObserver(sectionsMap, "active", { threshold: 0.5 });
  },
  methods: {
    showModal() {
      this.isFormPopupVisible = true;
    },
    setLocale(locale) {
      this.$i18n.locale = locale;
    },
    closePopup() {
      this.isFormPopupVisible = false;
    },
    closeMobileMenu(element) {
      this.$scrollTo(element);
      this.show = false;
      if (element == "#about") {
        console.log("yes");
      }
    }
  },
  created() {
    this.isMobile = screen.width <= 1025;
    window.addEventListener("resize", () => {
      this.isMobile = screen.width <= 1025;
    });
  }
};
</script>

<style lang="scss">
.header-cnt {
  max-width: 1340px;
  padding: 20px 10px;
  width: 100%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  @include for-min-desctop {
    padding: 13px 10px;
    flex-direction: column;
  }
}
.header {
  width: 100%;
  position: fixed;
  z-index: 8;
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  &__wrapper {
    display: flex;
    align-items: center;
    @include for-min-desctop {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fff;
      padding-top: 145px;
      flex-direction: column;
      align-items: flex-start;
      padding: 145px 30px 30px 30px;
    }
  }
  &__logo {
    width: 110px;
    height: 64px;
    @include for-min-desctop {
      position: relative;
      z-index: 6;
    }
  }
  &__btn {
    .button {
      @include for-desctop {
        min-width: 185px;
      }
    }
  }

  &__nav {
    margin-left: auto;
    margin-right: 60px;
    @include for-desctop {
      margin-right: 20px;
    }
    @include for-min-desctop {
      margin-left: 0;
    }
  }

  &__switcher {
    margin-right: 70px;
    display: flex;
    @include for-desctop {
      margin-right: 20px;
    }
    @include for-min-desctop {
      margin: 35px 0px 65px 0px;
    }
  }

  &__lang {
    background: #ffffff;
    border: 1px solid #cdcdcd;
    padding: 5px 10px;
    font-size: 16px;
    line-height: 19px;
    transition: all 0.3s ease 0s;
    &.activeLang {
      background-color: $yellow;
      border-color: $yellow;
    }
    &:hover {
      background-color: $yellow;
      border: 1px solid $yellow;
    }
  }
  &__burger {
    display: none;
    @include for-min-desctop {
      display: block;
      position: absolute;
      width: 15px;
      height: 11px;
      z-index: 6;
      left: 30px;
      top: 45px;
      transition: all 0.3s ease 0s;
      &.burgerActive {
        transform: rotate(90deg);
        transition: all 0.3s ease 0s;
      }
      span {
        position: absolute;
        background-color: $blue;
        left: 0;
        width: 100%;
        height: 1px;
        top: 5px;
      }
      &::before,
      &::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 1px;
        background-color: $blue;
      }
      &::before {
        top: 0px;
      }
      &::after {
        bottom: 0;
      }
    }
  }
}

.header-nav {
  @include for-min-desctop {
    display: flex;
    flex-direction: column;
  }
  &__link {
    font-size: 16px;
    line-height: 19px;
    color: $blue;
    font-weight: 700;
    margin-left: 30px;
    position: relative;
    @include for-desctop {
      margin-left: 15px;
    }
    @include for-min-desctop {
      margin-bottom: 20px;
      margin-left: 0px;
      width: max-content;
    }
    &.active:after {
      content: "";
      transition: all 0.5s ease 0s;
      position: absolute;
      bottom: -7px;
      right: 10px;
      height: 2px;
      background-color: $yellow;
      width: 100%;
      @include for-min-desctop {
        right: 0px;
      }
    }
    &:after {
      content: "";
      transition: all 0.5s ease 0s;
    }
    &:hover {
      &:after {
        position: absolute;
        bottom: -7px;
        right: 10px;
        height: 2px;
        background-color: $yellow;
        width: 100%;
        @include for-min-desctop {
          right: 0px;
        }
      }
    }
  }
}
</style>
