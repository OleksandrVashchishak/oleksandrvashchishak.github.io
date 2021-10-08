<template>
  <div class="wrapper">
    <base-header />
    <home-page />
    <our-specialization />
    <our-meeting />
    <page-banner />
    <choose-us />
    <our-process />
    <page-footer />
  </div>
</template>

<script>
import ChooseUs from "./components/ChooseUs";
import HomePage from "./components/HomePage";
import OurMeeting from "./components/OurMeeting";
import OurProcess from "./components/OurProcess";
import OurSpecialization from "./components/OurSpecialization";
import PageBanner from "./components/PageBanner";
import PageFooter from "./components/PageFooter";
import baseHeader from "./components/regular/baseHeader";

export default {
  components: {
    baseHeader,
    HomePage,
    OurMeeting,
    OurProcess,
    ChooseUs,
    OurSpecialization,
    PageBanner,
    PageFooter
  },
  name: "App"
};
</script>

<style lang="scss">
.wrapper {
  overflow: hidden;
}
</style>
