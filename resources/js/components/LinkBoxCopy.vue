<template>
  <div class="" :class="{ 'link-con': !fullWidth }">
    <div class="border link-box" :style="{ backgroundColor: backgroundColor }">
      <v-btn
        min-height="64"
        class="-btn"
        :color="color"
        dark
        @click.stop="copyToClipboard(value)"
        tile
        :class="{ 'ma-2 rounded-18px': smallWidthMode }"
      >
        <v-icon>{{ icon }}</v-icon></v-btn
      >
      <v-spacer></v-spacer>
      <span class="-link"> {{ value }}</span>
      <v-spacer></v-spacer>

      <img
        v-if="image"
        width="46"
        height="auto"
        :src="image"
        class="ms-2 px-2 border-start"
      />
    </div>
    <p v-if="message" class="subtitle-2 text-start my-1">
      <v-icon class="me-1" small>info</v-icon> {{ message }}
    </p>
  </div>
</template>

<script>
export default {
  name: "LinkBoxCopy",
  props: {
    value: {},
    message: {},
    icon: { default: "content_copy" },
    image: {},
    color: { default: "primary" },
    backgroundColor: { default: "#fff" },
    fullWidth: { default: false, type: Boolean },

    smallWidthMode: { default: false, type: Boolean }, // Small width with large content! Rounded button!
  },
};
</script>

<style scoped lang="scss">
.link-con {
  max-width: 1000px;
  margin: 0 auto 12px auto;
}
.link-box {
  display: flex;
  align-items: center;
  justify-content: space-around;
  border-radius: 12px;
  overflow: hidden;
  border: solid thin #999;
  min-height: 64px;

  .-btn {
    flex-grow: 0;
  }
  .-link {
    margin: 4px 8px;
    flex-grow: 1;
    direction: ltr;
    text-align: center;
    font-size: 1.1rem;
    max-width: calc(100% - 130px);

    @media only screen and (max-width: 850px) {
      font-size: 0.8rem;
    }
    @media only screen and (max-width: 600px) {
      font-size: 0.7rem;
    }
  }
}
.rounded-18px{
    border-radius: 18px;
}
</style>
